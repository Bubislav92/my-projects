<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }} - Client Home</title>

    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-light-gray">

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
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Browse Freelancers</a> {{-- Линк ка страници за преглед фриленсера --}}
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">My Projects</a> {{-- Линк ка клијентовом dashboard-у (active projects) --}}
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Messages</a>

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
                        <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
                        <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
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
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Browse Freelancers</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Projects</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Messages</a>
            <a href="{{ route('client.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Profile</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Settings</a>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                @csrf
                <button type="submit" class="w-full text-left bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg">
                    Log Out
                </button>
            </form>
        </div>
    </nav>

    <main class="py-10">
        <div class="container mx-auto px-4">
            {{-- Херо секција / Преглед --}}
            <div class="bg-white p-8 rounded-lg shadow-xl mb-10 text-center md:text-left border-l-4 border-secondary-green">
                <h1 class="text-4xl font-bold text-dark-gray mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-xl text-gray-700 mb-6">Let's get your project done with the best talent.</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-dark-gray font-semibold mb-6">
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-tasks text-primary-orange text-3xl mr-3"></i>
                        <span>Active Projects: <span class="text-secondary-green">3</span></span>
                    </div>
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-gavel text-secondary-green text-3xl mr-3"></i>
                        <span>Pending Bids: <span class="text-primary-orange">7</span></span>
                    </div>
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-heart text-red-500 text-3xl mr-3"></i>
                        <span>Favorite Freelancers: <span class="text-secondary-green">5</span></span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="#" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 inline-flex items-center">
                        Post a New Project <i class="fas fa-plus ml-3"></i>
                    </a>
                    <a href="#" class="border-2 border-secondary-green text-secondary-green px-8 py-4 rounded-lg text-xl font-semibold hover:bg-secondary-green hover:text-white transition duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center">
                        Find a Freelancer <i class="fas fa-search ml-3"></i>
                    </a>
                </div>
            </div>

            {{-- Преглед активних пројеката --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Your Active Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                {{-- Пример картице пројекта --}}
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-primary-orange">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">E-commerce Website Build</h3>
                    <p class="text-gray-600 text-sm mb-4">Status: <span class="font-medium text-blue-600">In Progress</span></p>
                    <p class="text-gray-700 mb-4 truncate">Building a new e-commerce platform from scratch with custom features...</p>
                    <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                        <span>Bids: 12</span>
                        <span>Budget: $5,000 - $8,000</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                        <a href="#" class="text-secondary-green hover:underline transition duration-300">Manage Freelancer <i class="fas fa-user-check ml-1"></i></a>
                    </div>
                </div>
                {{-- Још примера картица пројеката --}}
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-primary-orange">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Mobile App UX Redesign</h3>
                    <p class="text-gray-600 text-sm mb-4">Status: <span class="font-medium text-orange-600">Waiting for Bids</span></p>
                    <p class="text-gray-700 mb-4 truncate">Seeking a UX/UI designer to overhaul our existing mobile application...</p>
                    <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                        <span>Bids: 5</span>
                        <span>Budget: $2,000 - $3,500</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                        <a href="#" class="text-secondary-green hover:underline transition duration-300">Review Bids <i class="fas fa-gavel ml-1"></i></a>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-primary-orange">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Content Marketing Strategy</h3>
                    <p class="text-gray-600 text-sm mb-4">Status: <span class="font-medium text-red-600">Needs Attention</span></p>
                    <p class="text-gray-700 mb-4 truncate">Develop a comprehensive content marketing strategy for a B2B SaaS company...</p>
                    <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                        <span>Bids: 0</span>
                        <span>Budget: $1,500 - $2,500</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                        <a href="#" class="text-red-600 hover:underline transition duration-300">Edit Project <i class="fas fa-edit ml-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- Препоручени фриленсери --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Recommended Freelancers for You</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                {{-- Пример картице фриленсера --}}
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mx-auto mb-4 border-2 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-1">Emily Clarke</h3>
                    <p class="text-primary-orange font-medium mb-2">Full-Stack Web Developer</p>
                    <p class="text-gray-600 text-sm mb-4">Rating: <span class="text-yellow-500"><i class="fas fa-star"></i> 4.9 (25 reviews)</span></p>
                    <div class="flex flex-col gap-2">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                        <a href="#" class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">Message</a>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mx-auto mb-4 border-2 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-1">David Lee</h3>
                    <p class="text-primary-orange font-medium mb-2">UX/UI Designer</p>
                    <p class="text-gray-600 text-sm mb-4">Rating: <span class="text-yellow-500"><i class="fas fa-star"></i> 4.8 (18 reviews)</span></p>
                    <div class="flex flex-col gap-2">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                        <a href="#" class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">Message</a>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mx-auto mb-4 border-2 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-1">Sarah Chen</h3>
                    <p class="text-primary-orange font-medium mb-2">Content Strategist</p>
                    <p class="text-gray-600 text-sm mb-4">Rating: <span class="text-yellow-500"><i class="fas fa-star"></i> 5.0 (10 reviews)</span></p>
                    <div class="flex flex-col gap-2">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                        <a href="#" class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">Message</a>
                    </div>
                </div>
                {{-- Додај још фриленсера... --}}
            </div>

            {{-- Савети за клијенте --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6 mt-10">Client Resources</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-primary-orange">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Tips for Writing a Great Project Brief</h3>
                    <p class="text-gray-700 mb-4">Learn how to create clear and concise project descriptions to attract the best talent.</p>
                    <a href="#" class="text-primary-orange hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">How to Choose the Right Freelancer</h3>
                    <p class="text-gray-700 mb-4">Discover key factors and strategies for selecting the perfect freelancer for your project.</p>
                    <a href="#" class="text-secondary-green hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

        </div>
    </main>

    {{-- Футер (Footer) --}}
    <footer class="bg-dark-gray text-white py-12 mt-10">
        <div class="container mx-auto px-4 text-center">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h4 class="text-2xl font-bold text-primary-orange mb-4">My Freelance</h4>
                    <p class="text-gray-400">Your platform for freelancing.</p>
                </div>
                <div>
                    <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                    <ul>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Post a Project</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Browse Freelancers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">My Projects</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-semibold mb-4">Support</h4>
                    <ul>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-semibold mb-4">Follow Us</h4>
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300 text-2xl"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300 text-2xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300 text-2xl"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-gray-400 text-sm">
                &copy; {{ date('Y') }} My Freelance. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // JavaScript за мобилни мени и кориснички мени
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    if (!mobileMenu.classList.contains('hidden') && userMenu && !userMenu.classList.contains('hidden')) {
                         userMenu.classList.add('hidden'); // Затвори кориснички мени ако је мобилни отворен
                    }
                });
            }

            if (userMenuButton && userMenu) {
                userMenuButton.addEventListener('click', function() {
                    userMenu.classList.toggle('hidden');
                     if (!userMenu.classList.contains('hidden') && mobileMenu && !mobileMenu.classList.contains('hidden')) {
                         mobileMenu.classList.add('hidden'); // Затвори мобилни мени ако је кориснички отворен
                    }
                });

                // Затварање менија кликом изван њих
                document.addEventListener('click', function(event) {
                    if (userMenu && !userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                        userMenu.classList.add('hidden');
                    }
                    if (mobileMenu && !mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
