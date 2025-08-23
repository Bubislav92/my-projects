<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalyTycoon - Врхунски веб развој</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-primary-dark text-text-light antialiased">

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
            once: true, // Анимације се покрећу само једном
            duration: 1000, // Трајање анимације
        });
    </script>
</body>
</html>
