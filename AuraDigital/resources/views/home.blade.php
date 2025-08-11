<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aura Digital - Дигитална агенција</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-text">

  {{-- Хедер --}}
  <x-header />

  <main>
    {{-- Херо секција --}}
    <x-hero-section />

    {{-- Секција са услугама --}}
    <x-services-section />

    {{-- Секција са портфолиом --}}
    <x-portfolio-section />

    {{-- О нама секција --}}
    <x-about-us-section />

    {{-- Позив на акцију --}}
    <x-cta-section />

    {{-- Контакт секција --}}
    <x-contact-section />
  </main>

  {{-- Футер --}}
  <x-footer />

</body>
</html>
