<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:locale" content="it_IT"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />
        
        @if($page->cover_image )
        <meta property="og:image" content="{{ $page->cover_image }}" />
        <meta name="twitter:image" content="{{ $page->cover_image }}"/>
        @endif

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta name="twitter:description" content="{{ $page->description ?? $page->siteDescription }}"/>

        <link rel="apple-touch-icon" sizes="57x57" href="/assets/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
        <link rel="manifest" href="/assets/icons/manifest.json">
        <meta name="msapplication-TileColor" content="#F48220">
        <meta name="msapplication-TileImage" content="/assets/icons/ms-icon-144x144.png">
        <meta name="theme-color" content="#F48220"/>

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link href="/news/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">       
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-DirtyWhite text-gray-800 leading-normal font-sans">
        <header class="flex items-center shadow bg-DarkBlue border-b h-24 py-4" role="banner">
            <div class="container flex items-center max-w-4xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <div class="p-2 rounded bg-white">
                            <img class="h-6 md:h-10" src="/assets/images/logo.jpg" alt="{{ $page->siteName }} logo" />
                        </div>
                    </a>
                </div>

                <div id="vue-search" class="flex flex-1 justify-end items-center bg-DarkBlue">
                    <search></search>

                    @include('_nav.menu')

                    @include('_nav.menu-toggle')
                </div>
            </div>
        </header>

        @include('_nav.menu-responsive')

        <main role="main" class="flex-auto w-full container max-w-4xl mx-auto py-16 px-6">
            @yield('body')
        </main>

        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center list-none">
                <li class="md:mr-2">
                    &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}.
                </li>

                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')
    </body>
</html>
