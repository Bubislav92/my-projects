<header class="sticky top-0 z-50 bg-primary-50/95 backdrop-blur-sm shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Логотип (Вила Аурора) --}}
            <a href="/" class="flex items-center">
                <span class="text-3xl font-serif font-bold text-accent-500 tracking-wider">
                    Вила „Аурора”
                </span>
            </a>

            {{-- Главна навигација (за велике екране) --}}
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-lg font-medium text-primary-900 hover:text-accent-500 transition duration-300">
                    Почетна
                </a>
                <a href="{{ route('about') }}" class="text-lg font-medium text-primary-900 hover:text-accent-500 transition duration-300">
                    О нама
                </a>
                <a href="{{ route('gallery') }}" class="text-lg font-medium text-primary-900 hover:text-accent-500 transition duration-300">
                    Галерија
                </a>
                <a href="{{ route('accommodation') }}" class="text-lg font-medium text-primary-900 hover:text-accent-500 transition duration-300">
                    Смештај
                </a>
                <a href="{{ route('contact') }}" class="text-lg font-medium text-primary-900 hover:text-accent-500 transition duration-300">
                    Контакт
                </a>
            </nav>

            {{-- Дугме за резервацију --}}
            <div class="hidden md:block">
                <a href="{{ route('appointment') }}" class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base font-medium rounded-full text-primary-50 bg-accent-500 hover:bg-accent-700 transition duration-300 shadow-lg">
                    Резервиши
                </a>
            </div>

            {{-- Дугме за мобилни мени (Хамбургер) --}}
            <button class="md:hidden p-2 rounded-md text-primary-900 hover:text-accent-500 focus:outline-none focus:ring-2 focus:ring-accent-500"
                aria-label="Отвори мени"
                onclick="document.getElementById('mobile-menu').classList.toggle('hidden');">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </div>

    {{-- Мобилни мени (Појављује се на малим екранима) --}}
    <div id="mobile-menu" class="hidden md:hidden bg-primary-50 border-t border-primary-900/10">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary-900 hover:bg-primary-900/10 hover:text-accent-500">
                Почетна
            </a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary-900 hover:bg-primary-900/10 hover:text-accent-500">
                О нама
            </a>
            <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary-900 hover:bg-primary-900/10 hover:text-accent-500">
                Галерија
            </a>
            <a href="{{ route('accommodation') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary-900 hover:bg-primary-900/10 hover:text-accent-500">
                Смештај
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary-900 hover:bg-primary-900/10 hover:text-accent-500">
                Контакт
            </a>
            <a href="{{ route('appointment') }}" class="block w-full text-center mt-4 px-4 py-2 text-base font-medium rounded-md text-primary-50 bg-accent-500 hover:bg-accent-700 transition duration-300">
                Резервиши
            </a>
        </div>
    </div>
</header>