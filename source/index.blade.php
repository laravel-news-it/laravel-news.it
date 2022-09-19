@extends('_layouts.main')

@section('body')
@foreach ($posts->where('featured', true) as $featuredPost)

<div class="w-full mb-6 rounded-lg shadow-lg overflow-hidden">
    @if ($featuredPost->cover_image)
    <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
    @endif

    <div class="p-4 pt-0">
        <p class="text-gray-700 font-medium my-2">
            {{ $featuredPost->localeDate() }}
        </p>

        <h2 class="text-3xl mt-0">
            <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="text-gray-900 font-extrabold">
                {{ $featuredPost->title }}
            </a>
        </h2>

        <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

        <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="uppercase tracking-wide mb-4">
            Leggi
        </a>
    </div>
</div>

@endforeach

@include('_components.newsletter-signup')

@foreach ($posts->where('featured', false)->take(4)->chunk(2) as $row)
<div class="flex flex-col md:flex-row md:-mx-6">
    @foreach ($row as $post)
    <div class="w-full md:w-1/2 md:mx-6">
        @include('_components.post-preview-inline')
    </div>
    @endforeach
</div>
@endforeach

<div class="mt-2">
    <a href="/news/2/" title="Leggi tutte le news" class="uppercase tracking-wide mb-4">
        Sfoglia le news &raquo;
    </a>
</div>
@stop