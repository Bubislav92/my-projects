<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    
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
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
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
        <div class="container mx-auto px-4 md:px-8 max-w-7xl">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Messages</h1>

            <div class="bg-white rounded-lg shadow-xl overflow-hidden h-[70vh] flex flex-col md:flex-row">
                <!-- Contacts List -->
                <aside class="md:w-1/3 border-r border-gray-200 p-4 overflow-y-auto">
                    <h2 class="text-xl font-semibold mb-4 text-dark-gray">Contacts</h2>
                    <ul class="space-y-2">
                        <!-- Example Contact 1 (Active) -->
                        <li class="p-3 rounded-lg bg-gray-100 cursor-pointer hover:bg-gray-200 transition-colors duration-200">
                            <div class="flex items-center space-x-3">
                                <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-full w-10 h-10">
                                <div>
                                    <p class="font-semibold text-dark-gray">Aleksandar Petrović</p>
                                    <p class="text-sm text-gray-500 truncate">I've reviewed your proposal. Let's discuss a few... </p>
                                </div>
                            </div>
                        </li>
                        <!-- Example Contact 2 -->
                        <li class="p-3 rounded-lg cursor-pointer hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex items-center space-x-3">
                                <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-full w-10 h-10">
                                <div>
                                    <p class="font-semibold text-dark-gray">Miloš Stojanović</p>
                                    <p class="text-sm text-gray-500 truncate">Thanks for the offer. </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </aside>

                <!-- Chat Window -->
                <section class="md:w-2/3 flex flex-col">
                    <!-- Chat Header -->
                    <div class="bg-white border-b border-gray-200 p-4">
                        <h3 class="text-lg font-semibold text-dark-gray">Aleksandar Petrović</h3>
                    </div>

                    <!-- Message Area -->
                    <div class="flex-1 p-6 overflow-y-auto space-y-4 bg-gray-50">
                        <!-- Example Received Message -->
                        <div class="flex justify-start">
                            <div class="bg-gray-200 text-gray-800 p-4 rounded-xl rounded-bl-none max-w-sm">
                                <p>Hello, thanks for your bid on the project. I've reviewed your portfolio and I'm impressed.</p>
                            </div>
                        </div>

                        <!-- Example Sent Message -->
                        <div class="flex justify-end">
                            <div class="bg-primary-orange text-white p-4 rounded-xl rounded-br-none max-w-sm">
                                <p>Hi Aleksandar, thank you for your feedback! I'm happy to answer any questions you might have.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="bg-white border-t border-gray-200 p-4 flex items-center space-x-4">
                        <input type="text" placeholder="Type a message..." class="flex-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange">
                        <button class="bg-primary-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </section>
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