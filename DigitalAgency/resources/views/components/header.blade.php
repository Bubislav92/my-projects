<header class="bg-bg-main text-text-light fixed top-0 left-0 w-full z-50 shadow-lg transition-all duration-300">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <a href="#" class="flex items-center space-x-2 transform transition-transform duration-300 hover:scale-105">
            <svg class="h-8 w-8 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span class="text-2xl font-bold tracking-tight text-accent">Digital Agency</span>
        </a>

        <div class="hidden md:flex space-x-8 items-center">
            <a href="{{ route('home') }}" class="text-lg font-medium hover:text-accent transition-colors duration-300">Home</a>
            <a href="{{ route('services') }}" class="text-lg font-medium hover:text-accent transition-colors duration-300">Services</a>
            <a href="{{ route('portfolio') }}" class="text-lg font-medium hover:text-accent transition-colors duration-300">Portfolio</a>
            <a href="{{ route('about') }}" class="text-lg font-medium hover:text-accent transition-colors duration-300">About</a>
            <a href="{{ route('blog') }}" class="text-lg font-medium hover:text-accent transition-colors duration-300">Blog</a>
            <a href="{{ route('contact') }}" class="bg-accent text-primary-dark font-semibold py-2 px-6 rounded-full shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">Contact</a>
        </div>

        <div class="md:hidden flex items-center">
            <button id="hamburger-btn" class="transition-transform duration-300 hover:scale-110 focus:outline-none">
                <svg class="h-8 w-8 text-text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>
    
    <div id="mobile-menu" class="fixed top-[68px] left-0 w-full h-screen bg-primary-light transform -translate-x-full transition-transform duration-500 ease-in-out shadow-lg md:hidden">
        <div class="flex flex-col space-y-2 p-6">
            <a href="{{ route('home') }}" class="block py-4 px-6 text-lg text-text-light hover:bg-bg-secondary hover:text-accent transition-colors duration-300 rounded-lg">Home</a>
            <a href="{{ route('services') }}" class="block py-4 px-6 text-lg text-text-light hover:bg-bg-secondary hover:text-accent transition-colors duration-300 rounded-lg">Services</a>
            <a href="{{ route('portfolio') }}" class="block py-4 px-6 text-lg text-text-light hover:bg-bg-secondary hover:text-accent transition-colors duration-300 rounded-lg">Portfolio</a>
            <a href="{{ route('about') }}" class="block py-4 px-6 text-lg text-text-light hover:bg-bg-secondary hover:text-accent transition-colors duration-300 rounded-lg">About</a>
            <a href="{{ route('blog') }}" class="block py-4 px-6 text-lg text-text-light hover:bg-bg-secondary hover:text-accent transition-colors duration-300 rounded-lg">Blog</a>
            <a href="{{ route('contact') }}" class="block mt-4 py-4 px-6 text-lg text-primary-dark bg-accent text-center font-semibold transition-colors duration-300 rounded-lg">Contact</a>
        </div>
    </div>
</header>

<script>
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('-translate-x-full');
    });
</script>