<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Name - Experience Culinary Excellence</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="A modern and elegant restaurant offering a unique culinary journey. Explore our menu, gallery, and make a reservation online.">
    <meta name="keywords" content="restaurant, fine dining, gastronomy, chef, cuisine, menu, reservations, food, gallery">
    <meta name="author" content="Restaurant Name">

    {{-- Open Graph Meta Tags (for social media sharing) --}}
    <meta property="og:title" content="Restaurant Name | Modern and Elegant Dining">
    <meta property="og:description" content="Experience culinary excellence with a perfect blend of tradition and modern gastronomy.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.yourrestaurant.com/">
    <meta property="og:image" content="https://www.yourrestaurant.com/images/og-image.jpg"> {{-- Replace with your image --}}

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Restaurant Name | Modern and Elegant Dining">
    <meta name="twitter:description" content="Experience culinary excellence with a perfect blend of tradition and modern gastronomy.">
    <meta name="twitter:image" content="https://www.yourrestaurant.com/images/twitter-image.jpg"> {{-- Replace with your image --}}

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    {{-- Custom Animations (if needed, but we'll stick to Tailwind) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-secondary text-primary font-sans antialiased">

    {{-- Header Component --}}
    <x-header />

    <main>
        
        <x-reservations-form />

    </main>

    {{-- Footer Component --}}
    <x-footer />
    
</body>
</html>