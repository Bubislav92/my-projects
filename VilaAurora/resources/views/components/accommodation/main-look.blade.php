<section class="py-20 lg:py-32 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        {{-- Карда 1: Председнички Апартман (Најлуксузнији) --}}
        <div class="flex flex-col lg:flex-row bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-3xl transition duration-500 border border-accent-500/10">
            
            <div class="lg:w-1/2">
                <img src="{{ asset('storage/images/image12.jpg') }}" alt="Председнички Апартман" class="w-full h-96 object-cover lg:h-full">
            </div>

            <div class="lg:w-1/2 p-8 lg:p-12 space-y-6">
                <h2 class="text-4xl font-serif font-bold text-accent-500">
                    Председнички Апартман
                </h2>
                <p class="text-primary-900/90 leading-relaxed">
                    Наш највећи и најпрестижнији апартман. Простор од **150м²** са панорамским погледом, приватном терасом, ђакузијем и одвојеним дневним боравком. Савршен за госте који захтевају максимум приватности и луксуза.
                </p>
                
                {{-- Карактеристике --}}
                <div class="flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium">
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> 150м²</span>
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> Макс. 4 особе</span>
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> Private Jacuzzi</span>
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> King Size кревет</span>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <p class="text-2xl font-bold text-primary-900">
                        од <span class="text-secondary-500">350 &euro;</span> / ноћ
                    </p>
                    <a href="{{ route('appointment') }}" 
                       class="px-8 py-3 text-base font-bold rounded-full text-primary-50 bg-accent-500 hover:bg-accent-700 transition duration-300 shadow-md">
                        Резервиши
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Карда 2: Делукс Апартман --}}
        <div class="flex flex-col lg:flex-row-reverse bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-3xl transition duration-500 border border-accent-500/10">
            
            <div class="lg:w-1/2">
                <img src="{{ asset('storage/images/image13.jpg') }}" alt="Делукс Апартман" class="w-full h-96 object-cover lg:h-full">
            </div>

            <div class="lg:w-1/2 p-8 lg:p-12 space-y-6">
                 <h2 class="text-4xl font-serif font-bold text-accent-500">
                    Делукс Апартман
                </h2>
                <p class="text-primary-900/90 leading-relaxed">
                    Елегантан и модеран апартман од **90м²** који нуди поглед на башту. Има пространо купатило са *walk-in* тушем и све што је потребно за опуштајући и удобан боравак. Идеалан за парове.
                </p>
                
                {{-- Карактеристике --}}
                <div class="flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium">
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> 90м²</span>
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> Макс. 2 особе</span>
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> Поглед на башту</span>
                    <span class="flex items-center text-primary-900"><span class="text-accent-500 mr-2">•</span> Радни сто</span>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <p class="text-2xl font-bold text-primary-900">
                        од <span class="text-secondary-500">250 &euro;</span> / ноћ
                    </p>
                    <a href="{{ route('appointment') }}" 
                       class="px-8 py-3 text-base font-bold rounded-full text-primary-50 bg-accent-500 hover:bg-accent-700 transition duration-300 shadow-md">
                        Резервиши
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>