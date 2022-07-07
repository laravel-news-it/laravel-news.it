---
extends: _layouts.post
section: content
title: Creare un nuovo articolo
date: 2022-06-03
description: Creare un nuovo articolo per il blog di laravel news italia
categories: [configuration]
cover_image: /assets/articles/creare-un-nuovo-articolo.png
author: Alessandro Cappellozza
---
Il sistema crea articoli usando file in formato MD quindi per elaborarlo si procede molto semplicemente come segue usando git, quindi molto dev friendly.
Ricordate che il nome del file rappresetera' anche l'url dell'articolo quindi scrivetelo in modo chiaro e completo.

```bash
git clone https://github.com/laravel-news-it/

cd laravel-news.it/source/_posts

touch nuovo-articolo.md

vi nuovo-articolo.md
```
Il nome del file deve essere composto da [ANNO]-[MESE]-titolo in formato slug es: `22-07-titolo.md`


Nella parte iniziale del file vanno messi i dati dell'articolo in questa maniera:


```
---
extends: _layouts.post
section: content
title: Creare un nuovo articolo
date: 2022-06-03
description: Creare un nuovo artcolo per il blog di laravel news italia
categories: [news]
cover_image: /assets/articles/22-07-nome-del-file.png
author: Alessandro Cappellozza
---
```

Le prime parti sono i layout e quelle non vanno toccate, parlo di extends e secton. Le rimanamenti hanno questi significati:

| Header   | Desacrizione                                                                                                                         |
|----------|--------------------------------------------------------------------------------------------------------------------------------------|
| **title**| Titolo dell'articolo.                                                                                                                |
| **date** | Data in formato ISO                                                                                                                  |
| **description**| Descrizione completa dell'artticolo.                                                                                                 |
| **categories**| Questi sono i tag che potete inserire, se ne possono inserire anche più di uno [events,contents,mnews,packages,php,tips,tutorials].  |
| **cover_image**| L'immaginbe di copertina e' molto importante per dare un contesto visivo all'articolo. Il rapporto deve essere 3:1 es 1200x400px.    |
| **author**| Il vosto nome e congome.                                                                                                             |
| **excerpt**| E' opzionale, serve per descrivere meglio il riassunto dell'articolo nel caso non vogliate che lo faccia il sistema automaticamente. |

Nell'easempio e' utilizzato vim ma potete utilizzare qualsiasi altro editor, le immagini invece potere aggiungerle fisicamente a in questa cartella:

```bash
cd source/assets/articles/
```

Preferibilmente mettete file ben compressi o vettoriali; in caso abbiate piu' di un file e' meglio fare una cartella col nome dell'articolo.


Per fare una preview del vostro articolo potete lanciare il sito in modalita' di debug in questa maniera.

```bash
# Necessario solo se e' la prima volta che si avvia
composer install
npm install

# Lancio in modalita' debug
npm run watch
```

Per la richiesta di pubblicazione potete procedere con una pull request verso il repository origine. 
Potete creare quindi un nuovo branch con ***"git checkout -b nuovo-articolo"*** e poi effettuare la ***"pull-request"***.
