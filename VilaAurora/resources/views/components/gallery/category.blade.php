<section class="py-20 lg:py-32 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Филтери Галерије (За интеракцију је потребан JS) --}}
        <div class="flex flex-wrap justify-center space-x-2 sm:space-x-4 mb-12">
            <button class="gallery-filter-btn px-5 py-2 text-sm font-semibold rounded-full bg-accent-500 text-primary-900 hover:bg-accent-700 transition duration-300" 
                    data-filter="all">Све</button>
            <button class="gallery-filter-btn px-5 py-2 text-sm font-semibold rounded-full bg-primary-900/10 text-primary-900 hover:bg-accent-500 hover:text-primary-900 transition duration-300" 
                    data-filter="eksterijer">Екстеријер</button>
            <button class="gallery-filter-btn px-5 py-2 text-sm font-semibold rounded-full bg-primary-900/10 text-primary-900 hover:bg-accent-500 hover:text-primary-900 transition duration-300" 
                    data-filter="enterijer">Ентеријер</button>
            <button class="gallery-filter-btn px-5 py-2 text-sm font-semibold rounded-full bg-primary-900/10 text-primary-900 hover:bg-accent-500 hover:text-primary-900 transition duration-300" 
                    data-filter="detalji">Детаљи и Амбијент</button>
        </div>

        {{-- Grid Контејнер Галерије --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            
            {{-- Слика 1: Екстеријер --}}
            <div class="gallery-item eksterijer overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image1.jpg') }}" alt="Вила споља, главни улаз" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>

            {{-- Слика 2: Ентеријер --}}
            <div class="gallery-item enterijer overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image7.jpg') }}" alt="Дневни боравак" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>
            
            {{-- Слика 3: Детаљи --}}
            <div class="gallery-item detalji overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image10.jpg') }}" alt="Луксузни детаљ, златни акценат" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>

            {{-- Слика 4: Екстеријер (Већа) --}}
            <div class="gallery-item eksterijer col-span-2 md:col-span-1 lg:col-span-2 row-span-1 md:row-span-2 overflow-hidden rounded-lg shadow-xl aspect-square md:aspect-auto">
                <img src="{{ asset('storage/images/image3.jpg') }}" alt="Ноћни поглед на базен" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>

            {{-- Слика 5: Ентеријер --}}
            <div class="gallery-item enterijer overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image14.jpg') }}" alt="Кухиња са шанком" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>

            {{-- Слика 6: Ентеријер --}}
            <div class="gallery-item enterijer overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image13.jpg') }}" alt="Спаваћа соба" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>
            
            {{-- Слика 7: Детаљи --}}
            <div class="gallery-item detalji overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image14.jpg') }}" alt="Тераса и поглед" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>

            {{-- Слика 8: Екстеријер --}}
            <div class="gallery-item eksterijer overflow-hidden rounded-lg shadow-xl aspect-square">
                <img src="{{ asset('storage/images/image8.jpg') }}" alt="Летњиковац" class="w-full h-full object-cover transform hover:scale-110 transition duration-500 cursor-pointer">
            </div>
            
        </div>
        
    </div>
</section>