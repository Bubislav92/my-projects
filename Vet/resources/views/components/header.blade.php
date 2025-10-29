<header class="bg-white shadow-md sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-primary-700 tracking-wider">
                    VET
                </a>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="/" class="text-text-default hover:text-primary-500 font-medium transition duration-150 ease-in-out">Home</a>
                <a href="/services" class="text-text-default hover:text-primary-500 font-medium transition duration-150 ease-in-out">Services</a>
                <a href="/about" class="text-text-default hover:text-primary-500 font-medium transition duration-150 ease-in-out">About Us</a>
                <a href="/team" class="text-text-default hover:text-primary-500 font-medium transition duration-150 ease-in-out">Our Team</a>
                <a href="/blog" class="text-text-default hover:text-primary-500 font-medium transition duration-150 ease-in-out">Blog</a>
                <a href="/contact" class="text-text-default hover:text-primary-500 font-medium transition duration-150 ease-in-out">Contact</a>
            </nav>

            <div class="hidden md:block">
                <a href="/appointment" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-500 hover:bg-primary-600 transition duration-150 ease-in-out">
                    Book an Appointment
                </a>
            </div>

            <div class="md:hidden" x-data="{ open: false }">
                <button 
                    @click="open = !open" 
                    class="p-2 rounded-md text-text-default hover:text-primary-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                    aria-controls="mobile-menu" 
                    :aria-expanded="open ? 'true' : 'false'"
                >
                    <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div class="md:hidden" x-data="{ open: false }" id="mobile-menu" x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/home" class="text-text-default hover:bg-primary-50 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="/services" class="text-text-default hover:bg-primary-50 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Services</a>
            <a href="/about" class="text-text-default hover:bg-primary-50 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
            <a href="/team" class="text-text-default hover:bg-primary-50 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Our Team</a>
            <a href="/contact" class="text-text-default hover:bg-primary-50 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            
            <a href="/appointment" class="mt-2 block w-full text-center px-3 py-2 border border-transparent text-base font-medium rounded-md text-white bg-secondary-500 hover:bg-secondary-600 transition duration-150 ease-in-out">
                Book an Appointment
            </a>
        </div>
    </div>
</header>