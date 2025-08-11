<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service</title>
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
                <a href="{{ route('contact') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Contact Us</a>

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
                <a href="{{ route('contact') }}" class="text-dark-gray hover:text-primary-orange transition duration-300">Contact Us</a>

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
    <main class="bg-white">
        <div class="container mx-auto px-4 md:px-8 py-16 md:py-24 max-w-7xl">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-8 md:mb-12">Terms of Service</h1>

            <div class="prose max-w-none">
                <p><strong>Last Updated:</strong> August 1, 2025</p>

                <p>Welcome to My Freelance. These Terms of Service ("Terms") govern your use of our platform. By accessing or using our services, you agree to be bound by these Terms. If you do not agree with any part of these Terms, you may not use our services.</p>

                <h2>1. Acceptance of Terms</h2>
                <p>By registering for and using My Freelance, you agree to comply with and be legally bound by these Terms, whether you are a Client or a Freelancer.</p>

                <h2>2. Services</h2>
                <p>My Freelance is a platform that connects Clients seeking freelance services with Freelancers offering their expertise. We facilitate the posting of projects, bidding on projects, communication, and payment processing. We are not a party to the contract between the Client and the Freelancer.</p>

                <h2>3. User Accounts</h2>
                <p>To use our services, you must register for an account. You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete. You are responsible for safeguarding your password and for any activities or actions under your account.</p>

                <h2>4. User Responsibilities</h2>
                <ul>
                    <li>You must not use the platform for any illegal or unauthorized purpose.</li>
                    <li>You are solely responsible for all content you post on the platform.</li>
                    <li>You must not engage in any activity that interferes with or disrupts the platform or the servers and networks connected to the platform.</li>
                    <li>You must not attempt to gain unauthorized access to any part of the platform.</li>
                </ul>

                <h2>5. Payments and Fees</h2>
                <p>Clients agree to pay for services they receive from Freelancers. My Freelance may charge a service fee for each transaction, which will be clearly stated at the time of payment. All payments are processed through our secure payment gateway.</p>

                <h2>6. Dispute Resolution</h2>
                <p>In the event of a dispute between a Client and a Freelancer, My Freelance provides a dispute resolution process. Our decision in such disputes is final and binding on both parties.</p>

                <h2>7. Limitation of Liability</h2>
                <p>My Freelance shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from (a) your access to or use of or inability to access or use the services; (b) any conduct or content of any third party on the services.</p>

                <h2>8. Termination</h2>
                <p>We may terminate or suspend your account and bar access to the services immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

                <h2>9. Governing Law</h2>
                <p>These Terms shall be governed and construed in accordance with the laws of Serbia, without regard to its conflict of law provisions.</p>

                <h2>10. Changes to Terms</h2>
                <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. We will provide at least 30 days' notice before any new terms take effect. By continuing to access or use our services after those revisions become effective, you agree to be bound by the revised terms.</p>
            </div>
        </div>
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
