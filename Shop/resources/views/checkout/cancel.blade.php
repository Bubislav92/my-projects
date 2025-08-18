<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>Payment Failed - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans flex flex-col min-h-screen">

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl p-8 max-w-md w-full text-center transform scale-95 animate-fade-in-up">
            <div class="flex flex-col items-center justify-center mb-6">
                <div class="bg-red-100 rounded-full p-4 mb-4">
                    <i class="fa-solid fa-times-circle text-red-500 text-6xl"></i> {{-- Иконица за грешку/отказ --}}
                </div>
                <h2 class="text-3xl font-bold text-dark-gray mb-3">{{ __('checkout_translate.payment_failed_cancelled') }}</h2> {{-- Плаћање неуспешно/отказано! --}}
                <p class="text-gray-700 text-lg">{{ __('checkout_translate.payment_error_try_again') }}</p> {{-- Нажалост, ваше плаћање није могло бити обрађено или је отказано. Молимо покушајте поново или контактирајте подршку. --}}
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('dashboard') }}" class="inline-block bg-light-gray text-dark-gray font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-dark-gray focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('checkout_translate.go_to_dashboard') }} {{-- Иди на контролну таблу --}}
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
                {{-- Можеш додати и дугме за покушај поново или контакт подршку --}}
                {{-- <a href="{{ route('checkout.index') }}" class="inline-block bg-primary-green text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300">
                    Try Again
                </a> --}}
            </div>
        </div>
    </main>

</body>
</html>