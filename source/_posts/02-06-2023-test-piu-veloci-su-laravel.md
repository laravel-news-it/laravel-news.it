---
extends: _layouts.post
section: content
title: Test più veloci su Laravel
date: 2023-06-02
description: Come ridurre i tempi di esecuzione dei test su database
categories: [tips, testing]
cover_image: /assets/articles/02-06-2023-test-piu-veloci-su-laravel.png
author: Mirko Lorusso
featured: true
---

Se lavori con il TDD saprai sicuramente che il tempo di esecuzione dei test può crescere molto in fretta. Una buona suite di test su un progetto di medie dimensioni raggiunge facilmente un tempo di esecuzione di diversi minuti.

Sulle ultime versioni di Laravel puoi usare un paio di stratagemmi per ovviare al problema.

## Resetta il database solo quando ne hai bisogno

Da Laravel 8 in avanti puoi sostituire il trait [`RefreshDatabase`](https://laravel.com/docs/master/database-testing#resetting-the-database-after-each-test) con `Illuminate\Foundation\Testing\LazilyRefreshDatabase`.

In questo modo il database verrà resettato e migrato solamente se il test precedente lo ha modificato.

## Esegui i test in parallelo

Per default Laravel lancia i test sequenzialmente, ma se esistesse un modo per eseguirli in parallelo?

Puoi farlo utilizzando il package [`paratest`](https://github.com/paratestphp/paratest): dopo averlo installato dovrai solamente selezionare uno dei driver disponibili per la code coverage (PCOV, xDebug o PHPDBG) e lanciarlo come descritto nel README (se scegli xDebug, ricorda di attivarlo prima di avviare i test).

***

L'uso combinato di questi due tool arriva facilmente a dimezzare i tempi di esecuzione dei test su un progetto.
E tu conosci altri metodi per velocizzare i test con Laravel? Scrivilo nei commenti :)
