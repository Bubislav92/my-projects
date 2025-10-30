<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>LuxuryCarSalon - The World's Finest Automotive Collection</title>

        {{-- ----------------------------------------------------- --}}
        {{-- 1. ОСНОВНИ SEO ТАГОВИ --}}
        {{-- ----------------------------------------------------- --}}
        
        <meta name="description" content="Explore LuxuryCarSalon's unrivaled collection of exclusive, high-performance, and luxury automobiles. We offer bespoke services, financing, and global car sourcing.">
        <meta name="keywords" content="Luxury cars, exotic cars, high-performance, supercars, luxury auto salon, bespoke financing, car sourcing, exclusive inventory, high-end vehicles">
        <meta name="author" content="Digitaly Tycoon">
        {{-- Информише претраживаче како да индексирају страницу --}}
        <meta name="robots" content="index, follow"> 
        {{-- Канонички УРЛ, корисно за избегавање дупликата --}}
        <link rel="canonical" href="https://www.luxurycarsalon.com/"> 
        {{-- Боја теме за мобилне претраживаче --}}
        <meta name="theme-color" content="#212121"> 

        {{-- ----------------------------------------------------- --}}
        {{-- 2. OPEN GRAPH ТАГОВИ (За Facebook, LinkedIn, Viber, итд.) --}}
        {{-- ----------------------------------------------------- --}}
        
        <meta property="og:title" content="LuxuryCarSalon | Unrivaled Power and Elegance">
        <meta property="og:description" content="Discover the pinnacle of automotive excellence. Your journey to luxury starts here.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://www.luxurycarsalon.com/">
        {{-- Обавезно замените ове URL-ове стварним сликама --}}
        <meta property="og:image" content="https://www.luxurycarsalon.com/images/og-luxury-car-1200x630.jpg"> 
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="LuxuryCarSalon">
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

        {{-- ----------------------------------------------------- --}}
        {{-- 3. TWITTER CARD ТАГОВИ (За X) --}}
        {{-- ----------------------------------------------------- --}}
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@LuxuryCarSalon"> {{-- Twitter налог --}}
        <meta name="twitter:creator" content="@DigitalyTycoon"> {{-- Твој налог --}}
        <meta name="twitter:title" content="LuxuryCarSalon | The World's Most Exclusive Cars">
        <meta name="twitter:description" content="Experience absolute discretion and unparalleled service when acquiring your next exotic vehicle.">
        <meta name="twitter:image" content="https://www.luxurycarsalon.com/images/twitter-card-car-800x418.jpg">

        {{-- ----------------------------------------------------- --}}
        {{-- 4. ИКОНИЦА (FAVICON & APPLE) --}}
        {{-- ----------------------------------------------------- --}}

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body>
        
        <x-home.header />
        
        <main>

            <x-home.hero />

            <x-home.featured-inventory />

            <x-home.about-philosophy />

            <x-home.services-overview />

            <x-home.cta-banner />

        </main>

        <x-home.footer />

    </body>
</html>