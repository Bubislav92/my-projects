<footer class="bg-gray-50 py-12 px-4 md:px-8 text-gray-700"
        data-aos="fade-up" data-aos-duration="1000">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 items-start justify-items-center md:justify-items-start text-center md:text-left">

            {{-- Kolona 1: Logo i opis --}}
            <div class="flex flex-col items-center md:items-start space-y-4">
                <a href="{{ route('home') }}" class="group flex items-center space-x-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="h-8 w-8 text-amber-500 transition-colors duration-300 group-hover:text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.218A2 2 0 0110.19 4h3.62a2 2 0 011.664.89l.812 1.218A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-2xl font-bold tracking-tight text-stone-950 transition-colors duration-300 group-hover:text-amber-600">Alex Reed</span>
                </a>
                <p class="text-sm text-gray-600 max-w-xs">
                    Capturing moments that last a lifetime.
                </p>
            </div>

            {{-- Kolona 2: Navigacija --}}
            <div class="flex flex-col items-center md:items-start space-y-4">
                <h4 class="text-lg font-bold text-gray-900">Quick Links</h4>
                <nav class="flex flex-col space-y-2 text-gray-700">
                    <a href="{{ route('home') }}" class="hover:text-amber-500 transition-colors duration-300">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-amber-500 transition-colors duration-300">About</a>
                    <a href="{{ route('services') }}" class="hover:text-amber-500 transition-colors duration-300">Services</a>
                    <a href="{{ route('portfolio') }}" class="hover:text-amber-500 transition-colors duration-300">Portfolio</a>
                    <a href="{{ route('contact') }}" class="hover:text-amber-500 transition-colors duration-300">Contact</a>
                </nav>
            </div>

            {{-- Kolona 3: Social linkovi --}}
            <div class="flex flex-col items-center md:items-start space-y-4">
                <h4 class="text-lg font-bold text-gray-900">Connect With Me</h4>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-accent-400 transition duration-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-accent-400 transition duration-300"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="hover:text-accent-400 transition duration-300"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="hover:text-accent-400 transition duration-300"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500 space-y-4 md:space-y-0">
            <p>&copy; {{ date('Y') }} Alex Reed. All Rights Reserved.</p>
            <p>Designed and developed by: <a href="http://www.digitalytycoon.com" class="hover:text-amber-500 transition-colors">Digitaly Tycoon</a></p>
        </div>
    </div>
</footer>