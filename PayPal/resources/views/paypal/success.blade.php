<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- ❗ Важно за Tailwind --}}
</head>
<body class="h-full text-gray-800 dark:text-gray-100">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg border border-gray-200 dark:border-gray-700 p-8">
                <div class="text-center">
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4">
                        Payment Successfully Completed!
                    </h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                        Thank you, 
                        <span class="font-semibold text-indigo-600 dark:text-indigo-400">{{ $payer_name }}</span>, 
                        for your purchase. Your payment of 
                        <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($amount, 2) }} {{ $currency }}</span> 
                        has been successfully processed.
                        A confirmation and invoice have been sent to your email.
                    </p>
                    <a href="{{ url('/') }}"
                       class="inline-flex items-center px-6 py-3 border border-indigo-500 text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        ← Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
