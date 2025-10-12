<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Standardni SEO Meta Tagovi --}}
    <meta name="description" content="**DigitalyTycoon nudi vrhunske usluge web razvoja, izrade sajtova, e-commerce rešenja i digitalnog marketinga. Pretvorite svoju ideju u moćno online prisustvo.**">
    <meta name="keywords" content="web razvoj, izrada sajtova, e-commerce, digitalni marketing, frontend, backend, prilagođena rešenja, DigitalyTycoon">
    <link rel="canonical" href="**https://www.digitalytycoon.com/**"> {{-- Zameniti sa stvarnim URL-om vaše glavne stranice --}}
    <meta name="author" content="DigitalyTycoon">

    {{-- Open Graph (OG) Meta Tagovi - Za Facebook, LinkedIn, i većinu drugih mreža --}}
    <meta property="og:title" content="DigitalyTycoon - Vrhunski web razvoj i digitalna rešenja">
    <meta property="og:description" content="**DigitalyTycoon nudi vrhunske usluge web razvoja, izrade sajtova, e-commerce rešenja i digitalnog marketinga. Pretvorite svoju ideju u moćno online prisustvo.**">
    <meta property="og:url" content="**https://www.digitalytycoon.com/**"> {{-- Zameniti sa stvarnim URL-om --}}
    <meta property="og:site_name" content="DigitalyTycoon">
    <meta property="og:type" content="website"> {{-- Ako je ovo blog post, koristite "article" --}}
    <meta property="og:image" content="**https://www.digitalytycoon.com/images/share-slika.jpg**"> {{-- Zameniti sa URL-om slike (preporučeno 1200x630 piksela) --}}
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="sr_RS"> {{-- Ili sr_SR, en_US, itd. --}}

    {{-- Twitter Card Meta Tagovi - Specijalno za X (Twitter) --}}
    <meta name="twitter:card" content="summary_large_image"> {{-- Preporučuje se 'summary_large_image' --}}
    <meta name="twitter:site" content="@**DigitalyTycoon**"> {{-- Zameniti sa vašim Twitter handle-om (sa @) --}}
    <meta name="twitter:creator" content="@**DigitalyTycoon**"> {{-- Ako je isti kao site --}}
    <meta name="twitter:title" content="DigitalyTycoon - Vrhunski web razvoj">
    <meta name="twitter:description" content="**Pretvorite svoju ideju u moćno online prisustvo uz DigitalyTycoon. Web razvoj, e-commerce i digitalni marketing.**">
    <meta name="twitter:image" content="**https://www.digitalytycoon.com/images/share-slika.jpg**"> {{-- URL iste OG slike --}}

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
