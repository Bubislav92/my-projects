{{-- Главна навигација (Navbar) --}}
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-3xl font-bold text-primary-orange">
            <a href="{{ route('client.home') }}" class="hover:opacity-80 transition duration-300">My Freelance</a>
        </div>
        <div class="hidden md:flex space-x-6 items-center">
            <a href="{{ route('client.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Home</a>
            <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                Post a Project <i class="fas fa-plus ml-1"></i>
            </a>
            <a href="{{ route('client.browse-freelancers') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Browse Freelancers</a> {{-- Линк ка страници за преглед фриленсера --}}
            <a href="{{ route('client.my-projects') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">My Projects</a> {{-- Линк ка клијентовом dashboard-у (active projects) --}}
            <a href="{{ route('client.messages') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Messages</a>

            {{-- Обавештења --}}
            <div class="relative">
                <button class="text-dark-gray hover:text-primary-orange transition duration-300 relative">
                    <i class="fas fa-bell text-2xl"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">2</span> {{-- Пример: број обавештења --}}
                </button>
                {{-- Падајући мени за обавештења (JS за касније) --}}
            </div>

            {{-- Кориснички профил мени --}}
            <div class="relative">
                <button class="flex items-center text-dark-gray hover:text-primary-orange transition duration-300 focus:outline-none" id="user-menu-button">
                    <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10 mr-2 border-2 border-primary-orange"> {{-- Аватар и бордер --}}
                    <span class="font-medium">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down text-sm ml-2"></i>
                </button>
                {{-- Падајући мени за корисника --}}
                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                    <a href="{{ route('client.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
                    <a href="{{ route('client.profile') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
                    <a href="{{ route('client.settings') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100 transition duration-200">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Mobile menu button --}}
        <div class="md:hidden">
            <button class="text-dark-gray hover:text-primary-orange focus:outline-none transition duration-300" id="mobile-menu-button">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    {{-- Mobile menu content (сакривен по дефаулту, приказује се JS-ом) --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg py-4">
        <a href="{{ route('client.home') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Home</a>
        <a href="#" class="block text-center mt-2 mx-4 bg-primary-orange text-white px-5 py-2 rounded-lg hover:bg-orange-700 transition duration-300 shadow-lg">Post a Project</a>
        <a href="{{ route('client.browse-freelancers') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Browse Freelancers</a>
        <a href="{{ route('client.my-projects') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Projects</a>
        <a href="{{ route('client.messages') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Messages</a>
        <a href="{{ route('client.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
        <a href="{{ route('client.profile') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
        <a href="{{ route('client.settings') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
        <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
            @csrf
            <button type="submit" class="w-full text-left bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg">
                Log Out
            </button>
        </form>
    </div>
</nav>