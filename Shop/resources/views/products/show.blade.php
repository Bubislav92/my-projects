<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/cart-modal.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 flex flex-col md:flex-row gap-8">
            {{-- Slike proizvoda --}}
            <div class="md:w-1/2 flex flex-col items-center gap-4">
                <div class="w-full flex justify-center">
                    <img
                        id="main-product-image"
                        src="{{ $product->medium_image_url ?: asset('images/placeholder.png') }}"
                        alt="{{ $product->name }}"
                        class="max-w-full h-auto rounded-lg shadow-md max-h-[500px] object-contain"
                    >
                </div>

                @if ($product->getMedia('product_images')->count() > 1)
                    <div class="flex flex-wrap justify-center gap-2 mt-2">
                        @foreach ($product->getMedia('product_images') as $media)
                            <img
                                src="{{ $media->getUrl('thumb') }}"
                                alt="Thumbnail"
                                class="w-16 h-16 object-cover rounded-md border border-gray-300 cursor-pointer hover:border-primary-green transition duration-200"
                                onclick="document.querySelector('#main-product-image').src='{{ $media->getUrl('medium') }}';"
                            >
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Detalji proizvoda --}}
            <div class="md:w-1/2">
                <h1 class="text-3xl md:text-4xl font-bold text-dark-gray mb-3">{{ $product->name }}</h1>

                <p class="text-2xl font-bold mb-4">
                    @if ($product->discount_price)
                        <span class="text-secondary-orange">{{ number_format($product->discount_price, 2) }} USD</span>
                        <span class="text-gray-500 line-through ml-3 text-lg">{{ number_format($product->price, 2) }} USD</span>
                    @else
                        <span class="text-primary-green">{{ number_format($product->price, 2) }} USD</span>
                    @endif
                </p>

                <div class="text-gray-700 leading-relaxed mb-6">
                    {{ $product->description }}
                </div>

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center space-x-4 mb-6">
                        <label for="quantity" class="text-lg font-semibold text-dark-gray">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-20 border border-gray-300 rounded-md py-2 px-3 text-center text-dark-gray focus:border-primary-green focus:ring focus:ring-primary-green focus:ring-opacity-50 transition duration-200">
                        
                        <button type="submit" class="flex-1 bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="fa-solid fa-cart-shopping mr-2"></i> Add to Cart
                        </button>
                    </div>
                </form>

                <div class="text-gray-600 text-sm">
                    <p class="mb-1"><span class="font-medium">Availability:</span> In Stock</p>
                    <p><span class="font-medium">SKU:</span> PROD-{{ $product->id }}</p>
                </div>
            </div>
        </div>

        ---

        {{-- Sekcija za Recenzije --}}
        <div class="mt-12 bg-white p-6 md:p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-bold text-dark-gray mb-6">{{ __('product_review_translate.reviews') }}</h2>

            {{-- Prikaz prosečne ocene i broja recenzija --}}
            @if ($product->reviews->count() > 0)
                @php
                    $averageRating = $product->reviews->avg('rating');
                    $fullStars = floor($averageRating);
                    $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
                    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                @endphp
                <div class="flex items-center mb-6">
                    <span class="text-2xl font-semibold mr-2">{{ number_format($averageRating, 1) }}</span>
                    <div class="flex items-center">
                        @for ($i = 0; $i < $fullStars; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.961a1 1 0 00.95.691h4.167c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.364 1.118l1.286 3.961c.3.921-.755 1.688-1.54 1.118l-3.368-2.446a1 1 0 00-1.176 0l-3.368 2.446c-.784.57-1.84-.197-1.54-1.118l1.286-3.961a1 1 0 00-.364-1.118L2.094 9.49c-.783-.57-.38-1.81.588-1.81h4.167a1 1 0 00.95-.691l1.286-3.961z" /></svg>
                        @endfor
                        @if ($hasHalfStar)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15.27L16.29 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.35 4.73L3.71 19z" clip-rule="evenodd" fill-rule="evenodd" /></svg>
                        @endif
                        @for ($i = 0; $i < $emptyStars; $i++)
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.961a1 1 0 00.95.691h4.167c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.364 1.118l1.286 3.961c.3.921-.755 1.688-1.54 1.118l-3.368-2.446a1 1 0 00-1.176 0l-3.368 2.446c-.784.57-1.84-.197-1.54-1.118l1.286-3.961a1 1 0 00-.364-1.118L2.094 9.49c-.783-.57-.38-1.81.588-1.81h4.167a1 1 0 00.95-.691l1.286-3.961z" /></svg>
                        @endfor
                    </div>
                    <span class="ml-2 text-gray-600">{{ $product->reviews->count() }} {{ __('product_review_translate.review') }}</span>
                </div>
            @else
                <p class="text-gray-600">{{ __('product_review_translate.no_reviews_yet') }}</p>
            @endif

            {{-- Forma za pisanje nove recenzije --}}
            <div class="mt-8">
                @auth
                    {{-- Provera da li je korisnik kupio proizvod pre nego što prikažemo formu --}}
                    @php
                        // Logika za proveru kupovine
                        // Uverite se da ste ispravno podesili relacije u User i Order modelima
                        $hasPurchased = auth()->user()->orders()
                            ->whereHas('orderItems', function ($query) use ($product) {
                                $query->where('product_id', $product->id);
                            })
                            ->exists();
                    @endphp

                    @if ($hasPurchased)
                        <h3 class="text-2xl font-semibold text-dark-gray mb-4">{{ __('product_review_translate.leave_your_review') }}</h3>
                        <form action="{{ route('products.reviews.store', $product->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                            {{-- Ocena --}}
                            <div class="mb-4">
                                <label for="rating" class="block text-gray-700 font-medium mb-2">{{ __('product_review_translate.your_rating') }}</label>
                                <select id="rating" name="rating" required
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-green focus:ring focus:ring-primary-green focus:ring-opacity-50">
                                    <option value="5">{{ __('product_review_translate.5_stars') }}</option>
                                    <option value="4">{{ __('product_review_translate.4_stars') }}</option>
                                    <option value="3">{{ __('product_review_translate.3_stars') }}</option>
                                    <option value="2">{{ __('product_review_translate.2_stars') }}</option>
                                    <option value="1">{{ __('product_review_translate.1_star') }}</option>
                                </select>
                            </div>

                            {{-- Tekst recenzije --}}
                            <div class="mb-4">
                                <label for="review_text" class="block text-gray-700 font-medium mb-2">{{ __('product_review_translate.your_rating') }}</label>
                                <textarea id="review_text" name="review_text" rows="4" required
                                          class="block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-green focus:ring focus:ring-primary-green focus:ring-opacity-50"></textarea>
                            </div>

                            <button type="submit" class="w-full bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300">
                                {{ __('product_review_translate.submit_review') }}
                            </button>
                        </form>
                    @else
                        <p class="text-gray-600">{{ __('product_review_translate.only_customers_can_review') }}</p>
                    @endif
                @else
                    <p class="text-gray-600">{{ __('product_review_translate.must_be_logged_in_to_review') }}</p>
                @endauth
            </div>

            {{-- Lista recenzija --}}
            <div class="space-y-6 mt-8">
                @foreach ($product->reviews->sortByDesc('created_at') as $review)
                    <div class="bg-light-gray p-4 rounded-lg">
                        <div class="flex items-center mb-2">
                            <p class="font-bold text-dark-gray mr-2">{{ $review->user->name }}</p>
                            <div class="flex items-center">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.961a1 1 0 00.95.691h4.167c.969 0 1.371 1.24.588 1.81l-3.368 2.446a1 1 0 00-.364 1.118l1.286 3.961c.3.921-.755 1.688-1.54 1.118l-3.368-2.446a1 1 0 00-1.176 0l-3.368 2.446c-.784.57-1.84-.197-1.54-1.118l1.286-3.961a1 1 0 00-.364-1.118L2.094 9.49c-.783-.57-.38-1.81.588-1.81h4.167a1 1 0 00.95-.691l1.286-3.961z" /></svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $review->review_text }}</p>
                        <p class="text-xs text-gray-500 mt-1">Datum: {{ $review->created_at->format('d.m.Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        ---

        {{-- Srodni proizvodi --}}
        <section class="mt-12">
            <h2 class="text-3xl font-bold text-dark-gray mb-6 text-center">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($relatedProducts as $relatedProduct)
                    <x-product-card :product="$relatedProduct" />
                @empty
                    <p class="text-center col-span-full text-gray-600">No related products found.</p>
                @endforelse
            </div>
        </section>
    </main>

    <x-footer />

    {{-- Modal: flash messages iz sesije --}}
    @if (session('success') && session('added_product_id'))
        <script>
            window.flashMessages = {
                success: @json(session('success')),
                addedProduct: {
                    id: @json(session('added_product_id')),
                    name: @json(session('added_product_name')),
                    image: @json(session('added_product_image'))
                }
            };
        </script>
    @endif

    {{-- Modal HTML (isto kao u index.blade.php) --}}
    <div id="addToCartModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full relative">
            <h3 class="text-xl font-semibold text-dark-gray mb-4">Product has been added to the Cart!</h3>
            <div id="modalProductDetails" class="flex items-center mb-4">
                {{-- Popunjava se JS-om --}}
            </div>
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('components.cart') }}" class="bg-primary-green text-white px-5 py-2 rounded-md font-medium text-center hover:bg-primary-green-dark transition duration-200">
                    Go to Cart
                </a>
                <button id="continueShoppingBtn" class="bg-gray-200 text-dark-gray px-5 py-2 rounded-md font-medium hover:bg-gray-300 transition duration-200">
                    Continue Shopping
                </button>
            </div>

            <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

</body>
</html>