<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- 1. Кључни SEO Мета Тагови --}}
        <title>TimberCraft | Custom Cabinetry & Bespoke Wood Furniture</title>

        <meta name="description" content="TimberCraft offers premium, custom-built wood furniture, bespoke cabinetry, and architectural millwork. Quality craftsmanship for every home and business.">
        <meta name="keywords" content="woodworking, custom furniture, bespoke cabinets, cabinetry, millwork, carpenter, woodcraft, TimberCraft, luxury furniture, Serbia, Belgrade">
        <link rel="canonical" href="{{ url('/') }}">
        
        {{-- 2. Open Graph / Facebook / LinkedIn Мета Тагови --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:title" content="TimberCraft | Premium Custom Woodworking Services">
        <meta property="og:description" content="Crafting timeless pieces from the finest wood. Get a quote for your custom furniture or cabinetry project today.">
        {{-- Обавезно замените ову путању стварном сликом (1200x630px је идеалан размер) --}}
        <meta property="og:image" content="{{ asset('images/og-image-timbercraft.jpg') }}">
        <meta property="og:site_name" content="TimberCraft">
        <meta property="og:locale" content="en_US"> {{-- Подесите на српски ако је примарни језик --}}
        
        {{-- 3. Twitter Card Мета Тагови --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url('/') }}">
        <meta name="twitter:title" content="TimberCraft | Custom Woodwork & Architectural Millwork">
        <meta name="twitter:description" content="Your vision, built solid. Explore our portfolio of custom-built cabinets and bespoke wood pieces.">
        <meta name="twitter:image" content="{{ asset('images/og-image-timbercraft.jpg') }}">
        
        {{-- 4. Favicon/Икона за претраживач --}}
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- AOS Library (за анимације) --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body>
        
        <x-home.header />

        <main>
            {{-- Додао сам Hero секцију на почетак --}}
            <x-home.hero /> 

            <x-home.services />
            
            <x-home.values />
            
            <x-home.projects />
            
            <x-home.cta />

        </main>

        <x-home.footer />

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init({
            duration: 800,
            once: true,
        });
        </script>

    </body>
</html>