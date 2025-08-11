<section x-data="{ show: false }" x-init="setTimeout(() => { show = true }, 1000)" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 transform translate-y-10" x-transition:enter-end="opacity-100 transform translate-y-0" class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-serif font-bold text-center text-dark-gray mb-12">Најпродаванији производи</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach (range(1, 4) as $item)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 cursor-pointer group">
                    <img src="https://via.placeholder.com/400" alt="Накит" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="p-4 text-center">
                        <h3 class="font-sans font-semibold text-lg text-dark-gray">Назив производа {{ $item }}</h3>
                        <p class="text-subtle-gray mt-2 font-sans">15000 РСД</p>
                        <button class="mt-4 bg-dark-gray text-white font-sans font-semibold py-2 px-6 rounded-full hover:bg-gold hover:text-dark-gray transition duration-300">Додај у корпу</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
