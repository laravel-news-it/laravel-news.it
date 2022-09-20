@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')

<div>
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2 rounded-lg shadow-lg overflow-hidden">
    @endif

    <h1 class="leading-none mb-2">{{ $page->title }}</h1>

    <p class="text-gray-700 md:mt-0">{{ $page->author }}  •  {{ $page->localeDate() }}</p>

    <hr class="border-b my-4">

    <div class="mb-4 text-right">
    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a
                href="{{ '/news/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-Teal hover:bg-DarkBlue hover:text-white leading-loose tracking-wide text-white uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $category }}</a>
        @endforeach
    @endif
    </div>

    <div class="border-b border-blue-200 mb-10 pb-4" v-pre>
        @yield('content')
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>

@endsection
