---
extends: _layouts.post
section: content
title: Laravel Day 2020
date: 2020-06-03
description: Riepilogo dell'evento Laravel Day 2020
categories: [events]
cover_image: /assets/articles/laravel-day.png
author: Alessandro Cappellozza
featured: false
---

[Sito ufficiale](https://2020.laravelday.it/)

#### Come ho sviluppato e scalato un prodotto SaaS grazie a Laravel 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/AgRCg10PIEw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

In questo talk mostrerò tutte le strategie di sviluppo che ho utilizzato per implementare e scalare un prodotto SaaS utilizzando Laravel per la gestione di grandi quantità di traffico. Partendo dall'evoluzione del codice vedremo come ho configurato l'ambiente di sviluppo, l'integrazione con sistemi esterni attraverso i driver, l'uso massivo del sistema Queue/Jobs e l'impatto sul Database, fino alla parte più infrastrutturale con la suddivisione dell'applicazione su più server specializzati e il deploy. 

----

#### LiveWire Hands-on, frontend moderno senza toccare una riga di javascript 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/Q-pmLL_zkuE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Sappiamo tutti che per avere un frontend al passo coi tempi è necessario fare spesso due progetti uno di frontend e uno backend distinti e specializzati, complicando sia lo sviluppo che il deploy delle applicazioni. Questo nuovo strumento si prefigge di colmare questo gap consentendo di creare componenti "ajax" con il solo PHP; una strada già battuta da altri linguaggi ma con un approccio nuovo già usato da grossi portali, qui lo vedremo pacchettizzato e standardizzato per Laravel. Analizzeremo il principio di funzionamento, cosa mette a disposizione di base, un esempio pratico e dei contesti dove può effettivamente essere utile. 

[slide](https://slides.com/eppak/livewire-hands-on-frontend-moderno-senza-toccare-una-riga-di-javascript)

----

#### How can I trust my test suite?

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/-I10fHpy14Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

You just started working on a new project. Or maybe you've been working on it since some time, and it evolved a lot, thanks to many different developers. This means that you probably don't have enough knowledge on how the automated tests are written, and how effective they are. So, how can you be confident to ship new features in production, or to refactor that old piece of software that's slowing you down? Are you fairly sure that if your CI build is green you're not gonna break anything? There are a lot of tools out there that give you some numbers about your code and your tests, like code coverage and CRAP metrics, but they are significant up to some extent. In this talk, we will see how can you measure the effectiveness of your test suite, how you can actually improve it, and what are the benefits of having a reliable and comprehensive set of automated tests. 

----

#### Applicazioni "Modulitiche" 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/TAszZm0m6ME" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

In certi contesti un'applicazione non si presta ad essere racchiusa in un unico pacchetto monolitico, ma non è nemmeno sufficientemente distribuita da essere realizzata mediante un'architettura a servizi. Il paradigma “modulitico” è una soluzione ibrida intermedia fra questi due estremi. Questo approccio, oltre a risolvere problemi di gestione del progetto, richiede l'osservanza e l'applicazione di alcuni concetti fondamentali di Clean code and architecture, elevando il livello di qualità della codebase. Scopriremo quando e perché questa metodologia è uno strumento potente se usato in modo corretto. 

[slide](https://docs.google.com/presentation/d/1pm2uaq6wLV4onWq6zuKAC71EOjA0mO4dxFuxpEwOlps) [sorgenti](https://github.com/robertogallea/applicazioni-modulitiche)

----

#### Multi-tenancy in Laravel 

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/ftYFX8SYLE4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Il multi-tenancy è la principale modalità per creare delle SaaS. Analizzeremo cos'è, i pacchetti più noti e creeremo un applicativo di test utilizzando il pacchetto "stancl/tenancy". 

----

#### Laravel Authentication Deep Dive

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/l1L1xEAslqs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Facciamo un tuffo nel sistema di autenticazione utenti di Laravel: vedremo nel dettaglio cosa sono le Guard e gli UserProvider, analizzeremo sessioni e token e useremo queste informazioni per creare il nostro sistema di autenticazione 

----

#### Organizzazione del codice su Laravel

<iframe width="100%" height="480" class="rounded border border-gray-400 shadow" src="https://www.youtube.com/embed/_qtwTjTi6Q0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

In questo talk andremo a vedere le tecniche che il team di Playmoove utilizza per tenere organizzata e accessibile la codebase, nello specifico: - Scrittura di API controller - Business logic isolation - Dependency injection - Generazione automagica delle API docs 

