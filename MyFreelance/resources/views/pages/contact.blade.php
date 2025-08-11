<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
                <a href="{{ route('about-us') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">About Us</a>
                <a href="{{ route('contact') }}" class="text-primary-orange font-bold transition duration-300">Contact Us</a>

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
                <a href="{{ route('about-us') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">About Us</a>
                <a href="{{ route('contact') }}" class="text-primary-orange font-bold transition duration-300">Contact Us</a>

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
        <!-- Contact Section -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4 md:px-8 max-w-7xl">
                <div class="text-center mb-12 md:mb-16">
                    <h1 class="text-4xl md:text-5xl font-bold text-dark-gray leading-tight">Contact Us</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Have a question or want to get in touch? We'd love to hear from you. Fill out the form below or find our contact details.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
                    <!-- Contact Form -->
                    <div class="bg-gray-50 p-8 md:p-12 rounded-3xl shadow-lg">
                        <form action="#" method="POST" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="name" name="name" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" id="email" name="email" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange">
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" id="subject" name="subject" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea id="message" name="message" rows="4" required
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                        class="inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primary-orange hover:bg-orange-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Contact Details -->
                    <div>
                        <h3 class="text-2xl md:text-3xl font-semibold text-dark-gray mb-6">Our Contact Details</h3>
                        <p class="text-gray-700 leading-relaxed mb-8">
                            Feel free to reach out to us through any of the following channels. Our team is available to assist you with any questions or support you may need.
                        </p>
                        <ul class="space-y-6">
                            <li class="flex items-start space-x-4">
                                <div class="text-primary-orange mt-1">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-lg text-dark-gray">Email Address</h4>
                                    <a href="mailto:support@myfreelance.com" class="text-gray-600 hover:text-primary-orange transition duration-300">support@myfreelance.com</a>
                                </div>
                            </li>
                            <li class="flex items-start space-x-4">
                                <div class="text-secondary-green mt-1">
                                    <i class="fas fa-phone-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-lg text-dark-gray">Phone Number</h4>
                                    <a href="tel:+1234567890" class="text-gray-600 hover:text-secondary-green transition duration-300">+1 234 567 890</a>
                                </div>
                            </li>
                            <li class="flex items-start space-x-4">
                                <div class="text-blue-500 mt-1">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-lg text-dark-gray">Our Office</h4>
                                    <p class="text-gray-600">
                                        123 Freelance Street, Suite 456<br>
                                        Creative City, FR 78901
                                    </p>
                                </div>
                            </li>
                        </ul>
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
