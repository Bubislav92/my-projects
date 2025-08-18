<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>Contact Us - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        {{-- Главни наслов странице --}}
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('contact_us.contact_us') }}</h1>

        <div class="bg-white p-8 rounded-xl shadow-md max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- Контакт информације --}}
            <div>
                <h2 class="text-2xl font-semibold text-dark-gray mb-4">{{ __('contact_us.get_in_touch') }}</h2> {{-- Stupite u Kontakt --}}
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ __('contact_us.get_in_touch_text') }}
                </p>

                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fa-solid fa-location-dot text-primary-green text-xl mr-3"></i>
                        <p class="text-gray-700">123 E-commerce Street, Webville, Online Country</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-phone text-primary-green text-xl mr-3"></i>
                        <p class="text-gray-700"><a href="tel:+1234567890" class="hover:text-primary-green transition duration-200">+1 (234) 567-890</a></p>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-envelope text-primary-green text-xl mr-3"></i>
                        <p class="text-gray-700"><a href="mailto:info@vesnaswebstore.com" class="hover:text-primary-green transition duration-200">info@vesnaswebstore.com</a></p>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-clock text-primary-green text-xl mr-3"></i>
                        <p class="text-gray-700">Monday - Friday: 9:00 AM - 5:00 PM (CET)</p>
                    </div>
                </div>

                {{-- Opciono: Mapa --}}
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-dark-gray mb-3">{{ __('contact_us.our_location') }}</h3> {{-- Naša Lokacija --}}
                    <div class="bg-gray-200 h-64 rounded-lg overflow-hidden flex items-center justify-center text-gray-500">
                        {{-- Placeholder za mapu, kasnije možete ugraditi Google Maps ili slično --}}
                        <p>Map Placeholder</p>
                    </div>
                </div>
            </div>

            {{-- Контакт форма --}}
            <div>
                <h2 class="text-2xl font-semibold text-dark-gray mb-4">{{ __('contact_us.send_us_a_message') }}</h2> {{-- Pošaljite nam Poruku --}}
                <form action="#" method="POST" class="space-y-4">
                    {{-- @csrf --}} {{-- Laravel CSRF token za sigurnost (dodati kada se implementira slanje forme) --}}

                    <div>
                        <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('contact_us.your_name') }}</label> {{-- Vaše Ime --}}
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="John Doe">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('contact_us.your_email') }}</label> {{-- Vaš Email --}}
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="john.doe@example.com">
                    </div>

                    <div>
                        <label for="subject" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('contact_us.subject_optional') }}</label> {{-- Tema (Opciono) --}}
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="{{ __('contact_us.regarding_order') }}">
                    </div>

                    <div>
                        <label for="message" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('contact_us.your_message') }}</label> {{-- Vaša Poruka --}}
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="{{ __('contact_us.type_your_message') }}"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                        {{ __('contact_us.send_message') }}
                    </button>
                </form>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>