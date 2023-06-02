---
extends: _layouts.post
section: content
title: Semplificare le immagini Docker con Octane
date: 2022-07-15
description: Si possono semplificare le immagini usando Octane? Si!
categories: [devops,tips,php]
cover_image: /assets/img/post-cover-image-2.png
author: Alessandro Cappellozza
featured: false
excerpt: Le immagini docker php sono spesso composte di molte parti, vediamo come semplificarle.
---

Dal punto di vista sistemistico sappiamo bene che **PHP** e' un linguaggio che lato web puo' funzionare come cgi o come modulo. Vengono in mente immediatamente FPM e Apache che, tradotti in un file docker si trasformano in piu' container per far partire solo il worker web, ricordiamo infatti che la regola d'oro e' "un container un processo".

Partendo dal caso peggiore **FPM** ha bisogno di un container per lui e uno per il web server, se ricordiamo **Nginx** comunica tramite una porta con l'interprete, di solito la **9000**. Da questo punto di vista **PHP** e' piu' indietro di altri linguaggi; **Node** ha un web server interno come pure **Python** e possono partire tranquillamente come servizio, con **PHP** dovremmo usare:

```bash
php artisan serve
```

che come comprendete non e' il massimo se non per debugging o test locali, come del resto fa sail internamente. Il primo pensiero e' quello di usare il modulo di **Apache** quindi di far partire un unico processo in questa maniera:

```dockerfile
FROM composer AS composer

WORKDIR /app
COPY ./ /app

RUN composer install \
  --optimize-autoloader \
  --no-interaction \
  --no-progress

FROM node:16 AS node

WORKDIR /app
COPY ./ /app

RUN npm install
RUN npm run build

FROM php:8.1-apache-buster

ENV PORT 80
EXPOSE 80

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --chown=www-data --from=composer /app /var/www/html
COPY --chown=www-data --from=node /app /var/www/html
```

Come vedere il file parte da composer, installa i pacchetti, fa lo stesso con node e prosegue facendo partire **Apache**, per vederlo in funzione si possono usare questi comandi:

```bash
docker build -t laravel-apache:1.0 .
docker run laravel-apache:1.0
```

Questo e' gia' un buon passo avanti anche se rimangono problemi di performance legati al fatto che i file vengono comunque ricaricati ad ogni passaggio e che **Apache** e' piu' lento di **Nginx**. Dopo l'intervento di **Roberto** al **Laravel Day 2022** mi e' venuto in mente che anche qui **Octane** potrebbe venirmi in aiuto quindi mi sono messo a fare qualche prova anche se, lo ammetto, non ho ancora letto tutto il libro ([High Performance Laravel Octane](https://www.amazon.it/High-Performance-Laravel-Octane-asynchronous-ebook/dp/B0BJ4XS8VT/)) e sicuramente pecco di diverse ottimizzazioni.


**Octane** e' fatto a posta per evitare ricaricamenti continui, ma i driver sono due, quale usare? La risposta e' piuttosto semplice ed e' **Swoole** perché e' compilato come modulo di **PHP** mentre **Road Runner** tratta la cosa come CGI tornando al problema originario.

Cercando "ispirazione" sui vari repository ([qui il mio riferimento](https://github.com/exaco/laravel-octane-dockerfile/blob/main/Dockerfile)) e' possibile arrivare ad un'immagine basata su **PHP 8.1** con le personalizzazioni di cui ho parlato l'installazione dei vari pacchetti. La compilazione e lo start e' identico a quello di **Apache** ma le prestazioni sono veramente piu' interessanti come anche il consumo di memoria, parliamo di **10ms**.

```dockerfile
FROM node:16 AS node

WORKDIR /var/www/html
COPY ./ /var/www/html

RUN npm install
RUN npm run build

FROM composer:latest AS vendor
WORKDIR /var/www/html
COPY composer* ./
RUN composer install \
  --no-dev \
  --no-interaction \
  --prefer-dist \
  --ignore-platform-reqs \
  --optimize-autoloader \
  --apcu-autoloader \
  --ansi \
  --no-scripts

FROM php:8.1-cli-buster

ARG WWWUSER=1000
ARG WWWGROUP=1000
ARG TZ=UTC
ARG CONTAINER_MODE=app

ENV DEBIAN_FRONTEND=noninteractive \
    TERM=xterm-color

ENV ROOT=/var/www/html
WORKDIR $ROOT

SHELL ["/bin/bash", "-eou", "pipefail", "-c"]

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
    && echo $TZ > /etc/timezone

RUN apt-get update; \
    apt-get upgrade -yqq; \
    pecl -q channel-update pecl.php.net; \
    apt-get install -yqq --no-install-recommends --show-progress \
          apt-utils \
          gnupg \
          gosu \
          git \
          curl \
          wget \
          libcurl4-openssl-dev \
          ca-certificates \
          libmemcached-dev \
          libz-dev \
          libbrotli-dev \
          libpq-dev \
          libjpeg-dev \
          libpng-dev \
          libfreetype6-dev \
          libssl-dev \
          libwebp-dev \
          libmcrypt-dev \
          libonig-dev \
          libzip-dev zip unzip \
          libargon2-1 \
          libidn2-0 \
          libpcre2-8-0 \
          libpcre3 \
          libxml2 \
          libzstd1 \
          procps

RUN docker-php-ext-install pdo_mysql;
RUN docker-php-ext-configure zip && docker-php-ext-install zip;
RUN docker-php-ext-install mbstring;
RUN docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-freetype \
    && docker-php-ext-install gd;

RUN docker-php-ext-install opcache;
RUN pecl -q install -o -f redis \
      && rm -rf /tmp/pear \
      && docker-php-ext-enable redis;


RUN docker-php-ext-install pcntl;
RUN docker-php-ext-install bcmath;
RUN apt-get install -yqq --no-install-recommends --show-progress librdkafka-dev \
      && pecl -q install -o -f rdkafka \
      && docker-php-ext-enable rdkafka;

RUN apt-get install -yqq --no-install-recommends --show-progress libc-ares-dev \
      && pecl -q install -o -f -D 'enable-openssl="yes" enable-http2="yes" enable-swoole-curl="yes" enable-mysqlnd="yes" enable-cares="yes"' openswoole \
      && docker-php-ext-enable openswoole; 
RUN apt-get install -yqq --no-install-recommends --show-progress zlib1g-dev libicu-dev g++ \
      && docker-php-ext-configure intl \
      && docker-php-ext-install intl;

RUN pecl -q install -o -f memcached && docker-php-ext-enable memcached;
RUN apt-get install -yqq --no-install-recommends --show-progress default-mysql-client;

RUN groupadd --force -g $WWWGROUP octane \
    && useradd -ms /bin/bash --no-log-init --no-user-group -g $WWWGROUP -u $WWWUSER octane

RUN apt-get clean \
    && docker-php-source delete \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && rm /var/log/lastlog /var/log/faillog

COPY . .
COPY --from=vendor ${ROOT}/vendor vendor
COPY --from=node ${ROOT}/node_modules node_modules
COPY --from=node ${ROOT}/public public

RUN mkdir -p \
  storage/framework/{sessions,views,cache} \
  storage/logs \
  bootstrap/cache \
  && chown -R octane:octane \
  storage \
  bootstrap/cache \
  && chmod -R ug+rwx storage bootstrap/cache

COPY deployment/octane/php.ini /usr/local/etc/php/conf.d/octane.ini
COPY deployment/octane/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

ENV PORT 9000
EXPOSE 9000

RUN php artisan --version

CMD [ "php", "/var/www/html/artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=9000" ]
```

Potete trovare maggiori dettagli sui file mancanti [qui](https://github.com/eppak/scaleway-serverless-container) insieme a quelli di **Apache** e di un benchmark con **NestJS** come riferimento, come potete immaginare questo al fine di avere qualcosa di leggero e atomico per **Knative** di cui mi piacerebbe parlarvi magari in un prossimo articolo.