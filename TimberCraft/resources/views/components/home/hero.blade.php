{{--
    ВАЖНО: Замените '{{ asset('images/woodworking_hero.jpg') }}' стварном путањом до слике.
    Слика треба да буде високог квалитета, да приказује лепо дрво, радионицу или готов производ.
--}}
<section class="relative h-[60vh] md:h-[80vh] flex items-center justify-center text-center overflow-hidden">
    
    {{-- Позадинска слика са ефектом паралаксе (ако је могуће) --}}
    <div class="absolute inset-0 bg-cover bg-center bg-fixed" 
         style="background-image: url('{{ asset('images/woodworking_hero.jpg') }}');">
    </div>

    {{-- Overlay за бољи контраст текста --}}
    <div class="absolute inset-0 bg-charcoal opacity-70"></div>

    {{-- Главни садржај --}}
    <div class="relative z-10 max-w-4xl px-6" 
         data-aos="zoom-in" 
         data-aos-duration="1500">

        {{-- Главни наслов --}}
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold leading-tight text-off-white mb-4" 
            data-aos="fade-up" data-aos-delay="200">
            Timeless Craftsmanship, Built Solid.
        </h1>

        {{-- Под-наслов/Опис --}}
        <p class="text-lg sm:text-xl text-wood-light mb-8 max-w-2xl mx-auto" 
           data-aos="fade-up" data-aos-delay="400">
            **TimberCraft** is your trusted partner for custom cabinetry, bespoke furniture, and architectural woodworking. Quality in every detail.
        </p>

        {{-- Позив на акцију (Call to Action - CTA) --}}
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6" 
             data-aos="fade-up" data-aos-delay="600">
            
            <a href="#projects" class="inline-block px-10 py-3 text-lg font-semibold rounded-lg bg-wood-primary text-off-white hover:bg-wood-light transition duration-300 shadow-xl transform hover:scale-[1.03]">
                View Our Portfolio
            </a>
            
            <a href="#contact" class="inline-block px-10 py-3 text-lg font-semibold rounded-lg border-2 border-wood-light text-wood-light hover:bg-wood-light hover:text-charcoal transition duration-300">
                Start Your Project
            </a>
        </div>
    </div>
</section>