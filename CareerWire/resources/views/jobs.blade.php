<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CareerWire | Послови</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white"> {{-- Позадина је бела --}}

    <x-header :user="Auth::user()" />

    {{-- Главни садржај са сивом позадином за визуелно одвајање --}}
    <main class="py-8 bg-gray-100 min-h-screen"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- ГЛАВНА МРЕЖА: ДВЕ КОЛОНЕ --}}
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                
                {{-- КОЛОНА 1: ЛЕВА БОЧНА ТРАКА ЗА ФИЛТЕРЕ (1/4 ширине) --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-20 space-y-6">
                        
                        {{-- СЕКЦИЈА 1: ФИЛТЕРИ --}}
                        <x-jobs-sidebar-filters />
                        
                        {{-- Додатна секција: Сачувани послови --}}
                        <div class="hidden lg:block bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                            <h3 class="text-sm font-semibold text-gray-700">Сачувани послови</h3>
                            <a href="#" class="block mt-2 text-xs text-carrerwire-green hover:text-carrerwire-green-dark">Прегледајте листу</a>
                        </div>
                    </div>
                </div>
                
                {{-- КОЛОНА 2: ГЛАВНИ САДРЖАЈ И ЛИСТА ПОСЛОВА (3/4 ширине) --}}
                <div class="lg:col-span-3 space-y-6">
                    
                    {{-- СЕКЦИЈА 2: ТРАКА ЗА ПРЕТРАГУ --}}
                    <x-job-search-bar />
                    
                    <h1 class="text-2xl font-bold text-gray-800">Резултати претраге (256 послова)</h1>
                    
                    {{-- СЕКЦИЈА 3: ЛИСТА ПОСЛОВА --}}
                    <div class="space-y-4">
                        
                        {{-- Примери Картица Послова --}}
                        <x-job-card 
                            :job="[
                                'title' => 'Senior Backend Developer (PHP/Laravel)', 
                                'company' => 'GlobalTech', 
                                'location' => 'Београд (Хибридно)',
                                'type' => 'Пуно радно време'
                            ]"
                        />
                         <x-job-card 
                            :job="[
                                'title' => 'Junior Frontend Engineer (React/Vue)', 
                                'company' => 'Digital Agency X', 
                                'location' => 'Удаљено (Remote)',
                                'type' => 'Пуно радно време'
                            ]"
                        />
                         <x-job-card 
                            :job="[
                                'title' => 'Product Manager', 
                                'company' => 'StartUp Growth', 
                                'location' => 'Нови Сад',
                                'type' => 'Уговорни'
                            ]"
                        />
                        
                    </div>
                    
                    <div class="mt-6 text-center">
                        <button class="px-6 py-2 border border-gray-400 text-gray-700 font-semibold rounded-full hover:bg-gray-100 transition duration-150">
                            Учитај још
                        </button>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </main>

    <x-footer />

</body>
</html>