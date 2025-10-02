@php
    // Подесите руту за лого да увек води на 'welcome' ако није пријављен, или на 'home' ако јесте.
    $logoRoute = Auth::check() ? route('home') : route('welcome');
@endphp

<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- ЛОГО (CareerWire) --}}
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ $logoRoute }}" class="text-2xl font-bold text-carrerwire-green hover:text-carrerwire-green-dark transition duration-150 ease-in-out">
                    CareerWire
                </a>
            </div>

            {{-- Главна Навигација (Видљива само пријављеним корисницима) --}}
            @auth
                <nav class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    {{-- Рута за Фид (Home) --}}
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out 
                        {{ request()->routeIs('home') ? 'border-carrerwire-green text-gray-700' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                        Почетна
                    </a>
                    {{-- 2. Мрежа (Connections) --}}
                    <a href="{{ route('network') }}" {{-- Замените са route('network.index') --}} 
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out 
                        {{ request()->routeIs('network') ? 'border-carrerwire-green text-gray-700' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                        Мрежа
                    </a>
                    
                    {{-- 3. Послови --}}
                    <a href="{{ route('jobs') }}" {{-- Замените са route('jobs.index') --}} 
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out 
                        {{ request()->routeIs('jobs') ? 'border-carrerwire-green text-gray-700' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                        Послови
                    </a>
                    
                    {{-- 4. Поруке --}}
                    <a href="{{ route('messages') }}" {{-- Замените са route('messages.index') --}} 
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out 
                        {{ request()->routeIs('messages') ? 'border-carrerwire-green text-gray-700' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                        Поруке
                    </a>
                </nav>
            @endauth

            {{-- Десни Крај (Аутентикација или Профил) --}}
            <div class="flex items-center space-x-4">
                @auth
                    {{-- --------------------------------- --}}
                    {{-- А. Када је КОРИСНИК ПРИЈАВЉЕН --}}
                    {{-- --------------------------------- --}}
                    
                    {{-- Линкови за обавештења (опционо) --}}
                    <button class="text-gray-400 hover:text-gray-500 p-1 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-carrerwire-green">
                        {{-- Замените са СВГ иконом звона --}}
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    </button>
                    
                    {{-- Падајући мени за Профил/Подешавања (Користите Breeze компоненте) --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                <div class="mr-2">{{ Auth::user()->name }}</div>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- Линкови за подешавања --}}
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Профил') }}
                            </x-dropdown-link>
                            
                            
                            
                            {{-- Одјава --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Одјави се') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    {{-- --------------------------------- --}}
                    {{-- Б. Када КОРИСНИК НИЈЕ ПРИЈАВЉЕН --}}
                    {{-- --------------------------------- --}}
                    
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        Пријава
                    </a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-carrerwire-green hover:bg-carrerwire-green-dark transition duration-150 ease-in-out">
                            Регистрација
                        </a>
                    @endif
                @endauth
            </div>
            
        </div>
    </div>
    
    {{-- Овде можете додати део за мобилни мени (ако је потребно) --}}
    
</header>