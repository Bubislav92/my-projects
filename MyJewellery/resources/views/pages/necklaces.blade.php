<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Огрлице | My Jewellery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased text-dark-gray bg-white">

    @include('components.header')

    <main class="container mx-auto px-4 py-12">
        <h1 class="text-4xl md:text-5xl font-serif font-bold text-center text-dark-gray mb-10">Огрлице</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <aside class="col-span-1">
                <div class="bg-light-gray p-6 rounded-lg shadow-sm sticky top-28">
                    <h3 class="font-sans font-bold text-lg mb-4 text-dark-gray">Филтри</h3>

                    <div class="mb-4">
                        <label for="price_range" class="block font-sans font-semibold text-subtle-gray mb-2">Опсег цене</label>
                        <input type="range" id="price_range" name="price_range" min="0" max="50000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    </div>

                    <div class="mb-4">
                        <h4 class="font-sans font-semibold text-subtle-gray mb-2">Материјал</h4>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="gold" class="rounded text-gold focus:ring-gold">
                            <label for="gold" class="ml-2 font-sans text-dark-gray">Злато</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="silver" class="rounded text-gold focus:ring-gold">
                            <label for="silver" class="ml-2 font-sans text-dark-gray">Сребро</label>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-span-1 md:col-span-3">
                <div class="flex justify-between items-center mb-6">
                    <p class="font-sans text-subtle-gray">Приказано 1-12 од 50 производа</p>
                    <select class="rounded-lg border-gray-300 text-subtle-gray focus:ring-gold focus:border-gold">
                        <option>Сортирај по: Најновије</option>
                        <option>Сортирај по: Највиша цена</option>
                        <option>Сортирај по: Најнижа цена</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach (range(1, 12) as $item)
                        <div class="bg-white rounded-lg shadow-sm hover:shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 cursor-pointer group">
                            <img src="https://via.placeholder.com/400" alt="Огрлица {{ $item }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="p-4 text-center">
                                <h3 class="font-sans font-semibold text-lg text-dark-gray">Огрлица {{ $item }}</h3>
                                <p class="text-subtle-gray mt-2 font-sans">20000 РСД</p>
                                <button class="mt-4 bg-dark-gray text-white font-sans font-semibold py-2 px-6 rounded-full hover:bg-gold hover:text-dark-gray transition duration-300">Додај у корпу</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-10 flex justify-center">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="px-3 py-2 rounded-full text-subtle-gray hover:bg-light-gray transition-colors duration-300">Претходна</a>
                        <a href="#" class="px-3 py-2 rounded-full text-white bg-dark-gray hover:bg-gold transition-colors duration-300">1</a>
                        <a href="#" class="px-3 py-2 rounded-full text-subtle-gray hover:bg-light-gray transition-colors duration-300">2</a>
                        <a href="#" class="px-3 py-2 rounded-full text-subtle-gray hover:bg-light-gray transition-colors duration-300">3</a>
                        <a href="#" class="px-3 py-2 rounded-full text-subtle-gray hover:bg-light-gray transition-colors duration-300">Следећа</a>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')

</body>
</html>
