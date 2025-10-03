<section id="smestaj" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16 max-w-3xl mx-auto">
            <h2 class="text-4xl sm:text-5xl font-serif font-bold text-primary-900 leading-tight">
                Луксуз у Сваком Кутку
            </h2>
            <p class="mt-4 text-lg text-primary-900/80">
                Откријте наше ексклузивне апартмане, дизајниране да задовоље највише стандарде удобности и стила.
            </p>
        </div>

        {{-- Картица истакнутог смештаја --}}
        <div class="bg-primary-50 rounded-xl overflow-hidden shadow-2xl transition duration-500 hover:shadow-3xl">
            <div class="md:flex">
                
                {{-- Слика Смештаја (Замените путању) --}}
                <div class="md:w-1/2">
                    <img 
                        src="{{ asset('storage/images/image5.jpg') }}" 
                        alt="Председнички апартман" 
                        class="w-full h-96 object-cover"
                    >
                </div>

                {{-- Детаљи Смештаја --}}
                <div class="md:w-1/2 p-8 lg:p-12 space-y-6">
                    <span class="text-sm font-semibold uppercase tracking-widest text-secondary-500">
                        Издвојено из понуде
                    </span>
                    <h3 class="text-3xl font-serif font-bold text-primary-900">
                        Председнички Апартман
                    </h3>
                    <p class="text-primary-900/90 leading-relaxed">
                        Наш најексклузивнији апартман нуди панорамски поглед, приватни ђакузи и персонализовану услугу. Простор од 150м² за ваш савршен одмор.
                    </p>
                    
                    {{-- Карактеристике --}}
                    <div class="flex flex-wrap gap-4 text-sm font-medium text-primary-900">
                        <span class="px-3 py-1 bg-accent-500/10 text-accent-700 rounded-full">
                            150 м²
                        </span>
                        <span class="px-3 py-1 bg-accent-500/10 text-accent-700 rounded-full">
                            4 Особе
                        </span>
                        <span class="px-3 py-1 bg-accent-500/10 text-accent-700 rounded-full">
                            Приватни ђакузи
                        </span>
                    </div>

                    {{-- Дугме за детаље --}}
                    <a href="#detalji-apartmana" 
                       class="inline-flex items-center mt-4 text-accent-500 hover:text-accent-700 font-semibold transition duration-300 group">
                        Погледајте све детаље
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>