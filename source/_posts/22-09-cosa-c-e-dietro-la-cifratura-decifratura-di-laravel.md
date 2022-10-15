---
extends: _layouts.post
section: content
title: Cosa c'è dietro la Cifratura/Decifratura di Laravel
date: 2022-09-20
description: Uno sguardo dall'interno ai meccanismi di cifratura/decifatura di Laravel
categories: [tutorials]
cover_image: /assets/articles/22-09-cosa-c-e-dietro-la-cifratura-decifratura-di-laravel.png
author: Roberto Gallea
featured: false
---

**_NOTA:_**  Traduzione da [robertogallea.com](https://robertogallea.com/posts/development/whats-behind-laravel-encryptiondecryption)


> `Il mio sistema è sicuro, usa la cifratura.`
 
Lo avrai sicuramente sentito/detto di tanto in tanto. Sicuro che lo è, ma _perchè_ e _come_ è sicuro? Lo sai _davvero_?

## Fondamentali della cifratura/decifratura di Laravel

La cifratura/decifratura di Laravel è basata sulla classe `Illuminate\Encryption\Encrypter` , che è costruita passando una chiave di cifratura ed un cifrario (cioè l'algoritmo di cifratura):

- `__construct($key, $cipher = 'AES-128-CBC')`

Supporta (fra gli altri) i seguenti metodi principali:

- `encrypt($value, $serialize = true)`
- `decrypt($payload, $unserialize = true)`

i quali, nemmeno a dirlo, sono usati per cifrare e decifrare dati.

```
$encrypter = new Illuminate\Encryption\Encrypter('1234567812345678', 'AES-128-CBC');

$encrypted = $encrypter->encrypt('Hello world');
dump($encrypted);
// stampa qualcosa di simile a "eyJpdiI6ImdMd2dWcW5jMXBrUDBranRJZXQ5MEE9PSIsInZhbHVlIjoiNnhTODBSclB3ZVp3SFRRUWFWTHpReFQwYWQ1aXVmTmhXOXV5WHM2TzR1WT0iLCJtYWMiOiIwODQyZDhiMzZlNDQwZTZjYTRiYmI2MGE0MTgzNzk5NGNkZTU1Yzc5NDIyYzdjYmYwNzk2ZTA5MGNjYjc4MGYzIn0="

$decrypted = $encrypter->decrypt($encrypted);
dump($decrypted);
// stampa di nuovo "Hello world" 
```

Magnifico! Già solo questo è sufficiente per usarlo nel migliore dei modi.

Tuttavia, sei vuoi sapere cosa succede internamente, continua a leggere.

**ATTENZIONE! Considera che i risultati non saranno esattamente gli stessi, dato che alcuni valori sono generati casualmente, e dunque cambiano ad ogni esecuzione.**

## Come funziona la cifratura

Il cifratore di Laravel attualmente usa OpenSSL per effettuare la cifratura AES-256 e AES-128. Inoltre usa la protezione Message Authentication Code (MAC), un meccanismo per assicurare che i dati non vengano manomessi dopo la cifratura.

### Cosa c'è nel risultato?

Riprendendo l'esempio precedente, potresti pensare che la stringa cifrata 
```php
"eyJpdiI6ImdMd2dWcW5jMXBrUDBranRJZXQ5MEE9PSIsInZhbHVlIjoiNnhTODBSclB3ZVp3SFRRUWFWTHpReFQwYWQ1aXVmTmhXOXV5WHM2TzR1WT0iLCJtYWMiOiIwODQyZDhiMzZlNDQwZTZjYTRiYmI2MGE0MTgzNzk5NGNkZTU1Yzc5NDIyYzdjYmYwNzk2ZTA5MGNjYjc4MGYzIn0="
``` 
sia essa stessa la versione cifrata dell'input. Questo è senz'altro vero, ma c'è di più da sapere.

Essa è infatti la conversione base64 di una stringa. _"Che stringa?"_ potresti chiederti... E puoi ottenere una risposta semplicemente eseguendo il seguente codice:

```php
$encrypted = $encrypter->encrypt('Hello world');
$decodedEncrypted = base64_decode($encrypted);
```

il quale produce una stringa json simile alla seguente:

```json
{
  "iv":"gLwgVqnc1pkP0kjtIet90A==",
  "value":"6xS80RrPweZwHTQQaVLzQxT0ad5iufNhW9uyXs6O4uY=",
  "mac":"0842d8b36e440e6ca4bbb60a41837994cde55c79422c7cbf0796e090ccb780f3"
}
```

Già... Adesso è ancora meno chiaro... Di che si tratta? 

Questo documento json è composto dalle tre parti principali della cifratura:

- `value`: i dati cifrati veri e propri, codificati in base64
- `iv`: l'_Initialization Vector_, una sequenza di dati di lunghezza fissa generati casualmente, iniettati ad ogni esecuzione, per prevenire attacchi basati sulla semantica, vedi ([Initialization vector - Wikipedia](https://it.wikipedia.org/wiki/Initialization_vector) per maggiori dettagli). Anche questo è codificato in base64
-  `mac`: il _Message Authentication Code_, una firma usata per identificare eventuali manomissioni del `value`, generato effettuando l'hash di `value` e `iv`. Esso è rappresentato mediante una stringa in formato esadecimale.

Fai caso che sia  `iv` che `value` vanno codificati in base64 poichè sono composti da byte generici e potrebbero contenere caratteri non stampabili.

### Come funziona la cifratura - uno sguardo al codice

Per capire come venga generato il payload json, diamo un'occhiata più da vicino al metodo `encrypt()`:

```php
    public function encrypt($value, $serialize = true)
    {
        $iv = random_bytes(openssl_cipher_iv_length($this->cipher));

        $value = \openssl_encrypt(
            $serialize ? serialize($value) : $value,
            $this->cipher, $this->key, 0, $iv
        );

        if ($value === false) {
            throw new EncryptException('Could not encrypt the data.');
        }

        $mac = $this->hash($iv = base64_encode($iv), $value);

        $json = json_encode(compact('iv', 'value', 'mac'), JSON_UNESCAPED_SLASHES);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new EncryptException('Could not encrypt the data.');
        }

        return base64_encode($json);
    }
```

Guardando il codice, vengono realizzati 5 passi:

1. L'Initialization Vector viene generato alla riga `3` generando 128 o 256 bit (in base al cifrario usato) di dati _casuali_
2. Il valore cifrato viene generato nelle righe `5-8` eseguendo OpenSSL sulla versione (eventualmente) serializzata dei dati in chiaro, usando il cifrario, la chiave di cifratura e l'IV scelti. Nota che il risultato viene codificato in base64
3. Il MAC viene generato tramite il metodo `hash()`, a cui vanno dati in pasto l'IV base64 ed il valore cifrato. L'hashing è definito come:
```php
    protected function hash($iv, $value)
    {
        return hash_hmac('sha256', $iv.$value, $this->key);
    }    
```
cioè come l'hashing SHA256 della concatenazione dell'IV e del valore cifrato, usando la chiave di cifratura fornita.  
4. Un array contenente  `iv`, `value` e `mac` viene generato e convertito in formato json (riga `16`)
5. Il json viene codificato in base64 ed infine restituito (riga `22`)

### Come funziona la decifratura - in dettaglio

Per capire come i dati originali vengano decifati, diamo un'occhiata da vicino al metodo  `decrypt()`:

```php
    public function decrypt($payload, $unserialize = true)
    {
        $payload = $this->getJsonPayload($payload);

        $iv = base64_decode($payload['iv']);

        // Here we will decrypt the value. If we are able to successfully decrypt it
        // we will then unserialize it and return it out to the caller. If we are
        // unable to decrypt this value we will throw out an exception message.
        $decrypted = \openssl_decrypt(
            $payload['value'], $this->cipher, $this->key, 0, $iv
        );

        if ($decrypted === false) {
            throw new DecryptException('Could not decrypt the data.');
        }

        return $unserialize ? unserialize($decrypted) : $decrypted;
    }
```

Guardando il codice, 5 passi vengono eseguiti:

1. Il payload json viene estratto alla riga `3`. Durante l'estrazione, esso viene validato verificando che:

  1.1. Sia in forma di array  
  1.2. Contenga i campi`iv`, `value` e `mac`.  
  1.3. La lunghezza di `iv` sia compatibile con i requisiti del cifrario scelto  
  1.4. Il `mac` sia valido
2. I dati vengono decifrati usando OpenSSL (righe `5-12`)
3. Il risultato viene (eventualmente) deserializzato e ritornato.

### Perchè è sicuro?

Questo schema fornisce sicurezza fin tanto che la chiave di cifratura viene mantenuta segreta. Vediamo perchè:

- fiducia: il messaggio in chiaro può essere decifrato solo da chi conosce la chiave segreta
- integrità: se il valore viene modificato, la decifratura fallisce. Se iv ed il valore vengono entrambi modificati, il messaggio potrebbe essere potenzialmente decifrabile, ma la protezione MAC identificherà la monomissione e la decifratura fallirà. In ogni caso, cambiare una combinazione di iv e/o del valore e/o del MAC, farà sì che la decifratura fallisca a causa della corruzione del payload json.
- L'unico modo per ingannare la protezione MAC è conoscendo la chiave di cifratura, che permetterebbe la forgiatura di nuovi payload cifrati validi.

Se non siete ancora convinti, proviamo: crea un diverso messaggio cifrato:

```php
$encrypted2 = $encrypter->encrypt('Hello hacker');
$decodedEncrypted2 = json_decode(base64_decode($encrypted2), true);
dump('DECODED ENCRYPTED 2: ');
var_dump($decodedEncrypted2);
```
Adesso, prova a manomettere uno o più dei tre valori e prova a decifrare il risultato ottenuto.
```php
// scambio dei dati cifrati e tentativo di decifratura
try {
    $tampered = $decodedEncrypted;
    $tampered['value'] = $decodedEncrypted2['value'];
    $encrypter->decrypt(base64_encode(json_encode($tampered)));
} catch (\Illuminate\Contracts\Encryption\DecryptException $exception) {
    dump($exception->getMessage());
}
```

```php
// scambio degli iv e tentativo di decifratura
try {
    $tampered = $decodedEncrypted;
    $tampered['iv'] = $decodedEncrypted2['iv'];
    $encrypter->decrypt(base64_encode(json_encode($tampered)));
} catch (\Illuminate\Contracts\Encryption\DecryptException $exception) {
    dump($exception->getMessage());
}
```

```php
// scambio dei MAC e tentativo di decifratura
try {
    $tampered = $decodedEncrypted;
    $tampered['mac'] = $decodedEncrypted2['mac'];
    $encrypter->decrypt(base64_encode(json_encode($tampered)));
} catch (\Illuminate\Contracts\Encryption\DecryptException $exception) {
    dump($exception->getMessage());
}
```

In tutti e tre i casi, il control MAC fallisce, così come la decifratura ed una  `DecryptException` viene lanciata.

## Conclusione

Adesso sai più in dettaglio come la cifratura di Laravel funzioni all'interno. Niente è cambiato del modo di usarla, ma hai acquisito più fiducia negli strumenti che usi. Inoltre, adesso sei in grado di giustificare con i tuoi clienti "_come_" il tuo sistema è sicuro.
