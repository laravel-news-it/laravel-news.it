{!! '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>' !!}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:media="http://search.yahoo.com/mrss/">
    <channel>
        <title>{{ $page->siteName }}</title>
        <link>{{ $page->baseUrl }}</link>
        <description><![CDATA[{{ $page->siteDescription }}]]></description>
        <atom:link href="{{ $page->getUrl() }}" rel="self" type="application/rss+xml" />
        <language>{{ $page->siteLanguage }}</language>
        <lastBuildDate>{{ $posts->first()->getDate()->format(DateTime::RSS) }}</lastBuildDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{!! $post->title !!}]]></title>
                <link>{{ $post->getUrl() }}</link>
                <guid isPermaLink="true">{{ $post->getUrl() }}</guid>
                <description><![CDATA[{!! $post->description !!}]]></description>
                <content:encoded><![CDATA[{!! $post->getContent() !!}]]></content:encoded>
                <dc:creator xmlns:dc="http://purl.org/dc/elements/1.1/">{{ $post->author }}</dc:creator>
                <pubDate>{{ $post->getDate()->format(DateTime::RSS) }}</pubDate>

                @if($post->cover_image)
                    <media:content
                            medium="image"
                            url="{{ $page->baseUrl . $post->cover_image }}"
                            type="image/jpeg"
                            width="150"
                            height="150" />
                @endif
            </item>
        @endforeach
    </channel>
</rss>