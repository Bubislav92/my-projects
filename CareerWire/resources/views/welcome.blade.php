<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerWire | Повежите Пословање и Креативност</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">

    {{-- 1. СЕКЦИЈА: ХЕДЕР (Навигација за госте) --}}
    <x-welcome-header />

    <main>
        
        {{-- 2. СЕКЦИЈА: ХЕРО СЕКЦИЈА --}}
        <section class="py-20 lg:py-32 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <x-hero-section /> 
            </div>
        </section>
        
        {{-- 3. СЕКЦИЈА: ПРИКАЗ ФУНКЦИОНАЛНОСТИ --}}
        <section class="py-20 lg:py-32">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <x-feature-showcase />
            </div>
        </section>

        {{-- 4. СЕКЦИЈА: ЦТА БАНЕР (Последњи позив на акцију) --}}
        <section class="py-20 bg-carrerwire-green-dark text-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <x-cta-banner />
            </div>
        </section>

    </main>

    <x-footer />

</body>
</html>