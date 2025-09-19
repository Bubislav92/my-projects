 <header class="relative bg-white shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-primary transition-all duration-300 transform hover:scale-105">
                Restaurant
            </a>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-primary hover:text-accent transition-colors duration-300">Home</a>
                <a href="{{ route('menu') }}" class="text-primary hover:text-accent transition-colors duration-300">Menu</a>
                <a href="{{ route('gallery') }}" class="text-primary hover:text-accent transition-colors duration-300">Gallery</a>
                <a href="{{ route('contact') }}" class="text-primary hover:text-accent transition-colors duration-300">Contact</a>
            </nav>

            <div class="hidden md:block">
                <a href="{{ route('reservations') }}" class="bg-accent text-white px-6 py-2 rounded-full font-semibold hover:bg-highlight hover:text-primary transition-all duration-300 transform hover:scale-105">
                    Reserve
                </a>
            </div>
            
            <button id="mobile-menu-button" class="md:hidden text-primary focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden absolute w-full bg-white shadow-lg p-4 z-50">
            <a href="#" class="block text-primary py-2 hover:text-accent transition-colors duration-300">Menu</a>
            <a href="#" class="block text-primary py-2 hover:text-accent transition-colors duration-300">Gallery</a>
            <a href="#" class="block text-primary py-2 hover:text-accent transition-colors duration-300">Contact</a>
            <a href="#" class="block bg-accent text-white text-center py-2 mt-4 rounded-full font-semibold hover:bg-highlight hover:text-primary transition-all duration-300 transform hover:scale-105">Reserve</a>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
