<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DigitalAura</title>

        <meta name="description" content="Digital Aura: Pioneers in social media marketing strategy, content creation, and paid media campaigns. Unleash your brand's digital potential.">
        <meta name="keywords" content="social media marketing, digital marketing, content creation, paid media, instagram strategy, tiktok marketing, laravel tailwind project">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Digital Aura - Social Media Marketing Experts">
        <meta property="og:description" content="We craft compelling social media strategies that elevate your brand and drive measurable results.">
        {{-- Zamenite 'URL_TO_YOUR_IMAGE' sa stvarnom putanjom do slike (npr. logo ili hero slika) --}}
        <meta property="og:image" content="{{ asset('images/digital-aura-share.jpg') }}"> 
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="Digital Aura - Social Media Marketing Experts">
        <meta name="twitter:description" content="Unleash Your Digital Aura on Social Media. Strategy, Content & Paid Media.">
        {{-- Zamenite 'URL_TO_YOUR_IMAGE' sa stvarnom putanjom do slike --}}
        <meta name="twitter:image" content="{{ asset('images/digital-aura-share.jpg') }}">
        
        <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <!-- Fonts -->
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

            <x-home.portfolio />

            <x-home.testimonials />

            <x-home.cta />

        </main>

        <x-home.footer />

    </body>
</html>

