<header class="bg-white shadow-md py-4">
    <nav class="container mx-auto flex justify-between items-center px-4">
        <a href="/" class="flex items-center space-x-2 animate-fade-in-left opacity-0" style="animation-delay: 0.1s;">
            <img src="{{ asset('images/logo.png') }}" alt="Мој Мулти Вендор Лого" class="h-10"> {{-- Додајте своју слику логоа --}}
            <span class="text-2xl font-bold text-gray-800">Мој <span class="text-orange-400">Мулти</span> Вендор</span>
        </a>

        <ul class="hidden md:flex space-x-8 animate-fade-in-up opacity-0" style="animation-delay: 0.2s;">
            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors duration-300">Почетна</a></li>
            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors duration-300">Продавнице</a></li>
            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors duration-300">Производи</a></li>
            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors duration-300">О нама</a></li>
            <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors duration-300">Контакт</a></li>
        </ul>

        <div class="flex items-center space-x-4 animate-fade-in-right opacity-0" style="animation-delay: 0.3s;">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-emerald-500 transition-colors duration-300">Контролна табла</a>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-emerald-500 transition-colors duration-300">Пријава</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-emerald-400 text-white py-2 px-4 rounded-full shadow-md transition-all duration-300 hover:bg-emerald-500 hover:scale-105">Регистрација</a>
                @endif
            @endauth
        </div>

        <div class="md:hidden">
            <button class="text-gray-600 hover:text-orange-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </nav>
</header>
