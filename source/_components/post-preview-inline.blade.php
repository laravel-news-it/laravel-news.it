<div class="flex flex-col mb-4">
    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        @if ($post->cover_image)
            <div class="flex-shrink-0">
            <img class="h-48 w-full object-cover" src="{{ $post->cover_image }}" alt="{{ $post->title }} cover image">
            </div>
        @endif

        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">

          @if ($post->categories)
            @foreach ($post->categories as $i => $category)

            <a
                href="{{ '/news/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-Teal hover:bg-DarkBlue hover:text-white leading-loose tracking-wide text-white uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $category }}</a>

            @endforeach
          @endif

            <a href="{{ $post->getUrl() }}" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">{{ $post->title }}</p>
              <p class="mt-3 text-base text-gray-500">{!! $post->getExcerpt(200) !!}</p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            <div class="flex text-sm text-gray-500">
            <time datetime="2020-03-10">{{ $post->getDate()->format('F j, Y') }}</time>
            </div>
          </div>
        </div>
      </div>
</div>
