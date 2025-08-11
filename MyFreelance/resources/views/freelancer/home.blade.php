<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }} - Freelancer Home</title>

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
                <a href="{{ route('freelancer.home') }}" class="hover:opacity-80 transition duration-300">My Freelance</a>
            </div>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Home</a>
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Browse Projects</a> {{-- Линк ка страници за преглед свих пројеката --}}
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">My Proposals</a> {{-- Линк ка фриленсер овом dashboard-у (active bids) --}}
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Messages</a>

                {{-- Обавештења --}}
                <div class="relative">
                    <button class="text-dark-gray hover:text-primary-orange transition duration-300 relative">
                        <i class="fas fa-bell text-2xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span> {{-- Пример: број обавештења --}}
                    </button>
                    {{-- Падајући мени за обавештења (JS за касније) --}}
                </div>

                {{-- Кориснички профил мени --}}
                <div class="relative">
                    <button class="flex items-center text-dark-gray hover:text-primary-orange transition duration-300 focus:outline-none" id="user-menu-button">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10 mr-2 border-2 border-secondary-green"> {{-- Аватар и бордер --}}
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-sm ml-2"></i>
                    </button>
                    {{-- Падајући мени за корисника --}}
                    <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('freelancer.dashboard') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Dashboard</a>
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
            <a href="{{ route('freelancer.home') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Home</a>
            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Browse Projects</a>
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
    </nav>

    <main class="py-10">
        <div class="container mx-auto px-4">
            {{-- Херо секција / Преглед --}}
            <div class="bg-white p-8 rounded-lg shadow-xl mb-10 text-center md:text-left border-l-4 border-primary-orange">
                <h1 class="text-4xl font-bold text-dark-gray mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-xl text-gray-700 mb-6">Ready to find your next great project?</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-dark-gray font-semibold mb-6">
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-handshake text-secondary-green text-3xl mr-3"></i>
                        <span>Active Proposals: <span class="text-primary-orange">5</span></span>
                    </div>
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-bookmark text-primary-orange text-3xl mr-3"></i>
                        <span>Saved Projects: <span class="text-secondary-green">3</span></span>
                    </div>
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-star text-yellow-500 text-3xl mr-3"></i>
                        <span>New Projects Today: <span class="text-primary-orange">12</span></span>
                    </div>
                </div>
                <a href="#" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 inline-flex items-center">
                    Browse All Projects <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>

            {{-- Истакнути / Препоручени пројекти --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Recommended Projects for You</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                {{-- Пример картице пројекта --}}
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Web Development for Startup</h3>
                    <p class="text-gray-600 text-sm mb-4">Budget: <span class="font-medium text-secondary-green">$2,500 - $4,000</span></p>
                    <p class="text-gray-700 mb-4 truncate">We are a new startup looking for a full-stack web developer to build our MVP.</p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="mr-2"><i class="fas fa-code"></i> Skills: PHP, Laravel, Vue.js</span>
                        <span><i class="fas fa-calendar-alt"></i> Posted: 1 day ago</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Details</a>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Submit Proposal <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
                {{-- Још примера картица пројеката --}}
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Graphic Designer for Branding</h3>
                    <p class="text-gray-600 text-sm mb-4">Budget: <span class="font-medium text-secondary-green">$800 - $1,500</span></p>
                    <p class="text-gray-700 mb-4 truncate">Seeking a talented graphic designer for a new brand identity, including logo and style guide.</p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="mr-2"><i class="fas fa-palette"></i> Skills: Adobe Illustrator, Photoshop, Branding</span>
                        <span><i class="fas fa-calendar-alt"></i> Posted: 3 hours ago</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Details</a>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Submit Proposal <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Content Writer for Tech Blog</h3>
                    <p class="text-gray-600 text-sm mb-4">Budget: <span class="font-medium text-secondary-green">$500 - $1,000</span></p>
                    <p class="text-gray-700 mb-4 truncate">Looking for a skilled content writer to create engaging articles for our tech blog.</p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="mr-2"><i class="fas fa-pen"></i> Skills: Content Writing, SEO, Tech</span>
                        <span><i class="fas fa-calendar-alt"></i> Posted: 5 days ago</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Details</a>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Submit Proposal <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- Категорије пројеката --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Explore Projects by Category</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-10">
                {{-- Пример картице категорије --}}
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-primary-orange">
                    <i class="fas fa-laptop-code text-primary-orange text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Web Development</h3>
                    <p class="text-gray-600 text-sm">150+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-secondary-green">
                    <i class="fas fa-paint-brush text-secondary-green text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Graphic Design</h3>
                    <p class="text-gray-600 text-sm">80+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-primary-orange">
                    <i class="fas fa-pen-nib text-primary-orange text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Content Writing</h3>
                    <p class="text-gray-600 text-sm">60+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-secondary-green">
                    <i class="fas fa-chart-line text-secondary-green text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Marketing</h3>
                    <p class="text-gray-600 text-sm">90+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-primary-orange">
                    <i class="fas fa-mobile-alt text-primary-orange text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Mobile Apps</h3>
                    <p class="text-gray-600 text-sm">45+ Projects</p>
                </a>
                {{-- Додај још категорија... --}}
            </div>

            {{-- Савети за фриленсере --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Freelancer Resources</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">How to Create a Standout Profile</h3>
                    <p class="text-gray-700 mb-4">Learn tips and tricks to optimize your freelancer profile and attract more clients.</p>
                    <a href="#" class="text-secondary-green hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-primary-orange">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Mastering Your Proposals: A Guide</h3>
                    <p class="text-gray-700 mb-4">Improve your success rate by crafting compelling and effective project proposals.</p>
                    <a href="#" class="text-primary-orange hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
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
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Browse Projects</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">My Proposals</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">Messages</a></li>
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
