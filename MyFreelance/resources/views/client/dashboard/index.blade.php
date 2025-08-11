<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }} - Client Dashboard</title>

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
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Browse Freelancers</a>
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">My Projects</a>
                <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Messages</a>

                {{-- Обавештења --}}
                <div class="relative">
                    <button class="text-dark-gray hover:text-primary-orange transition duration-300 relative">
                        <i class="fas fa-bell text-2xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">2</span>
                    </button>
                    {{-- Падајући мени за обавештења (JS за касније) --}}
                </div>

                {{-- Кориснички профил мени --}}
                <div class="relative">
                    <button class="flex items-center text-dark-gray hover:text-primary-orange transition duration-300 focus:outline-none" id="user-menu-button">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10 mr-2 border-2 border-primary-orange">
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
        {{-- Mobile menu content --}}
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
            <h1 class="text-4xl font-bold text-dark-gray mb-8">Client Dashboard</h1>

            {{-- Преглед надзорне табле / Кључне метрике --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                {{-- Активни пројекти --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-secondary-green">
                    <div>
                        <p class="text-gray-600">Active Projects</p>
                        <h3 class="text-3xl font-bold text-secondary-green">3</h3>
                    </div>
                    <i class="fas fa-tasks text-4xl text-gray-300"></i>
                </div>
                {{-- Чекајуће понуде --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-primary-orange">
                    <div>
                        <p class="text-gray-600">Pending Bids</p>
                        <h3 class="text-3xl font-bold text-primary-orange">7</h3>
                    </div>
                    <i class="fas fa-gavel text-4xl text-gray-300"></i>
                </div>
                {{-- Укупна потрошња --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-secondary-green">
                    <div>
                        <p class="text-gray-600">Total Spent</p>
                        <h3 class="text-3xl font-bold text-secondary-green">$5,800</h3>
                    </div>
                    <i class="fas fa-wallet text-4xl text-gray-300"></i>
                </div>
                {{-- Завршени пројекти --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-primary-orange">
                    <div>
                        <p class="text-gray-600">Completed Projects</p>
                        <h3 class="text-3xl font-bold text-primary-orange">10</h3>
                    </div>
                    <i class="fas fa-check-double text-4xl text-gray-300"></i>
                </div>
            </div>

            {{-- Ажурирања / Обавештења --}}
            <div class="bg-white p-8 rounded-lg shadow-md mb-10 border-l-4 border-dark-gray">
                <h2 class="text-2xl font-bold text-dark-gray mb-6">Recent Activity</h2>
                <ul class="space-y-4">
                    <li class="flex items-start text-gray-700">
                        <i class="fas fa-envelope text-primary-orange mt-1 mr-3"></i>
                        <div>
                            <span class="font-semibold">New message</span> from Freelancer Name regarding "Mobile App Redesign".
                            <span class="text-sm text-gray-500 block">10 minutes ago</span>
                        </div>
                        <a href="#" class="ml-auto text-primary-orange hover:underline transition duration-300">View</a>
                    </li>
                    <li class="flex items-start text-gray-700">
                        <i class="fas fa-file-invoice-dollar text-secondary-green mt-1 mr-3"></i>
                        <div>
                            New proposal received for project "<span class="font-semibold">E-commerce Website Build</span>".
                            <span class="text-sm text-gray-500 block">30 minutes ago</span>
                        </div>
                        <a href="#" class="ml-auto text-primary-orange hover:underline transition duration-300">Review Bids</a>
                    </li>
                    <li class="flex items-start text-gray-700">
                        <i class="fas fa-check-circle text-primary-orange mt-1 mr-3"></i>
                        <div>
                            Project "<span class="font-semibold">Content Marketing Strategy</span>" marked as <span class="font-semibold text-primary-orange">complete</span> by Freelancer.
                            <span class="text-sm text-gray-500 block">2 hours ago</span>
                        </div>
                        <a href="#" class="ml-auto text-primary-orange hover:underline transition duration-300">Review & Pay</a>
                    </li>
                </ul>
            </div>

            {{-- Активни пројекти --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Your Active Projects</h2>
            <div class="bg-white p-8 rounded-lg shadow-md mb-10 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Freelancer</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Budget</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">Mobile App Development</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Jane Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-green font-semibold">$4,000 - $6,000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary-orange hover:text-orange-700 mr-4">View</a>
                                <a href="#" class="text-secondary-green hover:text-green-700">Message</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">Marketing Campaign Strategy</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Awaiting Deliverables</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-green font-semibold">$1,800 - $2,500</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary-orange hover:text-orange-700 mr-4">View</a>
                                <a href="#" class="text-secondary-green hover:text-green-700">Message</a>
                            </td>
                        </tr>
                        {{-- Додај још редова за активне пројекте --}}
                    </tbody>
                </table>
            </div>

            {{-- Понуде на чекању --}}
            <div class="bg-orange-100 border-l-4 border-primary-orange text-orange-700 p-4 rounded-lg mb-8" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-gavel mr-3 text-2xl"></i>
                    <div>
                        <p class="font-bold">You have new bids to review!</p>
                        <p class="text-sm">There are <span class="font-bold">3 new proposals</span> on your "UI/UX Redesign" project.</p>
                    </div>
                    <a href="#" class="ml-auto bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">Review Bids</a>
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
