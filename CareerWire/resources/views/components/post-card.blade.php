<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
    
    {{-- Заглавље Објаве (Корисник) --}}
    <div class="flex items-start space-x-3">
        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-carrerwire-orange-dark">
            {{-- Аватар Корисника Који Објављује --}}
        </div>
        
        <div class="flex-1 min-w-0">
            <a href="#" class="text-base font-semibold text-gray-900 hover:text-carrerwire-green-dark">
                Марко Петровић
            </a>
            <p class="text-sm text-gray-500 truncate">
                Софтверски Инжењер @ TechSolutions
            </p>
            <p class="text-xs text-gray-400 mt-0.5">
                Пре 2 сата • <span class="ml-1">🌏 Јавно</span>
            </p>
        </div>
        
        {{-- Опције Објаве (...) --}}
        <button class="text-gray-400 hover:text-gray-600 p-1 rounded-full">
             <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" /></svg>
        </button>
    </div>
    
    {{-- Садржај Објаве --}}
    <div class="mt-4 text-gray-700 leading-relaxed">
        <p>Управо завршио прелазак на **Laravel 11** и **Tailwind CSS 3** за наш нови пројекат **CareerWire**! Одушевљен сам чистијом структуром и брзином развоја. 🔥</p>
        <p class="mt-2 text-carrerwire-green-dark">#laravel11 #tailwind #webdevelopment #careerwire</p>
    </div>

    {{-- Медији (Слика, ако постоји) --}}
    {{-- <img src="/slike/projekt.jpg" alt="Пројекат" class="mt-4 rounded-lg w-full"> --}}

    {{-- Број Реакција и Коментара --}}
    <div class="flex justify-between items-center mt-3 pt-2 border-b border-gray-100">
        <div class="flex items-center text-sm text-gray-500">
            <span class="mr-1">👍</span>
            <span>28 Реаговања</span>
        </div>
        <span class="text-sm text-gray-500 hover:text-gray-700 cursor-pointer">
            15 Коментара
        </span>
    </div>
    
    {{-- Дугмад за Акције --}}
    <div class="mt-2 flex justify-around border-t border-gray-100 pt-2">
        
        {{-- Лајк --}}
        <button class="flex items-center justify-center space-x-2 w-full p-2 text-gray-600 hover:bg-gray-50 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span class="text-sm font-semibold">Свиђа ми се</span>
        </button>
        
        {{-- Коментар --}}
        <button class="flex items-center justify-center space-x-2 w-full p-2 text-gray-600 hover:bg-gray-50 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L12 10.586l-.293-.293a1 1 0 00-1.414 0z" /></svg>
            <span class="text-sm font-semibold">Коментар</span>
        </button>
        
        {{-- Дели --}}
        <button class="flex items-center justify-center space-x-2 w-full p-2 text-gray-600 hover:bg-gray-50 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.016 9.771 11 11 11c1.229 0 2.114 1.016 2.316 2.342M14 6H9c-1.105 0-2 .895-2 2v8c0 1.105.895 2 2 2h5c1.105 0 2-.895 2-2V8c0-1.105-.895-2-2-2z" /></svg>
            <span class="text-sm font-semibold">Дели</span>
        </button>
    </div>
    
</div>