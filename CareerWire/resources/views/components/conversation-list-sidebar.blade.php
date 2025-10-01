<div class="h-full flex flex-col">
    
    {{-- Заглавље: Претрага и Наслов --}}
    <div class="p-4 border-b border-gray-200 flex-shrink-0">
        <h2 class="text-xl font-bold text-gray-800 mb-3">Поруке</h2>
        <div class="relative">
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            <input 
                type="search" 
                placeholder="Претражите разговоре..."
                class="w-full pl-10 pr-4 py-2 text-sm border-gray-300 rounded-md focus:border-carrerwire-green focus:ring-carrerwire-green-light"
            >
        </div>
    </div>
    
    {{-- Листа Разговора (Скролујући део) --}}
    <div class="flex-1 overflow-y-auto">
        
        {{-- Картица Разговора (АКТИВНА) --}}
        <a href="#" class="flex items-center p-4 border-b border-gray-100 bg-gray-50 border-l-4 border-carrerwire-green-dark">
            {{-- Аватар --}}
            <div class="w-10 h-10 rounded-full bg-carrerwire-orange flex items-center justify-center text-white text-base font-semibold flex-shrink-0">
                Р
            </div>
            
            <div class="ml-3 flex-1 min-w-0">
                <div class="flex justify-between items-center">
                    <h3 class="text-sm font-semibold text-gray-800 truncate">Радован Илић</h3>
                    <span class="text-xs text-carrerwire-green-dark font-medium flex-shrink-0">Сада</span>
                </div>
                <p class="text-xs text-gray-500 truncate mt-0.5">Супер, видимо се сутра!</p>
            </div>
        </a>

        {{-- Картица Разговора (НЕАКТИВНА) --}}
        <a href="#" class="flex items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition duration-150 border-l-4 border-transparent">
            {{-- Аватар --}}
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-base font-semibold flex-shrink-0">
                А
            </div>
            
            <div class="ml-3 flex-1 min-w-0">
                 <div class="flex justify-between items-center">
                    <h3 class="text-sm font-medium text-gray-700 truncate">Ана Николић</h3>
                    <span class="text-xs text-gray-400 flex-shrink-0">Пре 1ч</span>
                </div>
                <p class="text-xs text-gray-500 truncate mt-0.5">Хвала на информацији...</p>
            </div>
        </a>
        
        {{-- Картица Разговора (НЕПРОЧИТАНА) --}}
        <a href="#" class="flex items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition duration-150 border-l-4 border-transparent">
            {{-- Аватар --}}
            <div class="w-10 h-10 rounded-full bg-carrerwire-green flex items-center justify-center text-white text-base font-semibold flex-shrink-0">
                Д
            </div>
            
            <div class="ml-3 flex-1 min-w-0">
                 <div class="flex justify-between items-center">
                    <h3 class="text-sm font-extrabold text-gray-800 truncate">Дарко Милић</h3>
                    <span class="text-xs text-carrerwire-orange-dark font-bold flex-shrink-0">21:30</span>
                </div>
                <p class="text-xs font-semibold text-gray-800 truncate mt-0.5">Да ли си видео нови... <span class="ml-1 px-1.5 py-0.5 bg-carrerwire-orange rounded-full text-white text-xs">2</span></p>
            </div>
        </a>
        
    </div>
</div>