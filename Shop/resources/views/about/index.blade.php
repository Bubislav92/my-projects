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
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">About Us</h1> {{-- О нама --}}

        <div class="bg-white p-8 rounded-xl shadow-md max-w-4xl mx-auto">
            {{-- Уводни део --}}
            <section class="mb-10 text-center">
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    Welcome to Vesna's Web Store, where passion for quality and dedication to customers converge into a unique shopping experience. Our story begins with the desire to bring you carefully selected products that will enrich your daily life.
                </p>
                {{-- Додата слика "our-team.jpg" --}}
                <img src="{{ asset('images/about/our-team.jpg') }}" alt="Our Team at Vesna's Web Store" class="w-full h-80 object-cover rounded-lg shadow-md mb-6 mx-auto">
            </section>

            {{-- Наша прича / Мисија --}}
            <section class="mb-10">
                <h2 class="text-3xl font-semibold text-dark-gray mb-6 text-center">Our Story & Mission</h2> {{-- Наша прича и Мисија --}}
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Vesna's Web Store was founded on the idea that online shopping should be more than just a transaction. We wanted to create a platform where every product has a story and where quality is unquestionable. We started with a small dream in <span class="font-semibold text-primary-green">2023</span>, and today we are proud of the community of customers who trust us.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            Our mission is simple: to provide you with outstanding products and impeccable service that exceeds expectations. We believe every customer deserves the best, which is why we invest time and effort in selecting an assortment that will delight you.
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
                <h2 class="text-3xl font-semibold text-dark-gray mb-6 text-center">What Sets Us Apart?</h2> {{-- Шта нас издваја? --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="bg-light-gray p-6 rounded-lg shadow-sm">
                        <i class="fa-solid fa-star text-primary-green text-3xl mb-3"></i>
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">Unmatched Quality</h3> {{-- Неприкосновен Квалитет --}}
                        <p class="text-gray-700 text-sm">Every product in our offer is carefully selected and tested to guarantee superior quality.</p>
                    </div>
                    <div class="bg-light-gray p-6 rounded-lg shadow-sm">
                        <i class="fa-solid fa-headset text-primary-green text-3xl mb-3"></i>
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">Dedicated Support</h3> {{-- Посвећена Подршка --}}
                        <p class="text-gray-700 text-sm">Our team is always here to provide you with fast and efficient support, from your first purchase to after-sales care.</p>
                    </div>
                    <div class="bg-light-gray p-6 rounded-lg shadow-sm">
                        <i class="fa-solid fa-recycle text-primary-green text-3xl mb-3"></i>
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">Sustainable Choices</h3> {{-- Одрживи Избори --}}
                        <p class="text-gray-700 text-sm">We strive to offer products that are ethically produced and environmentally friendly.</p>
                    </div>
                </div>
            </section>

            {{-- Позив на Акцију --}}
            <section class="text-center">
                <h2 class="text-3xl font-semibold text-dark-gray mb-6">Join Our Community</h2> {{-- Придружите се нашој заједници --}}
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Thank you for being a part of our story. We invite you to explore our wide selection and find something perfect for yourself!
                </p>
                <a href="{{ route('products.index') }}" class="bg-primary-green text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-primary-green-dark transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 text-lg">
                    Discover Our Products
                </a>
            </section>
        </div>
    </main>

    <x-footer />
</body>
</html>