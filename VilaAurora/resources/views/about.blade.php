<!DOCTYPE html>
<html lang="sr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Наслов странице --}}
    <title>Вила „Аурора” | Луксузан Смештај за Преноћиште у Београду</title>

    {{-- Главни SEO Мета Тагови --}}
    <meta name="description" content="Резервишите Вилу „Аурора” – ваш луксузни дом за преноћиште. Ексклузиван смештај, приватна башта и врхунска услуга у Београду.">
    <meta name="keywords" content="вила за преноћиште, луксузна вила, Вила Аурора, смештај Београд, изнајмљивање виле, луксузно преноћиште, Београд вила">
    <meta name="author" content="Вила Аурора">
    <link rel="canonical" href="https://www.vila-aurora.rs/"> {{-- Замените са стварним доменом --}}

    {{-- Open Graph (OG) Мета Тагови - За Фејсбук и друге друштвене мреже --}}
    <meta property="og:title" content="Вила „Аурора” | Луксузан Смештај за Преноћиште">
    <meta property="og:description" content="Откријте Вилу „Аурора”: Елегантан и приватан смештај са 5 звездица за ваш боравак у Београду. Резервишите одмах!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.vila-aurora.rs/">
    <meta property="og:image" content="https://www.vila-aurora.rs/img/social-share-image.jpg"> {{-- Слика мин. 1200x630px --}}
    <meta property="og:locale" content="sr_RS">

    {{-- Twitter Card Мета Тагови - За Твитер/X --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@VilaAuroraBG"> {{-- Замените стварним Twitter хендлом --}}
    <meta name="twitter:creator" content="@VilaAuroraBG">
    <meta name="twitter:title" content="Луксузна Вила „Аурора”">
    <meta name="twitter:description" content="Резервишите своју оазу мира. Премиум вила за изнајмљивање у Београду.">
    <meta name="twitter:image" content="https://www.vila-aurora.rs/img/social-share-image.jpg">

    {{-- Laravel и Tailwind CSS укључивање (претпостављамо да користите Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">

    <x-header />

    <main>
        
        <x-about.hero />

        <x-about.story />

        <x-about.key-values />

        <x-about.cta />

    </main>

    <x-footer />
    
</body>
</html>

{{-- 
НАПОМЕНА:
Да би овај код радио, морате имати креиране следеће blade фајлове:
1. components/header.blade.php
2. sections/hero.blade.php
3. sections/o-nama.blade.php
4. sections/smestaj.blade.php
5. sections/galerija.blade.php
6. components/footer.blade.php
--}}