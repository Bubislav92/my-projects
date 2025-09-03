<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    
    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> {{-- За иконе --}}

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f7f7f7;
        }
        .text-dark-gray { color: #2d3748; }
        .text-primary-orange { color: #f97316; }
        .text-secondary-green { color: #10b981; }
    </style>
</head>
<body class="antialiased text-gray-800">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-3xl font-bold text-primary-orange">
                <a href="{{ route('freelancer.home') }}" class="hover:opacity-80 transition duration-300">My Freelance</a>
            </div>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Home</a>
                <a href="{{ route('freelancer.browse-projects') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Browse Projects</a>
                <a href="{{ route('freelancer.my-proposals') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">My Proposals</a>
                <a href="{{ route('freelancer.messages') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Messages</a>

                <div class="relative">
                    <button class="text-dark-gray hover:text-primary-orange transition duration-300 relative">
                        <i class="fas fa-bell text-2xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </button>
                    </div>

                <div class="relative">
                    <button class="flex items-center text-dark-gray hover:text-primary-orange transition duration-300 focus:outline-none" id="user-menu-button">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10 mr-2 border-2 border-secondary-green">
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-sm ml-2"></i>
                    </button>
                    <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
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

            <div class="md:hidden">
                <button class="text-dark-gray hover:text-primary-orange focus:outline-none transition duration-300" id="mobile-menu-button">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <div id="mobile-menu-content" class="hidden md:hidden bg-white shadow-lg py-4">
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
    </header>

    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8 max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Settings</h1>

            <div class="bg-white p-8 rounded-lg shadow-md space-y-8">
                <div class="border-b border-gray-200 pb-8">
                    <h2 class="text-2xl font-bold text-dark-gray mb-4 flex items-center">
                        <i class="fas fa-user-circle text-secondary-green mr-3"></i>
                        Account Settings
                    </h2>
                    <form class="space-y-6">
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email address</label>
                            <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange" value="freelancer@example.com">
                        </div>
                        <div>
                            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                            <input type="password" id="password" placeholder="••••••••" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange">
                        </div>
                        <button type="submit" class="bg-primary-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300 shadow-md">Update Account</button>
                    </form>
                </div>

                <div class="border-b border-gray-200 pb-8">
                    <h2 class="text-2xl font-bold text-dark-gray mb-4 flex items-center">
                        <i class="fas fa-bell text-secondary-green mr-3"></i>
                        Notification Settings
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <label for="email-notifications" class="text-gray-700 font-medium">Email notifications for new projects</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="email-notifications" value="" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-orange/50 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary-green"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="message-alerts" class="text-gray-700 font-medium">Alerts for new messages</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="message-alerts" value="" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-orange/50 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary-green"></div>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-2xl font-bold text-dark-gray mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-secondary-green mr-3"></i>
                        Security
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 font-medium">Two-factor authentication (2FA)</span>
                            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300">Enable</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuContent = document.getElementById('mobile-menu-content');
            
            mobileMenuButton.addEventListener('click', function () {
                mobileMenuContent.classList.toggle('hidden');
            });

            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');

            userMenuButton.addEventListener('click', function () {
                userMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>