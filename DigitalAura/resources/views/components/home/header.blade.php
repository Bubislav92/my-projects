<header class="bg-aura-dark shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold tracking-wider text-aura-primary">
                    Digital <span class="text-aura-light">Aura</span>
                </a>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="#services" class="text-aura-light hover:text-aura-primary transition duration-300 ease-in-out font-medium">Services</a>
                <a href="#projects" class="text-aura-light hover:text-aura-primary transition duration-300 ease-in-out font-medium">Projects</a>
                <a href="#about" class="text-aura-light hover:text-aura-primary transition duration-300 ease-in-out font-medium">About Us</a>
            </nav>

            <div class="hidden md:block">
                <a href="#contact" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg shadow-xl text-aura-dark bg-aura-primary hover:bg-aura-secondary transition duration-300 ease-in-out transform hover:scale-105">
                    Contact Us
                </a>
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-aura-light hover:text-aura-primary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-aura-primary" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg id="icon-open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#services" class="text-aura-light hover:bg-aura-dark/50 hover:text-aura-primary block px-3 py-2 rounded-md text-base font-medium">Services</a>
            <a href="#projects" class="text-aura-light hover:bg-aura-dark/50 hover:text-aura-primary block px-3 py-2 rounded-md text-base font-medium">Projects</a>
            <a href="#about" class="text-aura-light hover:bg-aura-dark/50 hover:text-aura-primary block px-3 py-2 rounded-md text-base font-medium">About Us</a>
            
            <a href="#contact" class="mt-4 block w-full text-center px-3 py-2 border border-transparent text-base font-bold rounded-lg text-aura-dark bg-aura-primary hover:bg-aura-secondary transition duration-300 ease-in-out">
                Contact Us
            </a>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('icon-open');
        const closeIcon = document.getElementById('icon-close');
        
        // Toggle menu display
        menu.classList.toggle('hidden');
        
        // Toggle icons
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        
        // Accessibility improvement
        const isExpanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !isExpanded);
    });
</script>