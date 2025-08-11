<header class="bg-white shadow-md py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        {{-- Logo --}}
        <div>
            <a href="{{ route('welcome') }}" class="text-3xl font-bold text-dark-gray hover:text-primary-green transition duration-300">
                Vesna's Web Store
            </a>
        </div>

        {{-- Navigacija --}}
        <nav class="hidden md:flex space-x-8">
            <a href="{{ route('welcome') }}" class="text-dark-gray hover:text-primary-green transition duration-300 font-medium text-lg">Home</a>
            <a href="{{ route('products.index') }}" class="text-dark-gray hover:text-primary-green transition duration-300 font-medium text-lg">Products</a>
            <a href="{{ route('blog') }}" class="text-dark-gray hover:text-primary-green transition duration-300 font-medium text-lg">Blog</a>
            <a href="{{ route('faqs') }}" class="text-dark-gray hover:text-primary-green transition duration-300 font-medium text-lg">FAQs</a>
            <a href="{{ route('about') }}" class="text-dark-gray hover:text-primary-green transition duration-300 font-medium text-lg">About Us</a>
            <a href="{{ route('contact') }}" class="text-dark-gray hover:text-primary-green transition duration-300 font-medium text-lg">Contact</a>
        </nav>

        {{-- Ikone (Search, Wishlist, Cart) i Auth Linkovi --}}
        <div class="flex items-center space-x-6">
            {{-- Search icon (tvoja SVG ikona) --}}
            <button id="openSearchModalBtn" class="text-dark-gray hover:text-primary-green transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            {{-- Wishlist icon (NOVA SVG ikona za srce) --}}
            <a href="{{ route('dashboard.wishlist') }}" class="relative text-dark-gray hover:text-primary-green transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                @if ($wishlistCount > 0)
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{ $wishlistCount }}</span>
                @endif
            </a>

            {{-- Shopping Cart icon (tvoja SVG ikona) --}}
            <a href="{{ route('components.cart') }}" class="relative text-dark-gray hover:text-primary-green transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.183 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                @if ($cartCount > 0)
                <span class="absolute -top-2 -right-2 bg-primary-green text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                @endif
            </a>

            {{-- Auth Linkovi (Login/Register) --}}
            <div class="hidden md:flex space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-medium text-dark-gray hover:text-primary-green transition duration-300 text-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-dark-gray hover:text-primary-green transition duration-300 text-lg">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium text-dark-gray hover:text-primary-green transition duration-300 text-lg">Register</a>
                    @endif
                @endauth
            </div>

            {{-- Hamburger meni za mobilne (vidljiv samo na manjim ekranima) --}}
            <button class="md:hidden text-dark-gray hover:text-primary-green transition duration-300">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    {{-- Blade: прослеђивање руте у JS --}}
    <script>
        window.routes = {
            search: @json(route('products.search'))
        };
    </script>

    {{-- Модал за претрагу производа --}}
    <div id="searchModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-start justify-center z-50 hidden pt-20">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-2xl w-full relative mx-4">
            <button id="closeSearchModalBtn" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h3 class="text-2xl font-semibold text-dark-gray mb-4 text-center">Претрага производа</h3>
            
            <div class="mb-4 relative">
                <input type="text" id="searchInput" placeholder="Унесите назив производа..." class="w-full border border-gray-300 rounded-md py-3 px-4 pr-10 text-lg focus:ring-primary-green focus:border-primary-green transition duration-200">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <div id="searchResults" class="max-h-80 overflow-y-auto border border-gray-200 rounded-md p-2 mt-4">
                <p id="noResults" class="text-center text-gray-500 py-4 hidden">Нема резултата.</p>
            </div>
        </div>
    </div>
</header>