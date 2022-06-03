<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} News" href="/news"
        class="ml-6 text-Teal hover:text-Lime {{ $page->isActive('/news') ? 'active text-Lime' : '' }}">
        News
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-Teal hover:text-Lime {{ $page->isActive('/about') ? 'active text-Lime' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="ml-6 text-Teal hover:text-Lime {{ $page->isActive('/contact') ? 'active text-Lime' : '' }}">
        Contact
    </a>
</nav>
