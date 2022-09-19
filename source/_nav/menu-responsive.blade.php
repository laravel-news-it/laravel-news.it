<nav id="js-nav-menu" class="w-auto px-2 pt-6 pb-2 bg-gray-200 shadow hidden lg:hidden">
    <ul class="my-0">
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} News"
                href="/news"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/news') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }}"
            >News</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Community"
                href="/communities"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/communities') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }}"
            >Community</a>
        </li>
    </ul>
</nav>
