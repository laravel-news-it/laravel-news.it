---
extends: _layouts.post
section: content
title: Usare le code con cron in Hosting
date: 2022-09-08
description: come usare le code (queue) in hosting senza supervisor
categories: [tips, devops]
cover_image: /assets/articles/22-09-queue.png
author: Alessandro Cappellozza
featured: true
excerpt: uando installiamo in hosting può capitare, soprattutto con quelli a basso costo, che ci siano delle limitazioni anche importanti. Una di quelle che capita più spesso è non poter installare **SUPERVISOR** e quindi dover rinunciare alle code; quasi sempre però possiamo definire dei **CRON**.
---


## Il contesto dell'hosting
Quando installiamo in hosting può capitare, soprattutto con quelli a basso costo, che ci siano delle limitazioni anche importanti. Una di quelle che capita più spesso è non poter installare **SUPERVISOR** e quindi dover rinunciare alle code; quasi sempre però possiamo definire dei **CRON**. 

Il primo pensiero è quello di ***rifarsele*** in casa usando un comando, cioè di annotare le cose da fare in una tabella per poi elaborarle. Va da sè che stiamo riscrivendo delle funzionalità e questo non è un buon punto di partenza.

La comodità dalle code di Laravel è proprio quello di poter aggiungere un elemento a questa pila e farlo girare con comodo successivamente senza peraltro **timeout** che avremmo usandolo in una pagina. La soluzione in questo caso è piuttosto semplice: nei meandri della documentazione è possibile vedere che ci sono più opzioni per il demone delle code e uno di questi ci viene incontro. In pratica si tratta di far partire il demone in un **CRON** e farlo uscire dopo aver processato un certo numero di job.

## 1. Configurazione
Iniziamo però con ordine partendo dalla configurazione dell'env; dobbiamo indicare che le code non sono sincrone ma usando il database:

```bash
QUEUE_CONNECTION=database
```

## 2. Il database
Per il database che sostiene le code è sempre consigliato **REDIS** ma in hosting spesso non è presente quindi possiamo optare per **MySql** che, se non abbiamo moli di calcolo grosse, può fare il suo lavoro bene. Si prosegue poi creando le tabelle per le code, laravel mette a disposizione un comando per creare la migration che verrà eseguito poi insieme anche alle altre del vostro progetto:

```bash
php artisan queue:table
php artisan migrate
```

## 3. Il CRON
A questo punto possiamo impostare il cron nel nostro hosting in indicando al worker di uscire dopo aver processato un certo numero di elementi ([processing-a-specified-number-of-jobs](https://laravel.com/docs/9.x/queues#processing-a-specified-number-of-jobs)):

```bash
php artisan queue:work --max-jobs=10
```

Qui lo stiamo usando direttamente nel CRON ma potete tranquillamente chiamarlo nello scheduler e mettere il classico **schedule:run** e usarlo dal kernel del command.
```php
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:work', [ '--max-jobs' => 10 ])->everyMinute();
    }
}        
```
Il caso che mi ha fatto arrivare a questa soluzione deriva da un amico che in hosting non aveva supervisor e non poteva inviare più di 600 email l'ora; lui voleva usare le code, che oggettivamente sono molto comode, inviandone 10 per minuto auto limitava il tutto a 600.

## Alternative?
Esiste un'alternativa a questo tipo di approccio ed è quello di lanciarlo dal kernel del command con l'opzione ***withoutOverlapping***, questo lancerà il worker lasciandolo appeso e riavviandolo se dovesse chiudersi. Questa **non è però una buona soluzione** in hosting perchè lasciate un processo in memoria e se l'admin se ne accorge potrebbe intervenire sia fermando l'applicativo sia magari il dominio con un down magari in orari in cui non siete li' a monitorare (del resto avete preso un hosting proprio per non fare il sistemista no?). Poi perdete anche il controllo del processo che diviene difficile da monitorare per memory leak e altre situazioni per cui non è studiato.


```php
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:work')->withoutOverlapping()->everyMinute();
    }
}        
```