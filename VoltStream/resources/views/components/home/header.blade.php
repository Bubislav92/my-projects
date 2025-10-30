<header class="bg-white shadow-md" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- 1. Логотип (VoltStream Installations) --}}
            <div class="flex-shrink-0">
                <a href="/" class="text-xl font-bold text-primary hover:text-secondary transition duration-300 ease-in-out">
                    <span class="text-secondary">Volt</span>Stream Installations
                </a>
            </div>

            {{-- 2. Главна навигација (десктоп) --}}
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="text-text-dark hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">Home</a>
                <a href="#" class="text-text-dark hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">Services</a>
                <a href="#" class="text-text-dark hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">About Us</a>
                <a href="#" class="text-text-dark hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">Projects</a>
            </nav>

            {{-- 3. CTA дугме (десктоп) --}}
            <div class="hidden md:block">
                <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm 
                    text-white bg-secondary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition duration-300">
                    Get a Quote
                </a>
            </div>

            {{-- 4. Дугме за мени (мобилни) --}}
            <div class="md:hidden">
                <button @click="open = !open" type="button" class="bg-accent inline-flex items-center justify-center p-2 rounded-md text-text-dark 
                    hover:text-primary hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-300" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    {{-- Икона хамбургера (приказана када је мени затворен) --}}
                    <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    {{-- Икона "X" (приказана када је мени отворен) --}}
                    <svg x-show="open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- 5. Мобилни мени --}}
    <div x-show="open" x-collapse.duration.300ms class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="bg-accent text-text-dark block px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="#" class="text-text-dark hover:bg-accent block px-3 py-2 rounded-md text-base font-medium">Services</a>
            <a href="#" class="text-text-dark hover:bg-accent block px-3 py-2 rounded-md text-base font-medium">About Us</a>
            <a href="#" class="text-text-dark hover:bg-accent block px-3 py-2 rounded-md text-base font-medium">Projects</a>
            
            {{-- CTA у мобилном менију --}}
            <a href="#" class="w-full text-center mt-3 block px-3 py-2 border border-transparent text-base font-medium rounded-md 
                text-white bg-secondary hover:bg-opacity-90 transition duration-300">
                Get a Quote
            </a>
        </div>
    </div>
</header>