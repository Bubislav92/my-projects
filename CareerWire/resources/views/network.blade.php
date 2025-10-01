<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CareerWire | Мрежа</title>

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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                
                {{-- КОЛОНА 1: ЛЕВА БОЧНА ТРАКА ЗА МРЕЖУ (1/4 ширине) --}}
                <div class="md:col-span-1">
                    <div class="sticky top-20">
                         <x-network-sidebar />
                    </div>
                </div>
                
                {{-- КОЛОНА 2: ГЛАВНИ САДРЖАЈ (3/4 ширине) --}}
                <div class="md:col-span-3 space-y-8">
                    
                    {{-- СЕКЦИЈА 1: ЗАХТЕВИ ЗА ПОВЕЗИВАЊЕ --}}
                    <section>
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">Захтеви за повезивање (3)</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            
                            {{-- Примери примљених захтева --}}
                            <x-connection-request-card :user="['name' => 'Петар Перић', 'headline' => 'UX/UI Дизајнер']" />
                            <x-connection-request-card :user="['name' => 'Марија Јовановић', 'headline' => 'Професор на ФТН']" />
                            <x-connection-request-card :user="['name' => 'Иван Николић', 'headline' => 'Власник старт-апа']" />
                        
                        </div>
                    </section>
                    
                    {{-- СЕКЦИЈА 2: ЉУДИ КОЈЕ МОЖДА ЗНАТЕ --}}
                    <section>
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">Људи које можда знате</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            
                            {{-- Примери предлога --}}
                            <x-suggestion-card :user="['name' => 'Мила Милановић', 'headline' => 'Маркетинг Менаџер']" />
                            <x-suggestion-card :user="['name' => 'Драган Антић', 'headline' => 'Главни рачуновођа']" />
                            <x-suggestion-card :user="['name' => 'Ана Ристић', 'headline' => 'Дата Аналитичар']" />
                            <x-suggestion-card :user="['name' => 'Зоран Костић', 'headline' => 'Фронтенд Девелопер']" />
                            <x-suggestion-card :user="['name' => 'Сара Илић', 'headline' => 'HR Специјалиста']" />
                        
                        </div>
                        <div class="mt-6 text-center">
                            <button class="px-6 py-2 border border-gray-400 text-gray-700 font-semibold rounded-full hover:bg-gray-100 transition duration-150">
                                Прикажи још
                            </button>
                        </div>
                    </section>
                    
                </div>
                
            </div>
            
        </div>
    </main>

    <x-footer />

</body>
</html>