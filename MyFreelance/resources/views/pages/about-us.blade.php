<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f7;
        }
        .text-dark-gray { color: #2d3748; }
        .text-primary-orange { color: #f97316; }
        .text-secondary-green { color: #10b981; }
    </style>
    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-800">

    <!-- Header / Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 md:px-8 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="text-3xl font-bold text-primary-orange">
                <a href="{{ url('/') }}" class="hover:opacity-80 transition duration-300">My Freelance</a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <a href="{{ url('/') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Home</a>
                <a href="{{ route('about-us') }}" class="text-primary-orange font-bold transition duration-300">About Us</a>

                @if (Route::has('login'))
                    @auth
                        @if(Auth::user()->role === \App\Models\User::ROLE_FREELANCER)
                            <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Freelancer Home</a>
                        @elseif(Auth::user()->role === \App\Models\User::ROLE_CLIENT)
                            <a href="{{ route('client.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Client Home</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Log In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-primary-orange text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-dark-gray text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg py-4">
            <div class="flex flex-col space-y-4 px-4">
                <a href="{{ url('/') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Home</a>
                <a href="{{ route('about-us') }}" class="text-primary-orange font-bold transition duration-300">About Us</a>

                @if (Route::has('login'))
                    @auth
                        @if(Auth::user()->role === \App\Models\User::ROLE_FREELANCER)
                            <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Freelancer Home</a>
                        @elseif(Auth::user()->role === \App\Models\User::ROLE_CLIENT)
                            <a href="{{ route('client.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Client Home</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Log In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-primary-orange text-white px-4 py-2 rounded-lg text-center hover:bg-orange-600 transition duration-300 shadow-md">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- About Us Section -->
        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4 md:px-8 max-w-7xl">
                <div class="text-center mb-12 md:mb-16">
                    <h1 class="text-4xl md:text-5xl font-bold text-dark-gray leading-tight">About Us</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Our mission is to connect talented freelancers with innovative clients, creating a platform where ideas turn into reality.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
                    <div class="order-2 md:order-1">
                        <img src="{{ asset('images/about-us.jpg') }}" alt="Working space"
                            class="rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 transform hover:-translate-y-1 w-full h-auto">
                    </div>
                    <div class="order-1 md:order-2">
                        <h2 class="text-3xl md:text-4xl font-semibold text-dark-gray leading-snug mb-6">
                            Committed to Our Users' Success
                        </h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            We believe that every project is an opportunity for growth. Our platform provides all the tools necessary for freelancers to focus on their work, and for clients to easily find the ideal collaborators for their business goals.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            Through transparency, security, and support, we are building a community that fosters collaboration and achieves outstanding results.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4 md:px-8 max-w-7xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-bullseye text-primary-orange text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-dark-gray mb-4">Our Mission</h3>
                        <p class="text-gray-600">
                            To empower individuals and companies to achieve their full potential through a flexible and secure freelance platform.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-eye text-secondary-green text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-dark-gray mb-4">Our Vision</h3>
                        <p class="text-gray-600">
                            To become a leading freelance platform that defines the future of work, building a world where every talent finds its place.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- JavaScript for Mobile Menu -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
