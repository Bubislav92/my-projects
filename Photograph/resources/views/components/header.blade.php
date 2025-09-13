<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-6 flex justify-between items-center">
        <a href="{{ route('home') }}" class="group flex items-center space-x-2 transform transition-transform duration-300 hover:scale-105">
            <svg class="h-8 w-8 text-amber-500 transition-colors duration-300 group-hover:text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.218A2 2 0 0110.19 4h3.62a2 2 0 011.664.89l.812 1.218A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-2xl font-bold tracking-tight text-stone-950 transition-colors duration-300 group-hover:text-amber-600">Alex Reed</span>
        </a>

        <nav class="hidden md:flex items-center space-x-6">
            <ul class="flex space-x-6">
                <li data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-amber-500 font-medium transition-colors duration-300">
                        Home
                    </a>
                </li>
                <li data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-amber-500 font-medium transition-colors duration-300">
                        About
                    </a>
                </li>
                <li data-aos="fade-down" data-aos-delay="400" data-aos-duration="1000">
                    <a href="{{ route('services') }}" class="text-gray-700 hover:text-amber-500 font-medium transition-colors duration-300">
                        Services
                    </a>
                </li>
                <li data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000">
                    <a href="{{ route('portfolio') }}" class="text-gray-700 hover:text-amber-500 font-medium transition-colors duration-300">
                        Portfolio
                    </a>
                </li>
            </ul>
        </nav>

        <a href="{{ route('contact') }}"
            class="hidden md:block bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
            data-aos="fade-left"
            data-aos-duration="1000">
                Contact Me
        </a>

        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-amber-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md py-4 transition-all duration-300">
        <nav class="flex flex-col items-center space-y-4">
            <a href="#" class="block text-lg text-gray-700 hover:text-amber-500 font-medium">Portfolio</a>
            <a href="#" class="block text-lg text-gray-700 hover:text-amber-500 font-medium">About</a>
            <a href="#" class="block text-lg text-gray-700 hover:text-amber-500 font-medium">Services</a>
            <a href="#" class="block bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-6 rounded-full">
                Contact Me
            </a>
        </nav>
    </div>
</header>