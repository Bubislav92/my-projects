<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Мој Мулти Вендор</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')

        {{-- Додајте овде custom CSS за анимације, ако нисте све у tailwind.config.js --}}
        <style>
            /* Custom keyframes for animations (if not defined in tailwind.config.js) */
            @keyframes fade-in-up {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes fade-in-left {
                from { opacity: 0; transform: translateX(-20px); }
                to { opacity: 1; transform: translateX(0); }
            }
            @keyframes fade-in-right {
                from { opacity: 0; transform: translateX(20px); }
                to { opacity: 1; transform: translateX(0); }
            }

            /* Apply animations */
            .animate-fade-in-up {
                animation: fade-in-up 0.6s ease-out forwards;
            }
            .animate-fade-in-left {
                animation: fade-in-left 0.6s ease-out forwards;
            }
            .animate-fade-in-right {
                animation: fade-in-right 0.6s ease-out forwards;
            }
        </style>
    </head>
    <body class="antialiased font-sans bg-gray-100">

        <x-header />

        <main>
            <x-hero-section />

            <x-categories-section />

            <x-featured-products />

            <x-cta-section />

            <x-testimonials-section />
        </main>

        <x-footer />

        @vite('resources/js/app.js') {{-- За JS ако имате --}}
    </body>
</html>
