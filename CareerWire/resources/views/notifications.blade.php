<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CareerWire | Обавештења</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">

    <x-header :user="Auth::user()" />

    {{-- Главни садржај са сивом позадином --}}
    <main class="py-8 bg-gray-100 min-h-screen"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Ваша обавештења</h1>
            
            {{-- ГЛАВНА МРЕЖА: ДВЕ КОЛОНЕ --}}
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                
                {{-- КОЛОНА 1: ЛЕВА БОЧНА ТРАКА ЗА ФИЛТЕРЕ (1/4 ширине) --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-20">
                         <x-notification-sidebar-filters />
                    </div>
                </div>
                
                {{-- КОЛОНА 2: ЛИСТА ОБАВЕШТЕЊА (3/4 ширине) --}}
                <div class="lg:col-span-3 space-y-2">
                    
                    {{-- ПРИМЕРИ ОБАВЕШТЕЊА --}}
                    
                    {{-- 1. Непрочитано (Нова веза) --}}
                    <x-notification-item 
                        :isUnread="true" 
                        icon="user" 
                        time="Пре 5 мин" 
                        user="Ана Николић" 
                        action="је прихватила ваш захтев за повезивање."
                    />
                    
                    {{-- 2. Непрочитано (Лајк) --}}
                    <x-notification-item 
                        :isUnread="true" 
                        icon="like" 
                        time="Пре 1 сат" 
                        user="Марко Петровић" 
                        action="се свиђа ваша најновија објава: 'Најбоље праксе у Laravel-у...'"
                    />

                    {{-- 3. Прочитано (Коментар) --}}
                    <x-notification-item 
                        :isUnread="false" 
                        icon="comment" 
                        time="Јуче у 14:00" 
                        user="Драган Јовановић" 
                        action="је коментарисао вашу објаву: 'Слажем се, чист код је најважнији!'"
                    />
                    
                     {{-- 4. Прочитано (Праћење) --}}
                    <x-notification-item 
                        :isUnread="false" 
                        icon="user" 
                        time="Пре 3 дана" 
                        user="Tech Solutions doo" 
                        action="почео да прати вашу компанијску страницу."
                    />
                    
                    <div class="mt-6 text-center pt-4">
                        <button class="px-6 py-2 border border-gray-400 text-gray-700 font-semibold rounded-full hover:bg-gray-100 transition duration-150">
                            Учитај старија обавештења
                        </button>
                    </div>
                </div>
                
            </div>
            
        </div>
    </main>

    <x-footer />

</body>
</html>