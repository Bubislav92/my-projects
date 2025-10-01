<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CareerWire | Повежите Пословање и Креативност</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white"> {{-- Позадина је бела --}}

    <x-header :user="Auth::user()" />

    {{-- Главни садржај са сивом позадином за визуелно одвајање --}}
    <main class="py-8 bg-gray-100 min-h-screen"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- ГЛАВНА МРЕЖА СА ТРИ КОЛОНЕ --}}
            <div class="grid grid-cols-1 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                
                {{-- КОЛОНА 1: ЛЕВА БОЧНА ТРАКА (1 колона) --}}
                <x-profile-sidebar :user="Auth::user()" class="lg:col-span-1" />
                
                {{-- КОЛОНА 2: ЦЕНТРАЛНИ САДРЖАЈ / ФИД (2-3 колоне) --}}
                <div class="lg:col-span-3 xl:col-span-3 space-y-4">
                    
                    <x-post-form :user="Auth::user()" />
                    
                    {{-- Објаве у фиду --}}
                    <x-post-card />
                    <x-post-card />
                    
                </div>
                
                {{-- КОЛОНА 3: ДЕСНА БОЧНА ТРАКА (1 колона) --}}
                <x-right-sidebar-suggestions />
                
            </div>
            
        </div>
    </main>

    <x-footer />

</body>
</html>