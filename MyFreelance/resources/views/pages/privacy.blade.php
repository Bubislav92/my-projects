<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
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
        .prose h2, .prose h3 {
            margin-top: 1.5em;
        }
        .prose ul, .prose ol {
            padding-left: 1.5em;
        }
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
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-8 md:mb-12">Privacy Policy</h1>

            <div class="prose lg:prose-lg max-w-none">
                <p><strong>Last Updated:</strong> August 1, 2025</p>

                <p>This Privacy Policy describes how My Freelance ("we," "us," or "our") collects, uses, and discloses your information when you use our platform. By accessing or using our services, you agree to the collection and use of information in accordance with this policy.</p>

                <h2>1. Information We Collect</h2>
                <p>We collect various types of information to provide and improve our services, including:</p>
                <ul>
                    <li><strong>Personal Information:</strong> This includes your name, email address, physical address, and phone number when you register for an account.</li>
                    <li><strong>Profile Information:</strong> For freelancers, this may include your professional title, skills, portfolio, and work history. For clients, it may include company details.</li>
                    <li><strong>Payment Information:</strong> When you make or receive payments, we collect payment details, such as credit card information or bank account details.</li>
                    <li><strong>Usage Data:</strong> We automatically collect data about your interactions with the platform, such as IP address, browser type, pages visited, and the duration of your visit.</li>
                </ul>

                <h2>2. How We Use Your Information</h2>
                <p>We use the collected information for various purposes, including:</p>
                <ul>
                    <li>To provide, operate, and maintain our platform.</li>
                    <li>To create and manage your account.</li>
                    <li>To process transactions and send related information, including invoices and confirmations.</li>
                    <li>To communicate with you, including responding to your inquiries and providing support.</li>
                    <li>To personalize your experience and provide relevant content.</li>
                    <li>To detect, prevent, and address technical issues and fraudulent activity.</li>
                </ul>

                <h2>3. How We Share Your Information</h2>
                <p>We may share your information in the following situations:</p>
                <ul>
                    <li><strong>With Other Users:</strong> Information from your public profile may be shared with other users on the platform to facilitate collaboration.</li>
                    <li><strong>With Service Providers:</strong> We may share your data with trusted third-party service providers who assist us in operating our platform, such as payment processors and hosting services.</li>
                    <li><strong>For Legal Reasons:</strong> We may disclose your information if required by law or in response to valid requests by public authorities.</li>
                </ul>

                <h2>4. Data Security</h2>
                <p>We implement a variety of security measures to maintain the safety of your personal information. However, no method of transmission over the internet or electronic storage is 100% secure.</p>

                <h2>5. Your Choices and Rights</h2>
                <p>You have certain rights regarding your personal data, including the right to access, update, or delete your information. You can manage your account information through your profile settings.</p>

                <h2>6. Changes to this Privacy Policy</h2>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>

                <h2>7. Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:privacy@myfreelance.com">privacy@myfreelance.com</a>.</p>
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
