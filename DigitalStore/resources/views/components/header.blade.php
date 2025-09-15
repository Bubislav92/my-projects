<header class="bg-background-dark text-text-primary shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between p-4 md:p-6">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            {{-- You can add an SVG icon here, for example: --}}
            <svg class="h-8 w-8 text-accent-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9.25 10.75m0 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0m9 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0m-4.5 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0m9 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0" />
            </svg>
            <span class="text-xl font-bold">Digital Store</span>
        </a>

        {{-- Navigation Links (hidden on mobile) --}}
        <nav class="hidden md:flex space-x-8">
            <a href="{{ route('home') }}" class="hover:text-accent-green transition-colors duration-300">Home</a>
            <a href="{{ route('shop') }}" class="hover:text-accent-green transition-colors duration-300">Shop</a>
            <a href="{{ route('about') }}" class="hover:text-accent-green transition-colors duration-300">About</a>
            <a href="{{ route('blog') }}" class="hover:text-accent-green transition-colors duration-300">Blog</a>
            <a href="{{ route('contact') }}" class="hover:text-accent-green transition-colors duration-300">Contact</a>
        </nav>

        {{-- Action Buttons and Mobile Menu Toggle --}}
        <div class="flex items-center space-x-4">
            <a href="/login" class="text-sm font-medium hover:text-accent-green transition-colors duration-300 hidden md:block">
                Log In
            </a>
            <a href="/register" class="text-sm font-medium px-4 py-2 rounded-lg bg-accent-orange text-white hover:bg-opacity-80 transition-all duration-300 hidden md:block">
                Sign Up
            </a>

            {{-- Cart Button --}}
            <a href="/cart" class="relative hover:text-accent-green transition-colors duration-300">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1.5 9H5.5L4 3zM7 21h10a2 2 0 002-2v-4a2 2 0 00-2-2H7a2 2 0 00-2 2v4a2 2 0 002 2z" />
                </svg>
                <span class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-accent-green text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                    0
                </span>
            </a>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-button" class="md:hidden">
                <svg class="h-6 w-6 text-text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu (hidden by default) --}}
    <div id="mobile-menu" class="hidden md:hidden bg-background-dark p-4 border-t border-gray-700">
        <a href="{{ route('home') }}" class="block py-2 text-text-primary hover:text-accent-green transition-colors duration-300">Home</a>
        <a href="{{ route('shop') }}" class="block py-2 text-text-primary hover:text-accent-green transition-colors duration-300">Shop</a>
        <a href="{{ route('about') }}" class="block py-2 text-text-primary hover:text-accent-green transition-colors duration-300">About</a>
        <a href="{{ route('blog') }}" class="block py-2 text-text-primary hover:text-accent-green transition-colors duration-300">Blog</a>
        <a href="{{ route('contact') }}" class="block py-2 text-text-primary hover:text-accent-green transition-colors duration-300">Contact</a>
        <hr class="my-2 border-gray-700">
        <a href="/login" class="block py-2 text-text-primary hover:text-accent-green transition-colors duration-300">Log In</a>
        <a href="/register" class="block py-2 text-white bg-accent-orange rounded-lg text-center font-bold">Sign Up</a>
    </div>
</header>