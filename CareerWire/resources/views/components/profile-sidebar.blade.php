@props(['user'])

{{-- Контејнер за леву бочну траку, видљив само на великим екранима --}}
<div class="hidden lg:block lg:col-span-1">
    <div class="sticky top-20 space-y-4"> {{-- Sticky трака прати скроловање --}}
        
        {{-- Картица 1: Мини Профил --}}
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            
            {{-- Врх Картице (Позадинска слика/боја) --}}
            <div class="h-16 bg-carrerwire-green-dark"></div>
            
            {{-- Аватар и Информације --}}
            <div class="flex flex-col items-center -mt-8 px-4 pb-4">
                
                {{-- Аватар (Замените са стварном логиком за слику) --}}
                <a href="#">
                    <div class="w-16 h-16 rounded-full border-4 border-white bg-gray-300 flex items-center justify-center text-xl text-gray-600 font-bold overflow-hidden transition duration-150 hover:border-carrerwire-orange">
                        @if(isset($user->profile_photo_url))
                            <img src="{{ $user->profile_photo_url }}" alt="Аватар" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </a>

                <a href="#" class="mt-2 text-lg font-semibold text-gray-800 hover:text-carrerwire-green-dark transition duration-150">
                    {{ $user->name }}
                </a>
                
                <p class="text-sm text-gray-500 text-center mt-1">
                    {{ $user->headline ?? 'Кликните да додате наслов' }}
                </p>
            </div>
            
            {{-- Статистика и Везе --}}
            <div class="border-t border-gray-200 py-3 px-4 hover:bg-gray-50 transition duration-150">
                <a href="#" class="flex justify-between text-sm text-gray-500">
                    <span>Везе у вашој мрежи</span>
                    <span class="font-medium text-carrerwire-orange hover:text-carrerwire-orange-dark">234</span>
                </a>
            </div>

            {{-- Брзи линк за Профил --}}
            <div class="border-t border-gray-200 py-3 px-4 hover:bg-gray-50 transition duration-150">
                 <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-gray-600 hover:text-carrerwire-green flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.941 3.31.82 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.941 1.543-.82 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.941-3.31-.82-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.941-1.543.82-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Подешавања & Приватност
                </a>
            </div>
            
        </div>
        
        {{-- Картица 2: Скорашње и Сачувано --}}
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 p-4">
            <h4 class="text-sm font-semibold text-gray-700 mb-2">Скорашње</h4>
            <ul class="space-y-1">
                <li class="flex items-center text-sm text-gray-600 hover:text-carrerwire-green transition duration-150">
                    <span class="mr-1 text-xs text-carrerwire-orange">#</span>
                    <a href="#">laravel-dev</a>
                </li>
                <li class="flex items-center text-sm text-gray-600 hover:text-carrerwire-green transition duration-150">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-5m-1.4-1.4a9 9 0 10-12.7 0" /></svg>
                    <a href="#">Програмерска група</a>
                </li>
            </ul>

            <div class="mt-4 pt-3 border-t border-gray-200">
                <a href="#" class="flex items-center text-sm font-semibold text-gray-700 hover:text-carrerwire-green transition duration-150">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                    Сачувани предмети
                </a>
            </div>
        </div>
        
    </div>
</div>