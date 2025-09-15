<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Store | Creative Digital Products for Your Projects</title>
    
    {{-- SEO Meta Tags --}}
    <meta name="description" content="Explore and buy high-quality digital products for creative professionals. Our collection includes UI kits, fonts, icons, templates, and more. Instant download and top-notch quality guaranteed.">
    <meta name="keywords" content="digital products, digital assets, UI kits, fonts, icons, templates, creative, design, download, web design, graphic design">
    <meta name="author" content="Store Name">
    
    {{-- Open Graph Meta Tags (for social media sharing) --}}
    <meta property="og:title" content="Store Name | Creative Digital Products">
    <meta property="og:description" content="Explore and buy high-quality digital products for creative professionals. Our collection includes UI kits, fonts, icons, templates, and more.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.yourstorename.com/">
    <meta property="og:image" content="https://www.yourstorename.com/images/og-image.jpg"> {{-- Replace with your image --}}
    
    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Store Name | Creative Digital Products">
    <meta name="twitter:description" content="Explore and buy high-quality digital products for creative professionals. Our collection includes UI kits, fonts, icons, templates, and more.">
    <meta name="twitter:image" content="https://www.yourstorename.com/images/twitter-image.jpg"> {{-- Replace with your image --}}

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/mobile-nav.js'])

</head>
<body class="bg-surface-light font-sans antialiased">

    {{-- Header Component --}}
    <x-header />

    <main>

        {{-- Page Header Component --}}
        <x-page-header />

        {{-- Product Filters Component --}}
        <x-product-filters />

        {{-- Product List Component --}}
        <x-product-list />

        {{-- Pagination Component --}}
        <x-pagination />

    </main>

    {{-- Footer Component --}}
    <x-footer />

    
</body>
</html>