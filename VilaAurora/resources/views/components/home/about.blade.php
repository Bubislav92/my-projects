<section id="o-nama" class="py-20 lg:py-32 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto">
            <p class="text-sm font-semibold uppercase tracking-widest text-accent-500 mb-3">
                Добродошли у Вилу „Аурора”
            </p>
            <h2 class="text-4xl sm:text-5xl font-serif font-bold text-primary-900 leading-tight">
                Оаза Мира и Елеганције
            </h2>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-10 items-start">
            
            {{-- Слика са стране (Замените путању) --}}
            <div class="md:col-span-1 overflow-hidden rounded-lg shadow-xl">
                <img 
                    src="{{ asset('storage/images/image4.jpg') }}" 
                    alt="Унутрашњи детаљ виле" 
                    class="w-full h-80 object-cover transform hover:scale-105 transition duration-500"
                >
            </div>

            {{-- Текст са детаљима --}}
            <div class="md:col-span-2 space-y-6 text-primary-900/90">
                <p class="text-lg leading-relaxed">
                    Смештена у срцу нетакнуте природе, **Вила „Аурора”** представља синоним за престиж и опуштање. Дизајнирана да пружи максималну приватност и удобност, сваки детаљ у вили је пажљиво одабран да инспирише осећај луксуза и спокоја.
                </p>
                <p class="leading-relaxed border-l-4 border-accent-500 pl-4 italic text-secondary-500">
                    Наш циљ је да ваш боравак претворимо у незаборавно искуство, далеко од градске буке. Уживајте у врхунској услузи и амбијенту који је посвећен искључиво вама.
                </p>
                
                {{-- Листа карактеристика --}}
                <ul class="grid grid-cols-2 gap-4 pt-4">
                    <li class="flex items-center text-primary-900">
                        <span class="text-accent-500 mr-2 text-xl font-bold">&bull;</span> Приватна башта
                    </li>
                    <li class="flex items-center text-primary-900">
                        <span class="text-accent-500 mr-2 text-xl font-bold">&bull;</span> Ексклузивни дизајн
                    </li>
                    <li class="flex items-center text-primary-900">
                        <span class="text-accent-500 mr-2 text-xl font-bold">&bull;</span> Паметни системи
                    </li>
                    <li class="flex items-center text-primary-900">
                        <span class="text-accent-500 mr-2 text-xl font-bold">&bull;</span> 24/7 Подршка
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
</section>