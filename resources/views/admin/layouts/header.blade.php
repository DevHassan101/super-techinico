<!-- Header -->
<header class="header">
    <button id="hamburger-btn" class="block lg:hidden p-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <h1 class="text-2xl font-bold">@yield('page-title')</h1>
    <div class="top-actions">
        <div class="relative">
            <!--<select class="sort-dropdown" id="sortDropdown">-->
            <!--  <option value="newest">Newest</option>-->
            <!--  <option value="oldest">Oldest</option>-->
            <!--  <option value="price-high">Price: High to Low</option>-->
            <!--  <option value="price-low">Price: Low to High</option>-->
            <!--</select>-->
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="icon-logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
            </button>
        </form>
    </div>
</header>
