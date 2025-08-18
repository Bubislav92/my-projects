<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Canceled - Vesna's Web Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .container-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 120px);
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container-center">
        <div class="bg-white p-8 rounded-xl shadow-md max-w-lg w-full">
            <h1 class="text-4xl font-bold text-orange-500 mb-4">{{ __('paypal_translate.payment_canceled') }}</h1>
            <p class="text-lg text-gray-700 mb-6">{{ $message ?? 'Your payment has been canceled.' }}</p>
            
            @if(isset($order_id))
                <p class="text-md text-gray-600 mb-6">{{ __('paypal_translate.order_id') }} <strong class="text-dark-gray">#{{ $order_id }}</strong></p>
            @endif

            <a href="{{ route('checkout.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 transition duration-300 ease-in-out">
                {{ __('paypal_translate.return_to_checkout') }}
            </a>
            <a href="{{ route('welcome') }}" class="inline-block mt-4 text-blue-600 hover:underline">
                {{ __('paypal_translate.return_to_home') }}
            </a>
        </div>
    </main>

    <x-footer />
</body>
</html>