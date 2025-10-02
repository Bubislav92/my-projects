<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Подешавања (Dashboard)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- ГЛАВНИ КОНТЕЈНЕР СА ДВЕ КОЛОНЕ --}}
            <div class="flex flex-col md:flex-row gap-6">
                
                {{-- ЛЕВА КОЛОНА: SIDEBAR --}}
                <div class="w-full md:w-1/4 bg-white overflow-hidden shadow-sm sm:rounded-lg h-fit">
                    <x-dashboard.profile-sidebar />
                </div>

                {{-- ДЕСНА КОЛОНА: САДРЖАЈ --}}
                <div class="w-full md:w-3/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        {{-- 
                            ОВДЕ ЋЕМО УКЉУЧИВАТИ РАЗЛИЧИТЕ ПАРЦИЈАЛНЕ ФОРМЕ.
                            Пошто је ово тренутно рута 'dashboard', укључићемо основну форму за уређивање профила.
                            Остали делови (Искуство, Лозинка) ће бити укључени кроз различите руте у Sidebaru.
                        --}}
                        
                        {{-- Breeze default: Уређивање основних информација --}}
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                        
                        {{-- Можемо додати још садржаја овде ако је потребно --}}
                        
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</x-app-layout>