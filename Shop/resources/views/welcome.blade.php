<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>Welcome - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/css/spinner.css', 'resources/js/app.js', 'resources/js/cart-modal.js', 'resources/js/wishlist-modal.js', 'resources/js/search-modal.js', 'resources/js/spinner.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <div id="loading-spinner">
        <span class="loader"></span>
    </div>
    <x-header />

    <main>
        {{-- Glavni Hero Baner --}}
        <section class="relative bg-gradient-to-r from-primary-green to-primary-green-dark text-white py-16 md:py-24 overflow-hidden">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between z-10 relative">
                <div class="md:w-1/2 text-center md:text-left mb-8 md:mb-0 animate-fade-in-down">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
                        Discover Amazing Products at Vesna's Web Store
                    </h1>
                    <p class="text-lg md:text-xl opacity-90 mb-8">
                        Your one-stop shop for high-quality items, delivered with care.
                    </p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-white text-primary-green font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Shop Now
                    </a>
                </div>
                <div class="md:w-1/2 flex justify-center md:justify-end">
                    {{-- Direktno korišćenje slike --}}
                    <img src="{{ asset('images/banner/banner1.jpg') }}"
                         alt="Online shopping and e-commerce technology concept. Buyer with computer laptop to order product and choose delivery service. E-commerce business and supply chain management."
                         class="w-full max-w-lg rounded-xl shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out animate-fade-in-right">
                </div>
            </div>
            {{-- Pozadinski animirani blobovi (ako su definisani u CSS-u) --}}
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
                <div class="absolute w-64 h-64 bg-primary-green-light rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob top-10 left-10"></div>
                <div class="absolute w-72 h-72 bg-primary-green-light rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000 top-40 right-1/4"></div>
                <div class="absolute w-56 h-56 bg-primary-green-light rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000 bottom-10 left-1/3"></div>
            </div>
        </section>

        {{-- Sekcija: Istaknute Kategorije --}}
        <section class="py-12 md:py-16 bg-light-gray">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-dark-gray mb-8 text-center">Explore Our Categories</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Proveravamo da li ima kategorija za prikaz --}}
                    @if($categories->isEmpty())
                        <div class="col-span-full text-center py-10">
                            <i class="fa-solid fa-folder-open text-gray-400 text-6xl mb-4"></i>
                            <p class="text-xl text-gray-600 mb-4">No categories to display at the moment.</p>
                        </div>
                    @else
                        {{-- Iteriramo kroz svaku kategoriju dobijenu iz baze --}}
                        @foreach($categories as $category)
                            <a href="{{ route('products.index', ['category_slug' => $category->slug]) }}"
                            class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 overflow-hidden">
                                
                                {{-- Logika za prikaz slike kategorije sa Spatie Media Library --}}
                                {{-- Prikazaće 'thumb' konverziju ako postoji, inače original --}}

                                @php
                                    // Dobijamo URL do thumb konverzije. Ako thumb nije dostupan, vraća original.
                                    // Ako nema medija u kolekciji, vraća prazan string.
                                    $categoryImageUrl = $category->getFirstMediaUrl('category_images', 'thumb');

                                    // Alternativno, ako si zadržao getImageUrlAttribute u modelu:
                                    // $categoryImageUrl = $category->image_url;
                                @endphp

                                @if($categoryImageUrl)
                                    <img src="{{ $categoryImageUrl }}"
                                        alt="{{ $category->name }}"
                                        class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                @else
                                    {{-- Placeholder slika ako nema slike za kategoriju --}}
                                    <img src="https://via.placeholder.com/400x300/F5F5F5/333333?text=No+Category+Image"
                                        alt="No image available for {{ $category->name }}"
                                        class="w-full h-48 object-cover rounded-t-xl">
                                @endif

                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-dark-gray mb-2">{{ $category->name }}</h3>
                                    <p class="text-gray-700 text-sm">
                                        {{-- Prikaz opisa ako postoji, inače generički tekst --}}
                                        {{ $category->description ?? 'Explore products from the ' . $category->name . ' category.' }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>


        {{-- Sekcija: Zašto kupovati kod nas --}}
        {{-- Sekcija: Zašto kupovati kod nas --}}
<section class="bg-primary-green-light py-12 md:py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-dark-gray mb-8">Why Choose Vesna's Web Store?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md">
                {{-- Kamion (siv) - Sada sa w- i h- klasama za veličinu --}}
                <x-heroicon-o-truck class="text-gray-500 w-10 h-10 mb-4" /> 
                <h3 class="text-xl font-semibold text-dark-gray mb-2">Fast Shipping</h3>
                <p class="text-gray-700 text-sm">Get your orders quickly and reliably to your doorstep.</p>
            </div>
            <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md">
                {{-- Garancija kvalitete (zelena) - Sada sa w- i h- klasama za veličinu --}}
                <x-heroicon-o-check-badge class="text-green-500 w-10 h-10 mb-4" /> 
                <h3 class="text-xl font-semibold text-dark-gray mb-2">Quality Guaranteed</h3>
                <p class="text-gray-700 text-sm">We stand behind the quality of every product we sell.</p>
            </div>
            <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-md">
                {{-- Pojas za spašavanje (bela sa crvenom - koristićemo crvenu boju direktno na ikoni,
                     jer bela unutrašnjost često dolazi od samog SVG-a, ako je outline) --}}
                <x-heroicon-o-lifebuoy class="text-red-500 w-10 h-10 mb-4" /> 
                <h3 class="text-xl font-semibold text-dark-gray mb-2">24/7 Support</h3>
                <p class="text-gray-700 text-sm">Our friendly support team is always here to help you.</p>
            </div>
        </div>
    </div>
</section>

        {{-- Sekcija: Najprodavaniji/Preporučeni proizvodi --}}
        <section class="py-12 md:py-16 bg-light-gray">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-dark-gray mb-8 text-center">Our Top Picks</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    {{-- Dinamički popuni ovu sekciju sa preporučenim proizvodima iz baze --}}
                    @forelse($featuredProducts as $product)
                        {{-- Dobijamo URL glavne slike proizvoda iz Spatie Media Library --}}
                        @php
                            // Koristi 'thumb' konverziju za male prikaze
                            $productImageUrl = $product->getFirstMediaUrl('product_images', 'thumb');
                            // Ako nema 'thumb' konverzije, getFirstMediaUrl će vratiti URL originala.
                            // Ako nema slika u kolekciji, vratiće prazan string.
                        @endphp

                        <a href="{{ route('products.show', $product->slug) }}" class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 overflow-hidden">
                            @if($productImageUrl)
                                <img src="{{ $productImageUrl }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            @else
                                {{-- Placeholder slika ako nema slike za proizvod --}}
                                <img src="https://via.placeholder.com/400x300/F5F5F5/333333?text=No+Product+Image"
                                    alt="No image available for {{ $product->name }}"
                                    class="w-full h-48 object-cover rounded-t-xl">
                            @endif

                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-dark-gray mb-1">{{ $product->name }}</h3>
                                <p class="text-primary-green font-bold text-xl">
                                    @if($product->discount_price && $product->discount_price < $product->price)
                                        <span class="text-gray-500 line-through text-base mr-2">
                                            {{ number_format($product->price, 2, ',', '.') }} USD
                                        </span>
                                        {{ number_format($product->discount_price, 2, ',', '.') }} USD
                                    @else
                                        {{ number_format($product->price, 2, ',', '.') }} USD
                                    @endif
                                </p>
                                <div class="flex items-center gap-2 mt-4">
                                    <form action="{{ route('cart.store') }}" method="POST" class="w-full"> {{-- Promena rute i širina forme --}}
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1"> {{-- Trenutno fiksna količina --}}
                                
                                        <button type="submit" class="flex-grow bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                                            <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                                        </button>
                                    </form>
                                    <form action="{{ route('wishlist.store') }}" method="POST"> {{-- Nema potrebe za class="w-full" ako ne treba da zauzme punu širinu --}}
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        {{-- Ako ti je potrebna količina za listu želja, dodaj: <input type="hidden" name="quantity" value="1"> --}}
                            
                                        <button type="submit" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105 text-sm whitespace-nowrap">
                                            <i class="fa-solid fa-heart mr-1"></i> Add to Wishlist
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    @empty
                        {{-- Poruka ako nema preporučenih proizvoda --}}
                        <p class="col-span-full text-center text-gray-600">No featured products available at the moment.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- Sekcija: Poziv na Akciju (Call to Action) --}}
        <section class="bg-primary-green text-white py-16 md:py-20 text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Find Your Next Favorite Item?</h2>
                <p class="text-lg md:text-xl opacity-90 mb-8">
                    Browse our extensive catalog and discover incredible products today!
                </p>
                <a href="{{ route('products.index') }}" class="inline-block bg-white text-primary-green font-semibold py-3 px-10 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                    Start Exploring Now
                </a>
            </div>
        </section>

    </main>

    {{-- Modal za potvrdu dodavanja u korpu (skriven po defaultu) --}}
    <div id="addToCartModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full relative">
            <h3 class="text-xl font-semibold text-dark-gray mb-4">Product has added to the Cart!</h3>

            <div id="modalProductDetails" class="flex items-center mb-4">
                {{-- Detalji proizvoda će biti popunjeni JS-om --}}
            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('components.cart') }}" class="bg-primary-green text-white px-5 py-2 rounded-md font-medium text-center
                                                      hover:bg-primary-green-dark transition duration-200">
                    Go to Cart
                </a>
                <button id="continueShoppingBtn" class="bg-gray-200 text-dark-gray px-5 py-2 rounded-md font-medium
                                              hover:bg-gray-300 transition duration-200">
                    Continue Shopping
                </button>
            </div>

            {{-- Dugme za zatvaranje modala u gornjem desnom uglu --}}
            <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div id="addToWishlistModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full relative">
            <h3 class="text-xl font-semibold text-dark-gray mb-4">Product added to Wishlist!</h3>
    
            <div id="wishlistModalProductDetails" class="flex items-center mb-4">
                {{-- Detalji proizvoda će biti popunjeni JS-om --}}
            </div>
    
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('components.wishlist') }}" class="bg-primary-green text-white px-5 py-2 rounded-md font-medium text-center
                                                          hover:bg-primary-green-dark transition duration-200">
                    Go to Wishlist
                </a>
                <button id="continueShoppingWishlistBtn" class="bg-gray-200 text-dark-gray px-5 py-2 rounded-md font-medium
                                                  hover:bg-gray-300 transition duration-200">
                    Continue Shopping
                </button>
            </div>
    
            {{-- Dugme za zatvaranje modala u gornjem desnom uglu --}}
            <button id="closeWishlistModalBtn" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- JavaScript za inicijalizaciju i prikaz modala --}}
    <script>
        // Postavite globalnu varijablu sa podacima iz Laravel sesije
        // Ovo je bolja praksa nego direktno ubacivanje session() u JS blok
        // jer izbegava IDE upozorenja i ispravno rukuje stringovima (npr. sa navodnicima).
        window.flashMessages = {
            success: @json(session('success')),
            addedProduct: {
                id: @json(session('added_product_id')),
                name: @json(session('added_product_name')),
                image: @json(session('added_product_image'))
            }
        };

        // Podaci za Wishlist Modal
        window.flashWishlistMessages = { // NOVA GLOBALNA VARIJABLA
            success: @json(session('wishlist_success')), // Jedinstven naziv sesije
            addedProduct: {
                id: @json(session('added_wishlist_product_id')), // Jedinstven naziv sesije
                name: @json(session('added_wishlist_product_name')),
                image: @json(session('added_wishlist_product_image'))
            }
        };
    </script>
    
    {{-- Opciono: obriši flash sesije odmah nakon što su pročitane u Blade-u --}}
    @php
        session()->forget([
            'success_add_to_cart', 'added_cart_product_id', 'added_cart_product_name', 'added_cart_product_image',
            'success_add_to_wishlist', 'added_wishlist_product_id', 'added_wishlist_product_name', 'added_wishlist_product_image'
        ]);
    @endphp

    <x-footer />
</body>
</html>