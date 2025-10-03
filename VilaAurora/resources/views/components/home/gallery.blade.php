<section id="galerija" class="py-20 lg:py-32 bg-primary-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16 max-w-3xl mx-auto">
            <h2 class="text-4xl sm:text-5xl font-serif font-bold text-primary-50 leading-tight">
                Галерија: Живот у Аури
            </h2>
            <p class="mt-4 text-lg text-primary-50/80">
                Нека слике говоре саме за себе. Издвојени тренуци и детаљи из ваше будуће оазе.
            </p>
        </div>

        {{-- Grid Галерија (Замените путање сликама) --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            
            {{-- Слика 1 (Већа) --}}
            <div class="col-span-2 row-span-2 overflow-hidden rounded-lg shadow-xl">
                <img src="{{ asset('storage/images/image6.jpg') }}" alt="Вила споља" class="w-full h-full object-cover transform hover:scale-105 transition duration-500 cursor-pointer">
            </div>
            
            {{-- Слика 2 --}}
            <div class="col-span-1 overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/images/image7.jpg') }}" alt="Базен" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500 cursor-pointer">
            </div>
            
            {{-- Слика 3 --}}
            <div class="col-span-1 overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/images/image8.jpg') }}" alt="Тераса" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500 cursor-pointer">
            </div>
            
             {{-- Слика 4 --}}
            <div class="col-span-1 overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/images/image9.jpg') }}" alt="Кухиња" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500 cursor-pointer">
            </div>
            
            {{-- Слика 5 --}}
            <div class="col-span-1 overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/images/image10.jpg') }}" alt="Дневни боравак" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500 cursor-pointer">
            </div>
            
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" 
               class="inline-flex items-center justify-center 
                      px-8 py-3 border border-accent-500 
                      text-base font-medium rounded-full 
                      text-primary-50 hover:text-accent-500 
                      hover:bg-primary-900/10 transition duration-300">
                Погледајте целу галерију
            </a>
        </div>
        
    </div>
</section>