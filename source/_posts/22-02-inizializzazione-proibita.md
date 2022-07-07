---
extends: _layouts.post
section: content
title: L'inizializzazione proibita
date: 2022-07-15
description: Come inizializzare gli argomenti di una funzione.
categories: [tips]
cover_image: /assets/articles/22-02-inizializzazione-proibita.png
author: Alberto Peripolli
featured: true
---

In PHP è possibile dare un valore di default ai parametri di una funzione.  
Questo serve ad evitare di passare parametri che restano molto spesso invariati e che quindi non si vuole esplicitare ad ogni invocazione.
<!-- more -->
```php
function makecoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}
echo makecoffee(); // Making a cup of cappuccino.
echo makecoffee(null); // Making a cup of .
echo makecoffee("espresso"); // Making a cup of espresso.
```

Il problema è che con PHP possiamo assegnare ai parametri solo dei valori semplici come una stringa, un numero, `null` o un `array` di elementi semplici. 

Molto spesso però capita di volere assegnare un oggetto o addirittura il risultato di una funzione.
```php
function printDate(Carbon $date = now())
{
    return $date->format('d/m/Y');
}
```

Purtroppo questa sintassi ritorna l'errore: `Fatal error: Constant expression contains invalid operations`.

Quindi l'unica soluzione è inizializzare il parametro a `null` e poi andarlo a definire dentro la funzione.

```php
function printDate(?Carbon $date = null)
{
    if(is_null($date)){
        $date = now();
    }

    return $date->format('d/m/Y');
}
```

Anche se questa sintassi può sembrare pulita, all'aumentare dei parametri può diventare molto prolissa.

Per fortuna da PHP 7.4 abbiamo un nuovo operatore di assegnazione chiamato `Null Coalesce` che rende il codice più coinciso e meglio leggibile:


```php
function printDate(?Carbon $date = null)
{
    $date ??= now();

    return $date->format('d/m/Y');
}
```

Questo compatto operatore è l'evoluzione dell'operatore ternario di PHP
```php
// before PHP 7
$data['username'] = (isset($data['username']) ? $data['username'] : 'guest');
// before PHP 7.4
$data['username'] = $data['username'] ?? 'guest';
// after PHP 7.4
$data['username'] ??= 'guest';
```

Quindi la prossima volta che vi servirà di inizializzare un parametro di una funzione ricordatevi questo piccolo amico `??=`.