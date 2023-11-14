---
title: Communities
description: Le community in italia
---
@extends('_layouts.main')

@section('body')
<h1>Communities</h1>

<img src="/assets/images/logo.jpg" alt="About image" class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

<p class="mb-6">Questo è un crowd blog nato per passione e voglia di condividere.</code></p>

<p class="mb-6">Qui trovate articoli, eventi e tutte le notizie che arrivano dai vari canali delle community di Laravel in Italia.</p>

<p class="mb-6">Ci impegnamo quotidianamente per tenerlo aggiornato, ci trovate nei canali che trovate qui sotto dove aggreghiamo le principali community e i social dove sono attive.</p>

<p class="mb-6">Se voleste partecipare con un articolo a tema PHP o Laravel potete mandarci una PR seguendo <a href="/news/creare-un-nuovo-articolo/">questo post</a>.</p>

<!--<a href="http://www.laravel-italia.it" target="_blank" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-8">
  <img class="object-cover h-24 rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/images/avatar@1x.jpg" alt="">
  <div class="flex flex-col justify-between p-2 leading-normal">
    <h5 class="text-xl p-0 m-0 mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Laravel Italia sito ufficiale</h5>
    <p class="font-normal  p-0 m-0 text-gray-700 dark:text-gray-400">Fondata da Francesco Malatesta è formata da quasi 1400 membri in vari canali che trovate su questa pagina</p>
  </div>
</a>-->

<a href="https://join.slack.com/t/laravel-italia/shared_invite/zt-26vqkwz5v-vlSCUSymEdAs7GnPLZ4qXA" target="_blank" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-8">
  <img class="object-cover h-24 rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/images/slack_logo.jpg" alt="">
  <div class="flex flex-col justify-between p-2 leading-normal">
    <h5 class="text-xl p-0 m-0 mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Laravel Italia su Slack</h5>
    <p class="font-normal  p-0 m-0 text-gray-700 dark:text-gray-400">Canale di scambio in tempo reale multi argomento, dove ci si trova per scambi di opinioni, news e discussioni. Per l'iscrizione cliccare su questo banner.</p>
  </div>
</a>

<a href="https://www.facebook.com/groups/laravel.italia.devs" target="_blank" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-8">
  <img class="object-cover h-24 rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/images/fb_logo.jpg" alt="">
  <div class="flex flex-col justify-between p-2 leading-normal">
    <h5 class="text-xl p-0 m-0 mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Laravel Italia su Facebook</h5>
    <p class="font-normal  p-0 m-0 text-gray-700 dark:text-gray-400">Composta da quasi 3000 membri è rivolta alle discussioni e alle domande</p>
  </div>
</a>

<a href="https://t.me/laravel_ita" target="_blank" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-8">
  <img class="object-cover h-24 rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/images/telegram_logo.jpg" alt="">
  <div class="flex flex-col justify-between p-2 leading-normal">
    <h5 class="text-xl p-0 m-0 mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Laravel Italia su Telegram</h5>
    <p class="font-normal  p-0 m-0 text-gray-700 dark:text-gray-400">Community di quasi 200 persone.</p>
  </div>
</a>

<a href="https://www.linkedin.com/groups/4844390/" target="_blank" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-8">
  <img class="object-cover h-24 rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/images/linkedIn_logo.png" alt="">
  <div class="flex flex-col justify-between p-2 leading-normal">
    <h5 class="text-xl p-0 m-0 mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Laravel Italia su LinkedIn</h5>
    <p class="font-normal  p-0 m-0 text-gray-700 dark:text-gray-400">Formata da 500 membri nel network rivolto ai professionisti.</p>
  </div>
</a>


<a href="https://grusp.org" target="_blank" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-8">
  <img class="object-cover h-24 rounded-t-lg md:rounded-none md:rounded-l-lg" src="/assets/images/grusp-logo.png" alt="">
  <div class="flex flex-col justify-between p-2 leading-normal">
    <h5 class="text-xl p-0 m-0 mb-2 font-bold tracking-tight text-gray-900 dark:text-white">GrUsp su Slack</h5>
    <p class="font-normal  p-0 m-0 text-gray-700 dark:text-gray-400">Questa associazione si occupa di far crescere i dev e le community, comprese le nostre, e organizza eventi a livello nazionale e internazionale come PHP day e laravel day.</p>
  </div>
</a>

@endsection
