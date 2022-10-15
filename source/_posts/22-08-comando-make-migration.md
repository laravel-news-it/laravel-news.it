---
extends: _layouts.post
section: content
title: I segreti del comando make:migration
date: 2022-08-25
description: Il comando di Laravel per creare le migrazioni nasconde dei trucchetti interessanti.
categories: [tips]
cover_image: /assets/articles/22-08-comando-make-migration.png
author: Alberto Peripolli
featured: true
excerpt: Una delle operazioni più comuni in Laravel è la creazione delle migrazioni. Il metodo più consono è attraverso il relativo comando artisan make, pochi però sanno che nascosti nel comando base ci sono molti trucchetti che possono semplificare e velocizzare queste operazioni.
---

Una delle operazioni più comuni in Laravel è la creazione delle migrazioni, esse ci consentono semplicemente di cambiare 
stato al nostro database.  
Il metodo più consono per creare una nuova migrazione è attraverso relativo comando artisan make, al quale la 
[documentazione ufficiale](https://laravel.com/docs/9.x/migrations#generating-migrations) limita un solo paragrafo, 
pochi però sanno che nascosti nel comando base ci sono molti trucchetti che possono semplificare e velocizzare queste operazioni.


Il comando artisan esposto nella documentazione è il seguente:

```bash
php artisan make:migration create_flights_table
```

La guida dice che esso cercherà nel nome passato i riferimenti alla tabella e se si tratta di una creazione, ma non spiega il come.

Per questo ho creato questa semplice guida che riepiloga tutti i trucchi.

## 1. Passare il nome senza usare i _
Nell'esempio sopra riportato il nome del file è scritto con tutti i trattini bassi che dividono le parole, ma non è molto pratico da scrivere.  
Per fortuna è possibile passare il nome dentro a degli apici "" utilizzando così i più comodi spazi:
```bash
php artisan make:migration "create flights table"
```

## 2. Creare una nuova tabella
Per creare una nuova tabella dobbiamo far capire al comando che si tratta di una creazione e il nome della tabella.  
Possiamo quindi usare un nome specifico per la migrazione o passare opzioni aggiuntive `–create[=CREATE]` e/o `–table[=TABLE]`. 
Il comando tenterà di scoprire tali informazioni dal nome tramite un componente chiamato `TableGuesser`.
```bash
# utilizzando semplicemente il TableGuesser
php artisan make:migration "create users table"

# con i parametri --table e --create
php artisan make:migration "My migration" --table=users --create

# oppure più semplicemente
php artisan make:migration "My migration" --create=users
```

Per far capire al `TableGuesser` che vogliamo creare una nuova tabella basta mettere nel nome "**create** nome_tabella **table**" oppure solamente "**create** nome_tabella".

Una volta lanciato il comando verrà creata una nuova migration con il nome `date_time_[nome_della_migrazione].php` con precompilato il codice per la creazione della tabella:
```php 
public function up()
{
    Schema::create('my_table', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('my_table');
}
```

## 3. Modificare una tabella esistente 
Similmente al comando per creare la tabella anche per modificare una tabella esistente abbiamo due modi per farlo capire il nome della tabella.
Anche in questo caso possiamo utilizzare un nome interpretabile dal `TableGuesser` o specificarlo con l'opzione `--table[=TABLE]`. 

```bash
# utilizzando semplicemente il TableGuesser
php artisan make:migration "add field to users"
php artisan make:migration remove_field_from_users_table

# con l'opzione --table
php artisan make:migration "My migration" --table=my_table
```
Per far capire al `TableGuesser` il nome della tabella ci basta scriverlo alla fine del nome e anteporlo alle preposizioni `to`, `from` o `in`.

Una volta lanciato il comando verrà creata una nuova migration con il nome `date_time_[nome_della_migrazione].php` con precompilato il codice per la modifica della tabella:
```php
public function up()
{
    Schema::table('my_table', function (Blueprint $table) {
        //
    });
}

public function down()
{
    Schema::table('my_table', function (Blueprint $table) {
        //
    });
}
```

## 4. Personalizzazione dei path
Di default tutte le migrazioni verranno create nella cartella `database/migrations`, ma in molti casi (ad esempio nella DDD) potremmo essere interessati a cambiare questo percorso.  

Per far questo possiamo usare l'opzione `--path[=PATH]`, nella quale definiamo il percorso alternativo dove creare la migrazione.  
Inoltre se aggiungiamo l'opzione `--realpath` il path passato al comando sarà un path assoluto (utilizzando il path base di Laravel).
```bash
php artisan make:migration my_migration --path=test/folder
# Crea la migrazione in ./test/folder/date_time_my_migration.php

php artisan make:migration my_migration --path=test/folder
# Crea la migrazione in /var/www/laravel-project/test/folder/date_time_my_migration.php se laravel è nella cartella /var/www/laravel-project
```

Per completezza segnalo anche che se viene passata l'opzione `--fullpath` nel messaggio del comando artisan verrà aggiunto il path al nome.
```bash
 INFO  Created migration [test/folder/2022_08_31_085751_my_migration.php]. 
```

## 5. Personalizzazione degli stub 
Molte volte il codice di base che ci propone Laravel ci va un po' stretto... per fortuna possiamo personalizzarlo semplicemente.

Ci basta lanciare il comando artisan:
```bash 
php artisan stub:publish
```
e verranno pubblicati nella cartella `stubs` nella root del progetto tutte le basi di partenza per la creazione di file dai comandi make di Laravel artisan.
Una volta modificati verranno utilizzate queste nuove versioni dai comandi.

I file interessanti per le migrazioni sono:

- `migration.stub` file vuoto:utilizzato quando il comando con capisce la tabella
- `migration.create.stub` file per la creazione di una tabella
- `migration.update.stub` file per la modifica di una tabella

TIP: Se siete a corto di idee potete utilizzare il [pacchetto di spatie `spatie/laravel-stubs`](https://github.com/spatie/laravel-stubs), che contiene le personalizzazioni opinionate degli stub di Laravel. 
In questo caso ad esempio hanno completamente rimosso le funzioni di rollback delle migrazioni.

## 6. Creazione del modello insieme alla migrazione 
Nel caso volessimo creare anche un nuovo Model insieme alla migrazione, possiamo ricorrere al comando artisan `make:model`.    

Questo comando crea un nuovo Model ma passando l'opzione `-m` o `--migration` crea anche la migrazione di creazione tabella.

```bash
php artisan make:model Flight --migration
# questo comando creerà il model in app/Models/Flight.php 
# ed anche la migrazione in database/migrations/date_time_create_flights_table.php
```