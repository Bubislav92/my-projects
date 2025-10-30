<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- 1. ОСНОВНИ SEO МЕТА ТАГОВИ --}}
        <title>VoltStream Installations | Expert Home Electrical & Wiring Services</title>
        <meta name="description" content="VoltStream Installations offers safe, certified, and efficient residential electrical services, including panel upgrades, home wiring, and smart lighting solutions. Get a free quote today!">
        <meta name="keywords" content="electrical installation, home wiring, panel upgrade, electrician, smart lighting, residential electric, VoltStream">
        <link rel="canonical" href="{{ url()->current() }}"> {{-- Канонички УРЛ --}}
        
        {{-- 2. OPEN GRAPH ТАГОВИ (За Facebook, LinkedIn и друге мреже) --}}
        <meta property="og:title" content="VoltStream Installations | Expert Home Electrical Services">
        <meta property="og:description" content="Safe, certified, and efficient residential electrical solutions by VoltStream.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/voltstream-logo-share.png') }}"> {{-- Замените стварним путем до слике --}}
        <meta property="og:site_name" content="VoltStream Installations">

        {{-- 3. TWITTER CARD ТАГОВИ (За Twitter/X) --}}
        <meta name="twitter:card" content="summary_large_image"> {{-- Користимо велику слику --}}
        <meta name="twitter:site" content="@VoltStreamCo"> {{-- Замените стварним Twitter хендлом --}}
        <meta name="twitter:creator" content="@VoltStreamCo">
        <meta name="twitter:title" content="VoltStream Installations: Home Wiring Experts">
        <meta name="twitter:description" content="Safe, certified, and efficient residential electrical solutions by VoltStream.">
        <meta name="twitter:image" content="{{ asset('images/voltstream-logo-share.png') }}">

        {{-- 4. ФАВИКОН (Иконе за прегледач) --}}
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body>

        <x-home.header />
        
        <main>

            <x-home.hero />

            <x-home.services />

            <x-home.features />

            <x-home.cta />

        </main>

        <x-home.footer />

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
    </body>
</html>