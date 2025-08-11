<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header /> {{-- Uključujemo header --}}

    <main class="container mx-auto px-4 py-8 md:py-12 flex justify-center items-center min-h-[calc(100vh-160px)]"> {{-- min-h da centrira formu --}}
        <div class="w-full max-w-md bg-white p-6 md:p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-bold text-dark-gray mb-6 text-center">Create a new account</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Name</label>
                    <input id="name"
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           autocomplete="name" />
                </div>

                <div>
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input id="email"
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="username" />
                </div>

                <div>
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <input id="password"
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                           type="password"
                           name="password"
                           required
                           autocomplete="new-password" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
                    <input id="password_confirmation"
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-primary-green hover:underline font-semibold transition duration-200" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </main>

    <x-footer /> {{-- Uključujemo footer --}}
</body>
</html>