<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Proposals</title>
    
    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> {{-- За иконе --}}

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased text-gray-800">

    <!-- Header / Navigation -->
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

                <!-- Notifications -->
                <div class="relative">
                    <button class="text-dark-gray hover:text-primary-orange transition duration-300 relative">
                        <i class="fas fa-bell text-2xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </button>
                    <!-- Notification Dropdown Menu (JS for later) -->
                </div>

                <!-- User Profile Menu -->
                <div class="relative">
                    <button class="flex items-center text-dark-gray hover:text-primary-orange transition duration-300 focus:outline-none" id="user-menu-button">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10 mr-2 border-2 border-secondary-green">
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-sm ml-2"></i>
                    </button>
                    <!-- User Dropdown Menu -->
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

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button class="text-dark-gray hover:text-primary-orange focus:outline-none transition duration-300" id="mobile-menu-button">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile menu content -->
        <div id="mobile-menu-content" class="hidden md:hidden bg-white shadow-lg py-4">
            <a href="{{ route('freelancer.home') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Home</a>
            <a href="{{ route('freelancer.browse-projects') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Browse Projects</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Proposals</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Messages</a>
            <a href="{{ route('freelancer.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
            <a href="{{ route('freelancer.profile') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                @csrf
                <button type="submit" class="w-full text-left bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg">
                    Log Out
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8 max-w-5xl">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">My Proposals</h1>

            <div class="space-y-6">
                <!-- Example Proposal Card 1 (Accepted) -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-dark-gray mb-1">E-commerce Website Re-design</h3>
                            <p class="text-sm text-gray-500">Proposal sent on: August 29, 2025</p>
                        </div>
                        <span class="bg-green-100 text-secondary-green text-sm font-semibold px-3 py-1 rounded-full">Accepted</span>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        My bid is to complete this project for **$2,200**.
                    </p>
                    <a href="#" class="text-primary-orange hover:underline font-medium transition duration-300">
                        View Project Details
                    </a>
                </div>

                <!-- Example Proposal Card 2 (Pending) -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-dark-gray mb-1">Logo and Branding Package</h3>
                            <p class="text-sm text-gray-500">Proposal sent on: August 25, 2025</p>
                        </div>
                        <span class="bg-yellow-100 text-yellow-600 text-sm font-semibold px-3 py-1 rounded-full">Pending</span>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        My bid is to complete this project for **$750**.
                    </p>
                    <a href="#" class="text-primary-orange hover:underline font-medium transition duration-300">
                        View Project Details
                    </a>
                </div>

                <!-- Example Proposal Card 3 (Rejected) -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-dark-gray mb-1">Video Editing for a Short Film</h3>
                            <p class="text-sm text-gray-500">Proposal sent on: August 20, 2025</p>
                        </div>
                        <span class="bg-red-100 text-red-600 text-sm font-semibold px-3 py-1 rounded-full">Rejected</span>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        My bid is to complete this project for **$1,200**.
                    </p>
                    <a href="#" class="text-primary-orange hover:underline font-medium transition duration-300">
                        View Project Details
                    </a>
                </div>
            </div>
        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />

    <!-- JavaScript for Mobile Menu and User Dropdown -->
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