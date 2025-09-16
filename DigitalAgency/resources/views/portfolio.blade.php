<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Agency - Modern Solutions for Your Business</title>
    
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-bg-main">

    {{-- Header Component --}}
    <x-header />

    <main>
        
        <x-portfolio-hero />

        <x-portfolio-grid />
        
        <x-portfolio-case-study />

    </main>

    {{-- Footer Component --}}
    <x-footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1000,
            easing: 'ease-in-out'
        });
    </script>
    
</body>
</html>