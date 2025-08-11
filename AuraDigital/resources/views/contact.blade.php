<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контакт - Aura Digital</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-text">

  <x-header />

  <main>
    {{-- Херо секција за "Контакт" --}}
    <x-contact-hero />

    {{-- Главна секција са формом и детаљима --}}
    <x-contact-page-section />

    {{-- Подножје --}}
  </main>

  <x-footer />

</body>
</html>
