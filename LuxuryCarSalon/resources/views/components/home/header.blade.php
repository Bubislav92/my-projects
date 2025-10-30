<header class="fixed top-0 left-0 w-full z-50 bg-background-dark/95 backdrop-blur-sm shadow-xl border-b border-border-gray/50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- 1. ЛОГО - 'Luxury Car Salon' --}}
            <a href="/" class="flex-shrink-0">
                <span class="text-3xl font-extrabold tracking-widest text-text-light uppercase">
                    <span class="text-accent-gold">L</span>UXURY<span class="text-accent-gold">.</span>
                </span>
            </a>

            {{-- 2. ДЕСКТОП НАВИГАЦИЈА --}}
            <nav class="hidden lg:flex lg:space-x-8 items-center">
                <a href="#inventory" class="text-text-light hover:text-accent-gold transition duration-300 font-semibold uppercase text-sm">Inventory</a>
                <a href="#models" class="text-text-light hover:text-accent-gold transition duration-300 font-semibold uppercase text-sm">Models</a>
                <a href="#about" class="text-text-light hover:text-accent-gold transition duration-300 font-semibold uppercase text-sm">About Us</a>
                <a href="#contact" class="text-text-light hover:text-accent-gold transition duration-300 font-semibold uppercase text-sm">Contact</a>
                
                {{-- CTA Дугме --}}
                <a href="#enquire" class="ml-6 py-2 px-6 bg-accent-gold hover:bg-opacity-90 text-background-dark font-bold rounded-sm shadow-lg transition duration-300 uppercase text-sm tracking-wider">
                    Enquire Now
                </a>
            </nav>

            {{-- 3. МОБИЛНИ МЕНИ ДУГМЕ (ХАМБУРГЕР) --}}
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-button" type="button" class="text-text-light hover:text-accent-gold focus:outline-none focus:text-accent-gold transition duration-300 p-2 rounded">
                    {{-- Икона хамбургера --}}
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- 4. МОБИЛНИ МЕНИ (Скривен, отвара се JavaScript-ом) --}}
    <div id="mobile-menu" class="lg:hidden hidden bg-surface-dark border-t border-border-gray">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#inventory" class="block px-3 py-2 rounded-md text-base font-medium text-text-light hover:bg-border-gray hover:text-accent-gold transition duration-300">Inventory</a>
            <a href="#models" class="block px-3 py-2 rounded-md text-base font-medium text-text-light hover:bg-border-gray hover:text-accent-gold transition duration-300">Models</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-text-light hover:bg-border-gray hover:text-accent-gold transition duration-300">About Us</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-text-light hover:bg-border-gray hover:text-accent-gold transition duration-300">Contact</a>
            
            {{-- CTA у мобилном менију --}}
            <a href="#enquire" class="block mt-4 text-center py-2 px-4 bg-accent-gold hover:bg-opacity-90 text-background-dark font-bold rounded-sm shadow-lg transition duration-300 uppercase text-sm tracking-wider">
                Enquire Now
            </a>
        </div>
    </div>

</header>

{{-- Важна напомена: Овај 'div' је потребан да се главни садржај не би крио испод фиксног хедера --}}
<div class="h-20"></div>

<script>
    // ЈаваСкрипт за пребацивање мобилног менија
    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    });
</script>