@props(['job'])

<div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition duration-150 flex justify-between space-x-4">
    
    {{-- Детаљи Посла --}}
    <div class="flex-1">
        
        <h3 class="text-xl font-bold text-gray-800 hover:text-carrerwire-green-dark transition duration-150 leading-tight">
            <a href="#">{{ $job['title'] ?? 'Full-Stack Web Девелопер (Laravel/Vue)' }}</a>
        </h3>
        
        <p class="text-lg text-gray-700 mt-1">{{ $job['company'] ?? 'Innovatech Solutions' }}</p>
        
        <p class="text-base text-gray-500 mt-1 flex items-center space-x-3">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                {{ $job['location'] ?? 'Нови Сад, Србија (Хибридно)' }}
            </span>
             • 
            <span class="text-carrerwire-orange font-medium">{{ $job['type'] ?? 'Пуно радно време' }}</span>
        </p>

        {{-- Вештине/Етикете --}}
        <div class="mt-3 flex flex-wrap gap-2">
            <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full border border-gray-300">Laravel</span>
            <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full border border-gray-300">Tailwind</span>
            <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full border border-gray-300">Vue.js</span>
        </div>
        
    </div>
    
    {{-- Акције и Лого --}}
    <div class="flex flex-col items-end justify-between flex-shrink-0">
        
        {{-- Лого компаније --}}
        <div class="w-12 h-12 rounded-lg bg-carrerwire-green-light flex items-center justify-center text-white font-bold text-xl">
            I
        </div>
        
        {{-- Дугмад --}}
        <div class="flex flex-col space-y-2 mt-4">
             <button class="px-4 py-1 text-sm font-semibold rounded-md text-white bg-carrerwire-orange hover:bg-carrerwire-orange-dark transition duration-150">
                Пријави се
            </button>
             <button class="px-4 py-1 text-sm font-semibold rounded-md border border-gray-400 text-gray-700 hover:bg-gray-100 transition duration-150">
                Сачувај
            </button>
        </div>
    </div>
    
</div>