<section class="relative h-screen flex items-center justify-center overflow-hidden">
    
    {{-- Слика позадине (Замените 'img/vila-aurora-hero.jpg' својом стварном путањом) --}}
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ asset('storage/images/image3.jpg') }}" 
            alt="Луксузна Вила Аурора" 
            class="w-full h-full object-cover"
        >
        
        {{-- Прекривач (Overlay) за бољу читљивост текста и луксузан тон --}}
        <div class="absolute inset-0 bg-primary-900 opacity-60"></div>
    </div>

    {{-- Главни садржај (Текст и Дугме) --}}
    <div class="relative z-10 text-center max-w-4xl px-4">
        
        {{-- Луксузни Наслов --}}
        <h1 class="text-6xl sm:text-7xl font-serif font-extrabold text-primary-50 leading-tight">
            Ваш Префињени Избор
        </h1>

        {{-- Под-наслов/Слоган --}}
        <p class="mt-4 sm:mt-6 text-xl sm:text-2xl text-accent-500 font-light italic tracking-wider drop-shadow-md">
            Вила „Аурора”: Уметност Живљења.
        </p>

        {{-- Позив на акцију (CTA Дугме) --}}
        <div class="mt-10">
            <a href="#rezervacija" 
               class="inline-flex items-center justify-center 
                      px-10 py-4 border-2 border-accent-500 
                      text-lg font-bold uppercase rounded-full 
                      text-primary-50 bg-accent-500/90 
                      hover:bg-accent-700 hover:border-accent-700 
                      shadow-2xl transition duration-500 transform hover:scale-105"
            >
                Резервишите Ваш Боравак
            </a>
        </div>
        
    </div>

    {{-- Мали стрелица за скроловање (Опционо, за модеран изглед) --}}
    <div class="absolute bottom-10 z-10 animate-bounce">
        <a href="#sledeca-sekcija" aria-label="Скролуј доле">
            <svg class="w-8 h-8 text-primary-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </a>
    </div>

</section>