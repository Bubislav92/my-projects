<div class="flex flex-col lg:flex-row items-center justify-between">
    
    {{-- Лева страна: Текст и CTA --}}
    <div class="lg:w-1/2 space-y-6 text-center lg:text-left">
        
        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight">
            Повежите <span class="text-carrerwire-green">Пословање</span> и Креативност.
        </h1>
        
        <p class="text-xl text-gray-600 mt-4">
            Изградите своју професионалну мрежу, пронађите посао из снова и делите знање са заједницом која расте.
        </p>
        
        {{-- Главни CTA за Регистрацију --}}
        <div class="mt-8 flex justify-center lg:justify-start space-x-4">
            <a href="{{ route('register') }}" class="px-8 py-3 text-lg font-bold rounded-full text-white bg-carrerwire-orange hover:bg-carrerwire-orange-dark shadow-lg transition duration-150 transform hover:scale-105">
                Започните одмах
            </a>
            <a href="#" class="px-8 py-3 text-lg font-bold rounded-full border border-gray-400 text-gray-700 hover:bg-gray-200 transition duration-150">
                Сазнајте више
            </a>
        </div>
        
    </div>
    
    {{-- Десна страна: Илустрација (Замените сликом) --}}
    <div class="lg:w-1/2 mt-12 lg:mt-0 flex justify-center">
        <div class="w-full max-w-lg h-80 bg-carrerwire-green-light rounded-2xl shadow-xl flex items-center justify-center text-white text-2xl font-bold opacity-80">
            [Место за графику/илустрацију]
        </div>
    </div>
</div>