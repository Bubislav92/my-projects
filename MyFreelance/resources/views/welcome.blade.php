<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }}</title>

    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> {{-- За иконе --}}

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-dark-gray antialiased">

    {{-- Навигација (Navbar) --}}
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-3xl font-bold text-primary-orange">
                <a href="{{ url('/') }}" class="hover:opacity-80 transition duration-300">My Freelance</a>
            </div>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="#how-it-works" class="text-dark-gray hover:text-primary-orange transition duration-300">How It Works</a>
                <a href="{{ route('about-us') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">About Us</a>
                <a href="{{ route('contact') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Contact</a>

                @if (Route::has('login'))
                    @auth
                    {{-- Након што се корисник улоговао, преусмерава се на почетну страницу на основу улоге --}}
                    @if(Auth::user()->role === \App\Models\User::ROLE_FREELANCER)
                        <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Freelancer Home</a>
                    @elseif(Auth::user()->role === \App\Models\User::ROLE_CLIENT)
                        <a href="{{ route('client.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Client Home</a>
                    @else
                        {{-- Ако корисник има другу улогу, може се преусмерити на подразумевану страницу или Filament --}}
                        <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                            Log Out
                        </button>
                    </form>
                    @else
                        {{-- За госте, прикажи дугмад за пријаву/регистрацију --}}
                        <a href="{{ route('login') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Log In</a>
                        <a href="{{ route('register') }}" class="bg-primary-orange text-white px-5 py-2 rounded-lg text-lg hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                            Register
                        </a>
                    @endauth
                @endif
            </div>
            {{-- Дугме за мобилни мени (за касније) --}}
            <div class="md:hidden">
                <button class="text-dark-gray hover:text-primary-orange focus:outline-none transition duration-300" id="mobile-menu-button">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>
        {{-- Садржај мобилног менија (сакривен по дефаулту, приказује се JS-ом) --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg py-4">
            <a href="#how-it-works" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">How It Works</a>
            <a href="{{ route('about-us') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">About Us</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Contact</a>
            @if (Route::has('login'))
                @auth
                  {{-- Након што се корисник улоговао, преусмерава се на почетну страницу на основу улоге --}}
                  @if(Auth::user()->role === \App\Models\User::ROLE_FREELANCER)
                      <a href="{{ route('freelancer.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Freelancer Home</a>
                  @elseif(Auth::user()->role === \App\Models\User::ROLE_CLIENT)
                      <a href="{{ route('client.home') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Client Home</a>
                  @else
                      {{-- Ако корисник има другу улогу, може се преусмерити на подразумевану страницу или Filament --}}
                      <a href="#" class="text-dark-gray hover:text-primary-orange transition duration-300">Dashboard</a>
                  @endif
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                          Log Out
                      </button>
                  </form>
                @else
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Log In</a>
                    <a href="{{ route('register') }}" class="block text-center mt-2 mx-4 bg-primary-orange text-white px-5 py-2 rounded-lg hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl">Register</a>
                @endauth
            @endif
        </div>
    </header>

    {{-- Херо секција (Hero Section) --}}
    <section class="bg-light-gray py-20 md:py-28">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-5xl md:text-6xl font-extrabold text-dark-gray leading-tight mb-6">
                    <span class="text-primary-orange">Your Project.</span> <br class="hidden md:block"> The Right Expert.
                </h1>
                <p class="text-xl md:text-2xl text-gray-700 mb-8 max-w-lg md:max-w-none mx-auto">
                    Connect with top-tier freelancers and bring your ideas to life, easier than ever.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('register') }}" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        Get Started Now
                    </a>
                    <a href="#" class="border-2 border-secondary-green text-secondary-green px-8 py-4 rounded-lg text-xl font-semibold hover:bg-secondary-green hover:text-white transition duration-300 hover:shadow-lg hover:-translate-y-1">
                        Explore Projects
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0">
                {{-- Уместо placeholder-а, сада је слика са Pexels-а --}}
                <img src="https://images.pexels.com/photos/39284/macbook-apple-imac-computer-39284.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Office Setup with iMac and MacBook" class="rounded-lg shadow-xl w-full h-auto object-cover hover:scale-105 transition duration-300 ease-in-out">
            </div>
        </div>
    </section>

    {{-- Секција за бенефите / решења проблема --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-dark-gray mb-16">Why Choose My Freelance?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-primary-orange hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="text-primary-orange text-6xl mb-6">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-dark-gray">Find the Right Expertise</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Access a vast network of verified freelancers with diverse skills.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-secondary-green hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="text-secondary-green text-6xl mb-6">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-dark-gray">Secure Collaboration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Secure payment methods and communication tools ensure project success.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-primary-orange hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="text-primary-orange text-6xl mb-6">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-dark-gray">Save Time & Money</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Quickly find experts without expensive agencies or lengthy hiring processes.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Како то ради секција --}}
    <section id="how-it-works" class="py-16 md:py-24 bg-light-gray">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-dark-gray mb-16">How My Freelance Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 text-left">
                {{-- За клијенте --}}
                <div>
                    <h3 class="text-3xl font-bold text-primary-orange mb-6 text-center md:text-left">For Clients</h3>
                    <div class="space-y-8">
                        <div class="flex items-start p-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <div class="flex-shrink-0 bg-primary-orange text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 shadow-md">1</div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1 text-dark-gray">Post a Project</h4>
                                <p class="text-gray-600">Describe your needs and budget. Fast and simple.</p>
                            </div>
                        </div>
                        <div class="flex items-start p-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <div class="flex-shrink-0 bg-primary-orange text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 shadow-md">2</div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1 text-dark-gray">Receive Bids</h4>
                                <p class="text-gray-600">Review qualified proposals from freelancers and choose the best fit.</p>
                            </div>
                        </div>
                        <div class="flex items-start p-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <div class="flex-shrink-0 bg-primary-orange text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 shadow-md">3</div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1 text-dark-gray">Start Collaborating</h4>
                                <p class="text-gray-600">Work directly with your chosen freelancer and achieve results.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- За фриленсере --}}
                <div>
                    <h3 class="text-3xl font-bold text-secondary-green mb-6 text-center md:text-left">For Freelancers</h3>
                    <div class="space-y-8">
                        <div class="flex items-start p-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <div class="flex-shrink-0 bg-secondary-green text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 shadow-md">1</div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1 text-dark-gray">Create Your Profile</h4>
                                <p class="text-gray-600">Showcase your skills and portfolio to potential clients.</p>
                            </div>
                        </div>
                        <div class="flex items-start p-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <div class="flex-shrink-0 bg-secondary-green text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 shadow-md">2</div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1 text-dark-gray">Find Projects</h4>
                                <p class="text-gray-600">Browse the latest projects that match your expertise.</p>
                            </div>
                        </div>
                        <div class="flex items-start p-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <div class="flex-shrink-0 bg-secondary-green text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 shadow-md">3</div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1 text-dark-gray">Work and Earn</h4>
                                <p class="text-gray-600">Deliver quality work and build your reputation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Позив на акцију за различите улоге (Dual CTA) --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-dark-gray mb-10">Ready to Get Started?</h2>
            <p class="text-xl text-gray-700 mb-12">
                Join our community and find your ideal collaboration.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('register') }}" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 flex items-center justify-center">
                    <i class="fas fa-briefcase mr-3"></i> Post a Project
                </a>
                <a href="{{ route('register') }}" class="border-2 border-secondary-green text-secondary-green px-8 py-4 rounded-lg text-xl font-semibold hover:bg-secondary-green hover:text-white transition duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center justify-center">
                    <i class="fas fa-user-tie mr-3"></i> Join as a Freelancer
                </a>
            </div>
        </div>
    </section>

    {{-- Футер (Footer) --}}
    <x-footer />

    <script>
        // JavaScript за мобилни мени
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
