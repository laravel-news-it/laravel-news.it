---
extends: _layouts.post
section: content
title: Laravel Day 2019
date: 2019-06-03
description: Riepilogo dell'evento Laravel Day 2019
categories: [events]
cover_image: /assets/articles/laravel-day.png
author: Alessandro Cappellozza
featured: false
---

[Sito ufficiale](https://2019.laravelday.it/)

#### Laravel the Lego™ Way

<iframe width="100%" height="480" src="https://www.youtube.com/embed/pgxJFOHqLxU" class="rounded border border-gray-400 shadow" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Affiancare a Laravel uno strumento RAD come un admin package è una tentazione forte che però ha un costo in termini di scalabilità, architettura e a volte debito tecnico. Ci si trova quindi ad assemblare un software come se si avessero in mano dei mattoncini per l'appunto, cercando quelli che si incastrano meglio per forma e colore alle specifiche e desideri del committente. Lo sviluppo i trasforma in un incastro di funzionalità che spesso ci travolge e ci lascia col dubbio di aver fatto la scelta migliore. Cercheremo di trovare un trade off facendo una carrellata sugli strumenti che offre il mercato valutandone pro/contro e cercando di capire come impattano non solo sul codice ma sul rapporto qualità e time to market. 

[slide](https://docs.google.com/presentation/d/11dqSyCNc5rxZwrWGGaVaXHCj5Q1iH35lV8IepqruPmE) [sorgenti](https://github.com/eppak/legolaravelway)

----

#### Laravel applicato alle piattaforme e-commerce cloud 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/I2-1Ef1moPU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Ad oggi il mondo e-commerce si sta muovendo verso le tecnologie cloud, mentre il mondo dei gestionali ancora non si evolve o a volte non è in grado di supportare in modo completo i clienti nell'approcio a queste piattaforme. In questo talk andremo a vedere come realizzare e configurare a grandi linee un'app middleware realizzata in Laravel (Migrations, Commands, Services, Controllers, ....) che attraverso l'utilizzo delle api fornite dalla piattaforma Cloud possa comunicare con un gestionale attraverso l'interscambio di file. 

[slide](https://drive.google.com/file/d/1T3iB7W99RIQiEGqtAvCJSS0oNp68hbts/view)

----

#### Controllers, Policies e richieste asincrone

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/aMd3PUPnNyE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Le policy di Laravel sono il miglior strumento a disposizione di uno sviluppatore per poter garantire agli end user una precisa politica di autorizzazione all'accesso e modifica delle risorse. Obiettivo del talk è di dare una panoramica a tutto tondo sull'utilizzo di questo strumento all'interno di un progetto Laravel 6.0, con un focus sulla magia compiuta dal framework dietro le quinte. Per rendere il tutto più interessante, si entrerà nel dettaglio di una Single Page App esemplificativa e di come le richieste asincrone generate tramite il client HTTP axios debbano gestire correttamente i response inviati dai controller successivamente alla verifica di una o più policy. 

[slide](https://docs.google.com/presentation/d/1gYMSpEYvR3q7kR2YeeBPYz0Iy5C7yg9ifoEhEYmaybA/)

----

#### MongoDB vs MySQL in applicazioni Laravel 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/J4GDCAo4muU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

In questi ultimi anni i database di tipo non relazionale, pur non essendo una novità assoluta, hanno registrato una crescita esponenziale nel loro sviluppo ed utilizzo grazie al sempre più crescente bisogno di scalare in orizzontale superando i limiti ai classici RDBMS (database relazionali). In questo talk mettereremo a confronto i maggiori database relazionali e non, analizzandone i pro ed i contro. Inoltre vedremo come implentare da zero una applicazione CRUD in Laravel con MongoDB e MySQL, come viene influenzato il design dell’applicazione e come varia il carico di lavoro con un database rispetto all’altro. 

[slide](https://drive.google.com/file/d/1ZZ1tqOTWjdT5MZwbfP5o2_gBIP3n1ynG) [sorgenti](https://github.com/offline-agency/laravel-mongodb-blog)

----

#### Service Container Deep Dive 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/fwwfFVqO5gg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Laravel non è solo un framework per lo sviluppo di applicazioni web moderne, ma al suo interno nasconde (neanche troppo) un vero e proprio "service container". Nel talk analizzeremo cosa è un service container, perché lo usiamo senza nemmeno accorgercene, come lo possiamo sfruttare per favorire il disaccoppiamento del codice e cosa si nasconde dietro il concetto di Facade. 

[slide](https://drive.google.com/file/d/1OzdqiKLicncYHgW5HT1npd7YATSiTvJc)

----

#### Laravel Notification System 201

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/eSpvul53B3Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Sebbene Laravel non consenta in prima istanza l'invio di messaggi differenti dalle email, questo non preclude l'estrema versatilità del modulo di notifiche, quest'ultimo consente infatti di inviare anche SMS, chiamate e notifiche push se opportunamente configurato. Obiettivo di questo talk è proprio quello di analizzare il funzionamento del modulo e di tutti gli accorgimenti utili alla sua estensione e al suo utilizzo al massimo potenziale. 

----

#### Test Driven Development con Laravel 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/UALxTYn6tB4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Testare correttamente il proprio codice è una necessità imprescindibile per realizzare software robusto, pulito e di qualità. Il Test Driven Development è la principale metodologia di riferimento per la definizione di test-suite automatizzate. Il talk descrive le motivazioni, i concetti ed i principi fondamentali di questa disciplina. Tali elementi verranno applicati ad un caso d'uso, e, utilizzando Laravel e PHPUnit, saranno affrontati i concetti di Feature ed Unit testing, l'uso delle asserzioni, l'Integration testing ed il mocking. 

[sorgenti](https://github.com/robertogallea/laravelday-tdd) [slide](https://github.com/robertogallea/laravelday-tdd/blob/master/tdd.pdf)

----

#### Creazione di package Laravel

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/0SJn6Tl-i7Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Il talk descrive il ciclo di creazione e manutenzione di un package Laravel da utilizzare con composer. In particolare verranno descritte le seguenti fasi: Definizione del package e delle sue funzionalità; Pubblicazione di configurazioni, assets ed altri componenti; Pubblicazione su GitHub; Pubblicazione su packagist; Automazione dell'aggiornamento su packagist in seguito ad un push; Gestione delle versioni. Al fine di comprendere meglio i contenuti, si consiglia la conoscenza base di Laravel, composer e git.

