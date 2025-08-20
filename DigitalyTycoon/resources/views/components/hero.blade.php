<section id="home" class="min-h-screen flex items-center justify-center text-center bg-primary-dark text-text-light py-20 relative overflow-hidden">
    {{-- Pozadinska slika sa transparentnošću --}}
    <div class="absolute inset-0 z-0">
        {{-- Ovde dodajte putanju do vaše slike. Preporučujem sliku visoke rezolucije. --}}
        <img src="{{ asset('storage/computer4.jpg') }}" alt="DigitalyTycoon pozadina" class="w-full h-full object-cover opacity-30 sm:opacity-50">
    </div>

    {{-- Sadržaj sekcije (naslov, opis, dugme) --}}
    <div class="container mx-auto px-4 z-10">
        <h1 class="text-6xl md:text-8xl font-bold mb-4" data-aos="fade-up">DigitalyTycoon</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Претварамо идеје у дигиталну стварност. Ваша будућност почиње овде.
        </p>
        <a href="#services" class="bg-accent text-primary-dark font-bold py-3 px-8 rounded-full shadow-lg hover:bg-opacity-80 hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="400">
            Истражите наше услуге
        </a>
    </div>
</section>