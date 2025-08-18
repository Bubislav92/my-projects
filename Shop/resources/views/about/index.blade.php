<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>About Us - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('about_us.about_us') }}</h1> {{-- О нама --}}

        <div class="bg-white p-8 rounded-xl shadow-md max-w-4xl mx-auto">
            {{-- Уводни део --}}
            <section class="mb-10 text-center">
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    {{ __('about_us.welcome_message') }}
                </p>
                {{-- Додата слика "our-team.jpg" --}}
                <img src="{{ asset('images/about/our-team.jpg') }}" alt="Our Team at Vesna's Web Store" class="w-full h-80 object-cover rounded-lg shadow-md mb-6 mx-auto">
            </section>

            {{-- Наша прича / Мисија --}}
            <section class="mb-10">
                <h2 class="text-3xl font-semibold text-dark-gray mb-6 text-center">{{ __('about_us.story_mission_heading') }}</h2> {{-- Наша прича и Мисија --}}
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            {{ __('about_us.story_mission_text') }}
                        </p>
                        
                    </div>
                    <div>
                        {{-- Додата слика "about-store.jpg" --}}
                        <img src="{{ asset('images/about/about-store.jpg') }}" alt="Storefront" class="w-full h-64 object-cover rounded-lg shadow-md">
                    </div>
                </div>
            </section>

            {{-- Шта нас издваја? (Вредности) --}}
            <section class="mb-10">
                <h2 class="text-3xl font-semibold text-dark-gray mb-6 text-center">{{ __('about_us.what_sets_apart') }}</h2> {{-- Шта нас издваја? --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="bg-light-gray p-6 rounded-lg shadow-sm">
                        <i class="fa-solid fa-star text-primary-green text-3xl mb-3"></i>
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">{{ __('about_us.unmatched_quality') }}</h3> {{-- Неприкосновен Квалитет --}}
                        <p class="text-gray-700 text-sm">{{ __('about_us.unmatched_quality_text') }}</p>
                    </div>
                    <div class="bg-light-gray p-6 rounded-lg shadow-sm">
                        <i class="fa-solid fa-headset text-primary-green text-3xl mb-3"></i>
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">{{ __('about_us.dedicated_support') }}</h3> {{-- Посвећена Подршка --}}
                        <p class="text-gray-700 text-sm">{{ __('about_us.dedicated_support_text') }}</p>
                    </div>
                    <div class="bg-light-gray p-6 rounded-lg shadow-sm">
                        <i class="fa-solid fa-recycle text-primary-green text-3xl mb-3"></i>
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">{{ __('about_us.sustainable_choices') }}</h3> {{-- Одрживи Избори --}}
                        <p class="text-gray-700 text-sm">{{ __('about_us.sustainable_choices_text') }}</p>
                    </div>
                </div>
            </section>

            {{-- Позив на Акцију --}}
            <section class="text-center">
                <h2 class="text-3xl font-semibold text-dark-gray mb-6">{{ __('about_us.join_community') }}</h2> {{-- Придружите се нашој заједници --}}
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    {{ __('about_us.join_community_text') }}
                </p>
                <a href="{{ route('products.index') }}" class="bg-primary-green text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-primary-green-dark transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 text-lg">
                    {{ __('about_us.discover_products') }}
                </a>
            </section>
        </div>
    </main>

    <x-footer />
</body>
</html>