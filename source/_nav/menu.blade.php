<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} News" href="/news"
        class="ml-6 text-Teal hover:text-Lime {{ $page->isActive('/news') ? 'active text-Lime' : '' }}">
        { News }
    </a>

    <a title="{{ $page->siteName }} Community" href="/communities"
        class="ml-6 text-Teal hover:text-Lime {{ $page->isActive('/communities') ? 'active text-Lime' : '' }}">
        { Community }
    </a>
</nav>
