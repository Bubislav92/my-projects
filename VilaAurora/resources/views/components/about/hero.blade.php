<section class="relative py-24 md:py-32 flex items-center justify-center overflow-hidden h-96">
    
    {{-- Слика позадине (Замените 'img/about-hero.jpg' својом стварном путањом) --}}
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ asset('storage/images/image11.jpg') }}" 
            alt="Ексклузивни ентеријер Виле Аурора" 
            class="w-full h-full object-cover"
        >
        {{-- Прекривач за бољу читљивост --}}
        <div class="absolute inset-0 bg-primary-900 opacity-70"></div>
    </div>

    {{-- Наслов --}}
    <div class="relative z-10 text-center max-w-4xl px-4">
        <h1 class="text-6xl sm:text-7xl font-serif font-extrabold text-primary-50 leading-tight">
            Наша Прича
        </h1>
        <p class="mt-2 text-xl text-accent-500 font-light italic">
            Како је настала оаза луксуза
        </p>
    </div>
</section>