@props(['name' => 'Радован Илић', 'headline' => 'UX/UI Дизајнер'])

<div class="h-full flex flex-col">
    
    {{-- Заглавље Активног Разговора --}}
    <div class="flex items-center justify-between p-4 border-b border-gray-200 flex-shrink-0">
        <a href="#" class="flex items-center hover:bg-gray-50 p-2 rounded-lg transition duration-150">
            {{-- Аватар --}}
            <div class="w-10 h-10 rounded-full bg-carrerwire-orange flex items-center justify-center text-white text-base font-semibold mr-3">
                 {{ strtoupper(substr($name, 0, 1)) }}
            </div>
            
            <div>
                <h3 class="text-base font-bold text-gray-800">{{ $name }}</h3>
                <p class="text-xs text-gray-500">{{ $headline }}</p>
            </div>
        </a>

        {{-- Акције (Опције) --}}
        <button class="text-gray-400 hover:text-carrerwire-green-dark p-2 rounded-full transition duration-150">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg>
        </button>
    </div>

    {{-- Простор за Поруке (Скролујући део) --}}
    <div class="flex-1 overflow-y-auto p-6 space-y-4">
        {{ $slot }}
    </div>

    {{-- Форма за Слање Поруке --}}
    <div class="p-4 border-t border-gray-200 flex-shrink-0">
        <div class="flex space-x-3">
            <input 
                type="text" 
                placeholder="Напишите поруку..."
                class="flex-1 px-4 py-2 border-gray-300 rounded-full focus:border-carrerwire-green focus:ring-carrerwire-green-light"
            >
            <button class="w-10 h-10 rounded-full bg-carrerwire-green text-white flex items-center justify-center hover:bg-carrerwire-green-dark transition duration-150">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            </button>
        </div>
        <p class="text-xs text-gray-500 mt-2">Притисните Enter за слање.</p>
    </div>
</div>