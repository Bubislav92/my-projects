<header class="bg-primary text-light py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4">
        <a href="/" class="text-2xl font-bold font-serif">
            <span class="text-secondary">R</span>enova
        </a>
        <nav class="hidden md:flex space-x-6">
            <a href="{{ route('services') }}" class="hover:text-secondary transition-colors duration-300">Услуге</a>
            <a href="{{ route('projects') }}" class="hover:text-secondary transition-colors duration-300">Пројекти</a>
            <a href="{{ route('about-us') }}" class="hover:text-secondary transition-colors duration-300">О нама</a>
            <a href="{{ route('contact') }}" class="hover:text-secondary transition-colors duration-300">Контакт</a>
        </nav>
        <a href="{{ route('request-quote') }}" class="bg-secondary text-primary px-4 py-2 rounded-full font-semibold hover:bg-yellow-400 transition-colors duration-300">
            Затражи понуду
        </a>
        <button class="md:hidden text-light">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</header>
