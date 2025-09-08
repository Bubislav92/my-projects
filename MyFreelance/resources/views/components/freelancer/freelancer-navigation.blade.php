<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Freelance Navigation</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    {{-- Scripts (Tailwind CSS + app JS) --}}
    {{-- Ako već imate vlastite freelancer/user-menu.js fajlove koji rade isto, uklonite duplikate da ne bi bilo konfliktova --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/freelancer/user-menu.js', 'resources/js/freelancer/notification.js'])
</head>
<body class="antialiased text-gray-800">

    {{-- Главна навигација (Navbar) --}}
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-3xl font-bold text-primary-orange">
                <a href="{{ route('freelancer.home') }}" class="hover:opacity-80 transition duration-300">My Freelance</a>
            </div>

            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Home</a>
                <a href="{{ route('freelancer.browse-projects') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Browse Projects</a> {{-- Линк ка страници за преглед свих пројеката --}}
                <a href="{{ route('freelancer.my-proposals') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">My Proposals</a> {{-- Линк ка фриленсер овом dashboard-у (active bids) --}}
               <a href="{{ route('freelancer.messages') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Messages</a>
    
                {{-- Обавештења --}}
                <div class="relative">
                    <button id="notification-toggle" class="text-dark-gray hover:text-primary-orange transition duration-300 relative">
                        <i class="fas fa-bell text-2xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">2</span>
                    </button>

                    <!-- Notification Dropdown Menu -->
                    <div id="notification-menu" class="dropdown-menu overflow-hidden max-h-0 transition-all duration-300 absolute right-0 mt-3 w-80 bg-white rounded-lg shadow-xl z-10">
                        <div class="px-4 py-2 text-gray-500 font-semibold border-b border-gray-200">Notifications</div>

                        <a href="#" class="flex items-start px-4 py-3 hover:bg-gray-100 transition duration-300">
                            <i class="fas fa-envelope text-lg text-primary-orange mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-dark-gray">New Message</h4>
                                <p class="text-sm text-gray-600 truncate">You have a new message from a freelancer.</p>
                                <p class="text-xs text-gray-400 mt-1">5 minutes ago</p>
                            </div>
                        </a>

                        <a href="#" class="flex items-start px-4 py-3 hover:bg-gray-100 transition duration-300">
                            <i class="fas fa-check-circle text-lg text-secondary-green mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-dark-gray">Project Completed</h4>
                                <p class="text-sm text-gray-600 truncate">Your "Logo Design" project is now completed.</p>
                                <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                            </div>
                        </a>

                        <div class="px-4 py-2 text-center border-t border-gray-200">
                            <a href="{{ route('client.notification') }}" class="text-sm font-semibold text-primary-orange hover:underline">View All</a>
                        </div>
                    </div>
                </div>

    
                {{-- Кориснички профил мени --}}
                <div class="relative">
                    <button class="flex items-center text-dark-gray hover:text-primary-orange transition duration-300 focus:outline-none" id="user-menu-button">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10 mr-2 border-2 border-secondary-green"> {{-- Аватар и бордер --}}
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-sm ml-2"></i>
                    </button>

                    {{-- Падајући мени за корисника --}}
                    <div id="user-menu"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20
                                overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                        <a href="{{ route('freelancer.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
                        <a href="{{ route('freelancer.profile') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
                        <a href="{{ route('freelancer.settings') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
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

        {{-- Mobile menu content (sakriven po defaultu, prikazuje se JS-om) --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg py-4">
            <a href="{{ route('freelancer.home') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Home</a>
            <a href="{{ route('freelancer.browse-projects') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Browse Projects</a>
            <a href="{{ route('freelancer.my-proposals') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Proposals</a>
            <a href="{{ route('freelancer.messages') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Messages</a>
            <a href="{{ route('freelancer.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
            <a href="{{ route('freelancer.profile') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
            <a href="{{ route('freelancer.settings') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                @csrf
                <button type="submit" class="w-full text-left bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg">
                    Log Out
                </button>
            </form>
        </div>
    </nav>

    
</body>
</html>
