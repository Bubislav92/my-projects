<header class="bg-off-white shadow-lg sticky top-0 z-50" 
        data-aos="fade-down" 
        data-aos-duration="1000">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- 1. Logo/Brand Name --}}
            <a href="/" class="flex items-center space-x-2" 
               data-aos="fade-right" data-aos-delay="300">
                
                {{-- Можете овде додати SVG лого или икону --}}
                <svg class="h-8 w-8 text-wood-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-10v10a1 1 0 001 1h3m-9-1h2m-2 0h2"/>
                </svg>

                <span class="text-2xl font-bold tracking-wider text-charcoal">
                    TimberCraft
                </span>
            </a>

            {{-- 2. Desktop Navigation --}}
            <nav class="hidden md:flex space-x-8" 
                 data-aos="fade-left" data-aos-delay="300">
                <a href="#services" class="text-charcoal hover:text-wood-primary transition duration-300 font-medium">
                    Services
                </a>
                <a href="#projects" class="text-charcoal hover:text-wood-primary transition duration-300 font-medium">
                    Our Work
                </a>
                <a href="#about" class="text-charcoal hover:text-wood-primary transition duration-300 font-medium">
                    About Us
                </a>
                <a href="#contact" class="px-4 py-2 rounded-full bg-wood-primary text-off-white hover:bg-wood-light transition duration-300 shadow-md font-medium" 
                   data-aos="zoom-in" data-aos-delay="600">
                    Get a Quote
                </a>
            </nav>

            {{-- 3. Mobile Menu Button (Hamburger) --}}
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-charcoal hover:text-wood-primary focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- 4. Mobile Menu (Hidden by default, requires Alpine.js or JS to toggle) --}}
    <div id="mobile-menu" class="hidden md:hidden bg-off-white border-t border-wood-light" 
         data-aos="slide-down" data-aos-duration="500">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#services" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal hover:bg-wood-light">Services</a>
            <a href="#projects" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal hover:bg-wood-light">Our Work</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal hover:bg-wood-light">About Us</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium bg-wood-primary text-off-white hover:bg-wood-light mt-2 text-center">Get a Quote</a>
        </div>
    </div>
</header>

{{-- Morate dodati i osnovnu JavaScript funkciju za Mobile Menu --}}
<script>
    document.getElementById('mobile-menu-button').onclick = function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    };
</script>