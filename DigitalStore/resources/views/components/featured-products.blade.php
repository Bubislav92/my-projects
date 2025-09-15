<section class="py-16 md:py-24 bg-surface-light text-text-secondary">
    <div class="container mx-auto px-4 md:px-6">

        {{-- Section Header --}}
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-text-primary mb-2">Featured Products</h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Discover our top-rated digital assets and get a head start on your next project.
            </p>
        </div>

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            {{-- Product Card 1 --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <a href="/product/1" class="block">
                    <img src="https://via.placeholder.com/600x400" alt="Product Name" class="w-full h-48 object-cover">
                </a>
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-text-primary">
                        <a href="/product/1" class="hover:text-accent-green transition-colors duration-300">
                            Digital Product 1
                        </a>
                    </h3>
                    <p class="text-text-secondary mt-1">Template, UI Kit</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-2xl font-bold text-accent-green">$29.99</span>
                        <a href="/add-to-cart/1" class="bg-accent-orange text-white text-sm font-bold py-2 px-4 rounded-full hover:bg-opacity-80 transition-colors duration-300">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>

            {{-- Product Card 2 (You can duplicate this card for more products) --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <a href="/product/2" class="block">
                    <img src="https://via.placeholder.com/600x400" alt="Product Name" class="w-full h-48 object-cover">
                </a>
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-text-primary">
                        <a href="/product/2" class="hover:text-accent-green transition-colors duration-300">
                            Digital Product 2
                        </a>
                    </h3>
                    <p class="text-text-secondary mt-1">Fonts, Icons</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-2xl font-bold text-accent-green">$15.00</span>
                        <a href="/add-to-cart/2" class="bg-accent-orange text-white text-sm font-bold py-2 px-4 rounded-full hover:bg-opacity-80 transition-colors duration-300">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Duplicate these cards to fill the grid --}}
        </div>

    </div>
</section>