<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Портфолио - Aura Digital</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-text">

  <x-header />

  <main>
    {{-- Херо секција за портфолио --}}
    <x-portfolio-hero />

    {{-- Детаљан приказ пројеката --}}
    <x-portfolio-projects />

    {{-- Позив на акцију (већ постоји) --}}
    <x-cta-section />
  </main>

  <x-footer />

</body>
</html>
