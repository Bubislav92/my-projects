<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stripe Payment Success - Vesna's Web Store</title>
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
            <h1 class="text-4xl font-bold text-green-600 mb-4">Stripe Payment Successful!</h1>
            <p class="text-lg text-gray-700 mb-6">{{ $message ?? 'Your Stripe payment was successful and your order has been confirmed!' }}</p>
            
            @if(isset($order_id))
                <p class="text-md text-gray-600 mb-2">Order ID: <strong class="text-dark-gray">#{{ $order_id }}</strong></p>
            @endif
            @if(isset($transaction_id))
                <p class="text-md text-gray-600 mb-6">Transaction ID: <strong class="text-dark-gray">{{ $transaction_id }}</strong></p>
            @endif

            <a href="{{ route('welcome') }}" class="inline-block bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out">
                Continue Shopping
            </a>
        </div>
    </main>

    <x-footer />
</body>
</html>