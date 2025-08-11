<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Unsuccessful</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="max-w-xl w-full bg-white dark:bg-gray-800 shadow-xl rounded-lg border border-gray-300 dark:border-gray-700 overflow-hidden">
            <div class="p-6 sm:p-8 border-b border-gray-200 dark:border-gray-700">
                <div class="text-center">
                    
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4">Payment Unsuccessful!</h1>
                    
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                        It looks like your payment was cancelled or failed to process.<br>
                        Please try again or contact support if you continue to experience issues.
                    </p>
                    
                    <a href="{{ url('/') }}"
                       class="inline-flex items-center px-6 py-3 border border-indigo-500 text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
