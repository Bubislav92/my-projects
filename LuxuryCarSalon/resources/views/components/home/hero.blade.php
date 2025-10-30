<section class="relative h-screen flex items-center justify-center bg-background-dark overflow-hidden">

    {{-- 1. ПОЗАДИНА: ИМПРЕСИВНА СЛИКА АУТОМОБИЛА --}}
    {{-- Напомена: Замените 'path/to/your/luxury-car.jpg' стварном путањом --}}
    <div class="absolute inset-0">
        <img 
            src="path/to/your/luxury-car.jpg" 
            alt="An impressive high-end luxury car" 
            class="w-full h-full object-cover opacity-60 transition duration-500 ease-in-out hover:opacity-75"
        >
        {{-- Прекривач (Overlay) за бољи контраст текста --}}
        <div class="absolute inset-0 bg-background-dark/50"></div>
    </div>

    {{-- 2. САДРЖАЈ: НАСЛОВ И CTA ДУГМЕ --}}
    <div class="relative z-10 text-center container mx-auto px-4 sm:px-6 lg:px-8 pt-20"> {{-- pt-20 да избегне header --}}
        
        {{-- Суп-наслов --}}
        <p class="text-xl sm:text-2xl font-light tracking-widest text-text-light/80 uppercase mb-4 animate-fadeInUp">
            The Pinnacle of Automotive Excellence
        </p>

        {{-- Главни наслов --}}
        <h1 class="text-6xl sm:text-8xl lg:text-9xl font-extrabold text-text-light mb-8 leading-tight">
            <span class="text-accent-gold">UNRIVALED.</span> <br class="hidden sm:block"> POWER.
        </h1>

        {{-- CTA Дугме --}}
        <a href="#inventory" class="inline-block mt-6 py-4 px-10 bg-accent-gold hover:bg-opacity-90 text-background-dark font-bold text-lg rounded-sm shadow-2xl transition duration-300 uppercase tracking-wider transform hover:scale-105">
            Explore Inventory
        </a>
        
        {{-- Секундарно CTA --}}
        <p class="mt-4 text-sm font-medium text-highlight-blue hover:text-highlight-blue/80 transition duration-300 cursor-pointer">
            <a href="#schedule-test" class="underline">Schedule a Test Drive</a>
        </p>

    </div>

    {{-- 3. Стрелица за скроловање --}}
    <div class="absolute bottom-10 z-10">
        <a href="#featured" class="text-text-light hover:text-accent-gold transition duration-300 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </a>
    </div>

</section>