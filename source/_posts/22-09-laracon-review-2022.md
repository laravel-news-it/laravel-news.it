---
extends: _layouts.post
section: content
title: Laracon review & recap 2022
date: 2022-09-18
description: Valutazione e riassunto dell'evento di riferimento della community di Laravel
categories: [events]
cover_image: /assets/articles/22-09-laracon-review.jpg
author: Alberto Peripolli
featured: true
---

Dopo aver visto tutto il Laracon 2022, ho scritto un piccolo riassunto di ciascun talk per soffermarmi su tutti i punti salienti.
<!-- more -->

Ad ogni talk ho allegato anche una mia personale valutazione (5 stelline massimo) e una stima del livello di difficoltà (da 1 a 5).

Spero così di aiutare chi non ha il tempo di guardarlo tutto a scegliere le cose più interessanti.


### [Not Quite My Type](https://youtu.be/f4QShF42c6E?t=874)
##### Speaker: Kai Sassnowski - Valutazione: ★★★★★ - Livello: 3/5
Talk che spiega l'utilizzo dei Value Object per riuscire a definire meglio i parametri passati alle funzioni, centralizzando il controllo e la validazione dei valori.
Ha portato 3 esempi in live code:
- durata vs int
- percentuale vs int
- UUID vs string


### [Kubernetes and Laravel](https://youtu.be/f4QShF42c6E?t=3332)
##### Speaker: Bosun Egberinde - Valutazione: ★★★☆☆ - Livello: 4/5
Panoramica di Kubernetes e un esempio pratico di utilizzo e configurazione con Laravel.


### [The future of Livewire](https://youtu.be/f4QShF42c6E?t=6014)
##### Speaker: Caleb Porzio - Valutazione: ★★★★★ - Livello: 3/5
Ha parlato dello stato attuale dello sviluppo in internet, di Livewire e del suo futuro...
Ha mostrato delle anticipazioni di Livewire v3:

- includerà anche alpineJS di default e l'integrazione tra i due framework sarà maggiore
- hot reload
- ottimizzazione e riduzione delle chiamate AJAX
- miglioramento della reattività e dell'utilizzo di componenti annidati


### [Sustainable Self-Care](https://youtu.be/f4QShF42c6E?t=9181)
##### Speaker: Marje Holmstrom-Sabo - Valutazione: ★★☆☆☆ - Livello: 1/5
Ha parlato di sostenibilità, cura di se stessi sia fisica che spirituale.


### [Let's Get Physical: Database Internals and You](https://youtu.be/f4QShF42c6E?t=10059)
##### Speaker: Tim Martin - Valutazione: ★★★☆☆ - Livello: 3/5
Ha spiegato un po' di concetti di basso livello relativi a MySQL: 

- uso della memoria
- performance
- indici e alberi
- UUID vs ID.

### [Deep Dive into Carbon](https://youtu.be/f4QShF42c6E?t=10712)
##### Speaker: Ralph J. Smit - Valutazione: ★★★★☆ - Livello: 2/5
Approfondimenti sulla famosa libreria di gestione delle date `Carbon`:

- gems: closest, farthest
- interval: diffForHumans vs diff/diffAsCarbonInterval, CarbonInterface
- period: le funzionalità di CarbonPeriod 


### [UI and Component testing with Cypress](https://youtu.be/f4QShF42c6E?t=11950)
##### Speaker: Marcel Pociot - Valutazione: ★★★★☆ - Livello: 3/5
Esempio di come testare l'UI con Cypress: un componente JS per il test end2end o a componenti, attraverso il pacchetto [laracast/cypress](https://github.com/laracasts/cypress) di Jeffrey Way attraverso il fantastico sito demo [laragone.net](https://laragone.net/).


### [The Hitchhiker's Guide to the Laravel Community](https://youtu.be/f4QShF42c6E?t=12936)
##### Speaker: Caneco - Valutazione: ★★★☆☆ - Livello: 1/5
Piccolo resoconto storico di Laravel, di Taylor Otwell e dei servizi legati a Laravel. 
Ricapitolazione dello stato di salute di Laravel e delle community che ci girano attorno.


### [Abstracting too early](https://youtu.be/f4QShF42c6E?t=13999)
##### Speaker: Matt Stauffer - Valutazione: ★★★★☆ - Livello: 3/5
Ha raccontato una storia che ha come morale: non usare strumenti grandi e complicati se non servono (YAGNI = "You Aren't Gonna Need It").
Poi ha spiegato che molte volte non è necessario scrivere il migliore codice possibile, ma deve essere un compromesso in base all'uso e al team (simply design e incremental design, duplicazione < astrazione sbagliata).
Una volta che il progetto ha raggiunto la forma desiderata, bisogna prepararsi all'estrazione di piccole parti (un po' alla volta), rifattorizzando prima la parte interessata.

Poi ha portato una serie di esempi di classici errori di astrazione prematuri:

- Repository pattern
- Microservices
- Kubernetes
- Docker
- Estrazione di classi/componenti in librerie
- Event sourcing


### [Laravel Update](https://youtu.be/f4QShF42c6E?t=17519)
##### Speaker: Taylor Otwell - Valutazione: ★★★★☆ - Livello: 3/5
Resoconto sugli ultimi aggiornamenti di Laravel, ora che il framework ha un rilascio annuale tutte le novità vengono introdotte durante i rilasci periodici, quindi si tratta semplicemente di un resoconto di novità già rilasciate e qualche cosa che verrà rilasciata a breve:

- laravel cli restiling
- artisan about
- commando db:monitor
- comandi xxx:show 
- pint
- controllore di uscita da un comando con `trap`
- vite preprocessor
- allegati di `Mailable` con model che implementano l'interfaccia `Attachable
- validazione con classi `InvokableRule` 
- errori per mancanza di attributi in $fillable del Model
- UUID, ULID
- seeder di model con chiavi ripetute su più Model collegati con il metodo `recycle`
- `Process` api
- `precognition` nuovo metodo di validazione
- [Laravel Bootcamp](https://bootcamp.laravel.com) 



### [Database Performance for Application Developers](https://youtu.be/f4QShF42c6E?t=21744)
##### Speaker: Aaron Francis - Valutazione: ★★★★★ - Livello: 3/5
Come migliorare le performance del nostro database andando ad agire su più livelli:

- schema: grandezza dei tipi, tipi giusti
- indici: b tree, indici multicolonna, ordinamento, colonne virtuali
- query: utilizzo indici, select, subquery


### [Christoph Dreams of Simple Code](https://youtu.be/f4QShF42c6E?t=24315)
##### Speaker: Christoph Rumpel - Valutazione: ★★★★☆ - Livello: 2/5
Riepiloga un po' la storia della sua vita personale e come sviluppatore, mostrando come è cambiato il suo codice negli anni ed il suo modo di pensare a proposito del codice.
Ha mostrato alcuni concetti per scrivere codice migliore, più leggibile, più testabile, più manutenibile e di cui andare più orgogliosi.


### [Is there any problem Git interactive rebase can't solve?](https://youtu.be/f4QShF42c6E?t=27069)
##### Speaker: Rissa Jackson - Valutazione: ★★★☆☆ - Livello: 4/5
Una panoramica sui comandi git con preferenza per gli interactive rebase:

- git merge vs git  rebase
- git drop <commit> => git rebase -i <commit>
- reword, amend
- squash, fixup 
- rebase abort

### [[Meaningful Mentorship](https://youtu.be/f4QShF42c6E?t=28126)<small> - </small>
##### Speaker: Alex Six - Valutazione: ★★★☆☆ - Livello: 2/5
Questo talk parla di cosa vuol dire essere Mentor, perchè diventarlo e i vantaggi che porta.
Come creare una relazione sana tra le parti ed incoraggiare i passi in avanti.
Utilizzare il pair programming per fare diventare l'allievo indipendente, definire degli obbiettivi ragionevoli e riuscire a farsi guidare da esso. 

### [I shall say… err define this only once<small>](https://youtu.be/f4QShF42c6E?t=29111) - </small>
##### Speaker: Freek Van der Herten - Valutazione: ★★★★★ - Livello: 3/5
Ha spiegato l'utilizzo del pacchetto [spatie/laravel-data](https://spatie.be/docs/laravel-data) che permette di definire un oggetto una sola volta per molteplici utilizzi come form request, api resource e  definizioni typescript.

### [I can't believe it's not local!](https://youtu.be/f4QShF42c6E?t=30223)
##### Speaker: Chris Fidao - Valutazione: ★★★★☆ - Livello: 3/5
Ha spiegato come lavorare completamente remoto senza aver niente installato in locale sul computer, per non avere dipendenze o dover fare installazioni di versioni di php, mysql ecc...
In locale si usa l'editor e git e tutto il resto su un server remoto.
Ha fatto un esempio utilizzando fly.io, vessel cli e mutagen.

### [Valid Variants of Validating Validation](https://youtu.be/f4QShF42c6E?t=31139)
##### Speaker: Luke Downing - Valutazione: ★★★★☆ - Livello: 2/5
Ha parlato di come validare le validazioni con diversi approcci incrementali: 

- snapshot delle regole
- array condiviso tra i test dei casi
- request factorty con il pacchetto [worksome/request-factories](https://github.com/worksome/request-factories)

### [A Grab Bag of Useful Tips](https://youtu.be/f4QShF42c6E?t=32271)
##### Speaker: Colin DeCarlo - Valutazione: ★★★☆☆ - Livello: 3/5

Ha spiegato 3 utili tip:

- Configurare XDebug con Valet in PHPStorm
- Shimming Data Functions con i test in SQLite (utilizzare funzionalità di Mysql con SQLite)
- Model Factory: come dare valori diversi alle colonne dei pivot con le `Sequence`

### [Browsers are Magical Creatures](https://youtu.be/f4QShF42c6E?t=33315)
##### Speaker: Stephen Rees-Carter - Valutazione: ★★★★☆ - Livello: 4/5

Ha parlato della sicurezza dei siti web attraverso la compilazione di alcuni Header (`X-Frame-Options`, `X-Content-Type-Options`, `Strict-Transport-Security`, `Content-Security-Policy`, `Referrer-Policy`, `Permissions-Policy`, `X-XSS-Protection`) e alcune modalità di attacco attraverso l'utilizzo di servizi ed esempi.

- Servizi per eseguire i controlli: [securityheaders.com](https://securityheaders.com/), [hstspreload.org](https://hstspreload.org).
- Esempio di clickjacking [portswigger.net](https://portswigger.net/web-security/clickjacking/lab-basic-csrf-protected)
- Servizio di report realtime di sicurezza [report-uri.com](https://report-uri.com/)
- Servizio per generare l'Header `Permissions-Policy`: [permissionspolicy.com](https://permissionspolicy.com/)

Poi ha spiegato il Subresource Integrity (SRI) con un esempio attraverso il codice di esempio di alpineJS ed il servizio (srihash.org)[https://www.srihash.org/].
Infine ha parlato di Cross-Origin Resource Sharing (CORS) e SameSite Cookies