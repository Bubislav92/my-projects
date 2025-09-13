<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Axel Foly</title>
    <meta name="description" content="Official photography portfolio of [Your Name]. Capturing moments in nature, portraits, weddings, and events.">
    <meta name="keywords" content="photography, photographer, wedding, portraits, nature, art, portfolio, [Your City], [Your Name]">
    <meta name="author" content="[Your Name]">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.yourwebsite.com/">
    <meta property="og:title" content="Photography Portfolio - Your Name">
    <meta property="og:description" content="Official photography portfolio of [Your Name]. Capturing moments in nature, portraits, weddings, and events.">
    <meta property="og:image" content="https://www.yourwebsite.com/images/og-image.jpg">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.yourwebsite.com/">
    <meta property="twitter:title" content="Photography Portfolio - Your Name">
    <meta property="twitter:description" content="Official photography portfolio of [Your Name]. Capturing moments in nature, portraits, weddings, and events.">
    <meta property="twitter:image" content="https://www.yourwebsite.com/images/og-image.jpg">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/mobile-nav.js'])

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

    <x-header />

    <main>
        <x-hero />

        <x-about />

        <x-services />

        <x-portfolio />

        <x-testimonials />

        <x-cta />
    </main>

    <x-footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Only once per element
            delay: 150, // Animation delay in milliseconds
            duration: 800, // Animation duration in milliseconds
            easing: 'ease-in-out' // Animation easing
        });
    </script>

    
</body>
</html>