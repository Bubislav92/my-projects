<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CareerWire | Поруке</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white"> {{-- Позадина је бела --}}

    <x-header :user="Auth::user()" />

    {{-- Главни садржај са сивом позадином за визуелно одвајање --}}
    <main class="py-8 bg-gray-100 min-h-screen"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- ГЛАВНИ КОНТЕЈНЕР ЗА ПОРУКЕ --}}
            <div class="bg-white rounded-lg shadow-lg border border-gray-200 h-[80vh] min-h-[600px] overflow-hidden flex">
                
                {{-- КОЛОНА 1: ЛИСТА РАЗГОВОРА --}}
                <div class="w-full md:w-3/12 border-r border-gray-200 flex-shrink-0 hidden sm:block">
                    <x-conversation-list-sidebar />
                </div>
                
                {{-- КОЛОНА 2: ПРОЗОР ЗА ЋАСКАЊЕ --}}
                <div class="w-full md:w-9/12 relative">
                    <x-chat-window name="Радован Илић" headline="UX/UI Дизајнер">
                        
                        {{-- Сваки <x-message-card /> ће се убацивати у овај слот --}}
                        
                        <div class="text-center text-gray-500 text-sm mb-6">Данас 10:00</div>
                        
                        {{-- ПРИМЉЕНА порука --}}
                        <x-message-card 
                            :isSender="false" 
                            time="10:05" 
                            content="Здраво! Хтео сам да те питам да ли си почео да радиш на оној новој функцији коју смо договорили јуче?" 
                        />
                        
                        {{-- ПОСЛАТА порука --}}
                        <x-message-card 
                            :isSender="true" 
                            time="10:07" 
                            content="Здраво! Јесам, завршио сам дефинисање база података. Сада прелазим на бекенд логику. Биће готово до краја дана." 
                        />
                        
                         {{-- ПРИМЉЕНА порука --}}
                        <x-message-card 
                            :isSender="false" 
                            time="10:15" 
                            content="Супер! Хвала на брзом одговору. Јави ми ако нешто затреба." 
                        />

                    </x-chat-window>
                </div>
                
            </div>
            
        </div>
    </main>

    <x-footer />

</body>
</html>