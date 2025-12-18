
<header x-data="header()" x-init="init()"
    :class="headerShrink ? 'shadow-lg bg-black/95' : 'pb-2 bg-black/90'"
    class="sticky top-0 z-50 transition-all duration-300">

    @include('layouts.partials.topbar')

    <hr class="border-gray-200 m-0 hidden md:block"/> <div class="flex flex-wrap justify-between items-center px-4 py-3 md:px-6 md:py-2 transition-all duration-300 bg-white text-gray-900">

    @include('layouts.partials.navbar')
    @include('layouts.partials.mobile-navbar')
</header>