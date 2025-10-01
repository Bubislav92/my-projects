<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Luxury Jewels | Timeless Elegance in Handcrafted Jewelry</title>
    <meta name="description" content="Discover handcrafted luxury jewelry. Explore our exclusive collections of rings, necklaces, and bespoke pieces. Quality and elegance since 1990.">
    <meta name="keywords" content="luxury jewelry, bespoke jewelry, gold rings, diamond necklaces, elegant jewelry, fine craftsmanship">
    <meta name="author" content="Luxury Jewels">

    <link rel="canonical" href="[YOUR_WEBSITE_URL]">

    <meta property="og:title" content="Luxury Jewels | Timeless Elegance in Handcrafted Jewelry">
    <meta property="og:description" content="Discover handcrafted luxury jewelry. Explore our exclusive collections of rings, necklaces, and bespoke pieces.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="[YOUR_WEBSITE_URL]">
    <meta property="og:image" content="[URL_TO_PREVIEW_IMAGE]">
    <meta property="og:site_name" content="Luxury Jewels">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LuxuryJewelsBrand">
    <meta name="twitter:creator" content="@LuxuryJewelsBrand">
    <meta name="twitter:title" content="Luxury Jewels | Timeless Elegance">
    <meta name="twitter:description" content="Handcrafted luxury jewelry. Explore rings, necklaces, and bespoke pieces.">
    <meta name="twitter:image" content="[URL_TO_PREVIEW_IMAGE]">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="font-body antialiased text-dark-slate bg-cream-base">

    {{-- Header Component --}}
    <x-header /> 

    <main>
        {{-- Hero Section Component --}}
        <x-hero />

        {{-- Values Section Component --}}
        <x-values />

        {{-- Featured-Collection Component --}}
        <x-featured-collection />

        {{-- Cratfsmanship Component --}}
        <x-craftsmanship />

        {{-- Primer: @include('partials.bestsellers') --}}
        
    </main>

    {{-- Footer Component --}}
    <x-footer />
</body>
</html>

