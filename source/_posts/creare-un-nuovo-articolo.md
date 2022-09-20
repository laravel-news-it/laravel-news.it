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
Ricordate che il nome del file rappreseterà anche l'url dell'articolo quindi scrivetelo in modo chiaro e completo.

```bash
git clone https://github.com/laravel-news-it/

cd laravel-news.it/source/_posts

touch nuovo-articolo.md

vi nuovo-articolo.md
```
Il nome del file deve essere composto da [ANNO]-[MESE]-titolo in formato slug es: `22-12-titolo.md`


Nella parte iniziale del file vanno messi i metadati dell'articolo in questa maniera:


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

| Header   | Desacrizione                                                                                                                             |
|----------|------------------------------------------------------------------------------------------------------------------------------------------|
| **title**| Titolo dell'articolo.                                                                                                                    |
| **date** | Data in formato ISO                                                                                                                      |
| **description**| Descrizione completa dell'artticolo.                                                                                                     |
| **categories**| Questi sono i tag che potete inserire, se ne possono inserire anche più di uno [events, contents, news, packages, php, tips, tutorials]. |
| **cover_image**| L'immaginbe di copertina è molto importante per dare un contesto visivo all'articolo. Il rapporto deve essere 3:1 es 1200x400px.         |
| **author**| Il vosto nome e congome.                                                                                                                 |
| **excerpt**| è opzionale, serve per descrivere meglio il riassunto dell'articolo nel caso non vogliate che lo faccia il sistema automaticamente.      |

Nell'easempio è utilizzato vim ma potete utilizzare qualsiasi altro editor, le immagini invece potere aggiungerle fisicamente a in questa cartella:

```bash
cd source/assets/articles/
```

Preferibilmente mettete file ben compressi o vettoriali; in caso abbiate piu' di un file è meglio fare una cartella col nome dell'articolo.  
Se vi servono immagini con codice sorgente potete usare questo servizio online [10015](https://10015.io/tools/code-to-image-converter).

Potete inserire parti di codice con questa sintassi:
```markdown
 ```linguaggio
  codice
 ```
```
I linguaggi supportati sono: `bash`, `css`, `html`, `javascript`, `json`, `markdown`, `php`, `scss`, `yaml`.  
Potete comunque prendere spunto dagli articoli già scritti.

Per fare una preview del vostro articolo potete lanciare il sito in modalità di debug in questa maniera.

```bash
# Necessario solo se è la prima volta che si avvia
composer install
npm install

# Lancio in modalità debug
npm run watch
```


Per la richiesta di pubblicazione potete procedere con una pull request verso il repository origine. 

Potete creare quindi un nuovo branch con   
`git checkout -b nuovo-articolo`  
e poi effettuare la ***pull-request***.
