@props(['user'])

<div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
    <h3 class="sr-only">Креирајте нову објаву</h3>
    
    {{-- Унос и Аватар --}}
    <div class="flex items-center space-x-3">
        {{-- Аватар --}}
        <div class="w-10 h-10 rounded-full bg-gray-300 flex-shrink-0">
            {{-- Може бити иницијал или слика --}}
            @if(isset($user->profile_photo_url))
                <img src="{{ $user->profile_photo_url }}" alt="Аватар" class="w-full h-full object-cover rounded-full">
            @else
                <div class="w-full h-full flex items-center justify-center text-sm text-gray-600 font-bold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>
        
        {{-- Текстуални унос --}}
        <button 
            type="button"
            class="flex-1 text-left py-2 px-4 bg-gray-100 text-gray-500 rounded-full border border-gray-200 hover:bg-gray-200 transition duration-150"
            {{-- Овде додајте логику за модал (Modal) отварање --}}
        >
            Започните објаву, {{ explode(' ', $user->name)[0] }}...
        </button>
    </div>
    
    {{-- Доње опције за додавање садржаја --}}
    <div class="mt-4 flex justify-between space-x-2">
        
        {{-- Фотографија --}}
        <button class="flex items-center justify-center space-x-2 text-gray-600 hover:text-carrerwire-green p-2 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            <span class="text-sm font-medium hidden sm:inline">Фотографија</span>
        </button>
        
        {{-- Видео --}}
        <button class="flex items-center justify-center space-x-2 text-gray-600 hover:text-carrerwire-orange p-2 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.55 3.326A1 1 0 0119 15v4a1 1 0 01-1 1H6a1 1 0 01-1-1v-4a1 1 0 01-.55-1.674L9 10m6 0a2 2 0 100-4 2 2 0 000 4z" /></svg>
            <span class="text-sm font-medium hidden sm:inline">Видео</span>
        </button>
        
        {{-- Документ --}}
        <button class="flex items-center justify-center space-x-2 text-gray-600 hover:text-carrerwire-green-dark p-2 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            <span class="text-sm font-medium hidden sm:inline">Документ</span>
        </button>

        {{-- Напиши чланак --}}
        <button class="flex items-center justify-center space-x-2 text-gray-600 hover:text-carrerwire-orange-dark p-2 rounded-lg transition duration-150">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.5v11m4-8H8" /></svg>
            <span class="text-sm font-medium hidden sm:inline">Чланак</span>
        </button>
        
    </div>
</div>