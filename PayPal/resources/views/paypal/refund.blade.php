<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Request Sent</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Ako već koristiš Vite -->
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-xl w-full bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6 sm:p-8 text-center border border-gray-300 dark:border-gray-700">

        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4">
            Refund Request Successfully Sent!
        </h1>

        @if(isset($message))
            <div class="bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-100 px-4 py-3 rounded-md mb-6 text-base border border-green-400 dark:border-green-600">
                {{ $message }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 dark:bg-red-700 text-red-800 dark:text-red-100 px-4 py-3 rounded-md mb-6 text-base border border-red-400 dark:border-red-600">
                <p class="font-bold mb-2">There were some issues with your request:</p>
                <ul class="list-disc list-inside text-left mx-auto max-w-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ url('/') }}"
           class="inline-flex items-center px-6 py-3 border border-indigo-500 text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-4">
            Back to Homepage
        </a>

    </div>

</body>
</html>
