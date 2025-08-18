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

        <div class="md:hidden">
            <button id="mobile-menu-btn" class="text-text-light focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>
</header>
