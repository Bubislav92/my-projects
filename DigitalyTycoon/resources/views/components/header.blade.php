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
            <a href="{{ route('home') }}" class="hover:text-accent transition duration-300">Почетна</a>
            <a href="{{ route('about') }}" class="hover:text-accent transition duration-300">О нама</a>
            <a href="{{ route('services') }}" class="hover:text-accent transition duration-300">Услуге</a>
            <a href="{{ route('portfolio') }}" class="hover:text-accent transition duration-300">Портфолио</a>
            <a href="{{ route('contact') }}" class="hover:text-accent transition duration-300">Контакт</a>
        </div>

        {{-- Selekcija jezika (Dropdown) --}}
        <div class="relative group">
            <button class="flex items-center text-dark-gray hover:text-primary-green transition duration-300 focus:outline-none">
                {{ strtoupper($currentLocale) }}
                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                <div class="py-1">
                    @foreach($supportedLocales as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ $currentLocale == $localeCode ? 'bg-gray-200 font-bold' : '' }}">
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
</header>
