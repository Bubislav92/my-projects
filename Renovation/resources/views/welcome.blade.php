<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Renova - Експерти за реновирање станова и кућа</title>
    <meta name="description" content="Професионалне услуге реновирања станова и кућа. Погледајте наше пројекте и затражите бесплатну понуду.">
    <meta name="keywords" content="реновирање, реновација, станова, кућа, дизајн, ентеријер, Београд, Србија">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body class="antialiased">

    <x-header />

    <x-hero />

    <x-services />

    <x-portfolio />

    <x-cta />

    <x-footer />

</body>
</html>
