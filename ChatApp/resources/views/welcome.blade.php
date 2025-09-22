<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-background-light text-text-dark">
    
    {{-- Header Component --}}
    <x-header />

    <main>
        {{-- Hero Section Component --}}
        <x-hero />

        <x-features />
        <x-testimonials />
        <x-cta />

    </main>

    {{-- Footer Component --}}
    <x-footer />

</body>
</html>