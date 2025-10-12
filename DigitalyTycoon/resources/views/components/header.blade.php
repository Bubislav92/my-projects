@php
    // Dobijamo sve podržane jezike definisane u config/localization.php
    $supportedLocales = Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();
    // Dobijamo trenutni jezik
    $currentLocale = Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
@endphp

<header class="bg-primary-dark text-text-light sticky top-0 z-50 shadow-md">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-3xl font-bold text-accent">DigitalyTycoon</a>

        <div class="space-x-8 hidden md:flex">
            <a href="{{ route('home') }}" class="hover:text-accent transition duration-300">{{ __('home_page.home') }}</a>
            <a href="{{ route('about') }}" class="hover:text-accent transition duration-300">{{ __('home_page.about') }}</a>
            <a href="{{ route('services') }}" class="hover:text-accent transition duration-300">{{ __('home_page.services') }}</a>
            <a href="{{ route('portfolio') }}" class="hover:text-accent transition duration-300">{{ __('home_page.portfolio') }}</a>
            <a href="{{ route('shop') }}" class="hover:text-accent transition duration-300">Shop</a>
            <a href="{{ route('contact') }}" class="hover:text-accent transition duration-300">{{ __('home_page.contact') }}</a>
        </div>

        {{-- Selekcija jezika (Dropdown) --}}
        <div class="relative group">
            <button class="flex items-center text-text-light hover:text-accent transition duration-300 focus:outline-none">
                <span class="font-semibold">{{ strtoupper($currentLocale) }}</span>
                <svg class="w-4 h-4 ml-1 fill-current" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-primary-dark border border-gray-700 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                <div class="py-1 max-h-64 overflow-y-auto">
                    @foreach($supportedLocales as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           class="block px-4 py-2 text-sm text-text-light hover:bg-accent transition duration-300 {{ $currentLocale == $localeCode ? 'bg-accent font-bold' : '' }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="md:hidden">
            <button id="mobile-menu-btn" class="text-text-light focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobilni meni (skriven po defaultu) --}}
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block text-text-light hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">{{ __('home_page.home') }}</a>
            <a href="{{ route('about') }}" class="block text-text-light hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">{{ __('home_page.about') }}</a>
            <a href="{{ route('services') }}" class="block text-text-light hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">{{ __('home_page.services') }}</a>
            <a href="{{ route('portfolio') }}" class="block text-text-light hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">{{ __('home_page.portfolio') }}</a>
            <a href="{{ route('contact') }}" class="block text-text-light hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">{{ __('home_page.contact') }}</a>
        </div>
    </div>

</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function() {
            // Prebacuje 'hidden' klasu na meniju, čime ga prikazuje ili skriva
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
