<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    
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
            <a href="{{ route('freelancer.my-proposals') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">My Proposals</a>
            <a href="{{ route('freelancer.messages') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Messages</a>
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
        <div class="container mx-auto px-4 md:px-8 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Profile Summary -->
                <aside class="md:col-span-1 bg-white p-6 rounded-lg shadow-md h-fit">
                    <div class="flex flex-col items-center text-center">
                        <img src="https://via.placeholder.com/150" alt="Profile Avatar" class="rounded-full w-32 h-32 mb-4 border-4 border-secondary-green shadow-lg">
                        <h2 class="text-3xl font-bold text-dark-gray mb-1">Miloš Stojanović</h2>
                        <p class="text-gray-500 mb-4">Web Developer</p>
                        <div class="flex space-x-2 text-yellow-400 mb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-gray-500 ml-2">(4.5)</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Passionate web developer with over 5 years of experience in building modern and responsive websites. I specialize in front-end technologies and creating clean, efficient code.
                        </p>
                        <a href="#" class="w-full bg-primary-orange text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300 shadow-md hover:shadow-lg">
                            Edit Profile
                        </a>
                    </div>
                </aside>

                <!-- Profile Details and Portfolio -->
                <section class="md:col-span-2 space-y-8">
                    <!-- Skills Section -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-dark-gray mb-4 flex items-center">
                            <i class="fas fa-cogs text-secondary-green mr-3"></i>
                            Skills
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">HTML</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">CSS</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">JavaScript</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">React</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">Node.js</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">Tailwind CSS</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">Laravel</span>
                        </div>
                    </div>

                    <!-- Portfolio Section -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-dark-gray mb-4 flex items-center">
                            <i class="fas fa-briefcase text-secondary-green mr-3"></i>
                            Portfolio
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Example Portfolio Item 1 -->
                            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                <img src="https://via.placeholder.com/300x200" alt="Portfolio Image" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg text-dark-gray">E-commerce Platform</h4>
                                    <p class="text-sm text-gray-500">Completed: 2024</p>
                                </div>
                            </div>
                            <!-- Example Portfolio Item 2 -->
                            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                <img src="https://via.placeholder.com/300x200" alt="Portfolio Image" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg text-dark-gray">Company Landing Page</h4>
                                    <p class="text-sm text-gray-500">Completed: 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-dark-gray mb-4 flex items-center">
                            <i class="fas fa-comments text-secondary-green mr-3"></i>
                            Reviews
                        </h3>
                        <div class="space-y-6">
                            <!-- Example Review 1 -->
                            <div class="border-b border-gray-200 pb-4 last:border-b-0">
                                <div class="flex items-center mb-2">
                                    <img src="https://via.placeholder.com/40" alt="Client Avatar" class="rounded-full w-10 h-10 mr-3">
                                    <div>
                                        <p class="font-semibold text-dark-gray">Aleksandar Petrović</p>
                                        <div class="flex space-x-1 text-yellow-400 text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 italic">"Miloš delivered an outstanding website. The communication was excellent, and he exceeded my expectations. Highly recommended!"</p>
                            </div>
                            <!-- Example Review 2 -->
                            <div class="border-b border-gray-200 pb-4 last:border-b-0">
                                <div class="flex items-center mb-2">
                                    <img src="https://via.placeholder.com/40" alt="Client Avatar" class="rounded-full w-10 h-10 mr-3">
                                    <div>
                                        <p class="font-semibold text-dark-gray">Jovana Marković</p>
                                        <div class="flex space-x-1 text-yellow-400 text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-700 italic">"Great work! The project was completed on time, and the quality was top-notch."</p>
                            </div>
                        </div>
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