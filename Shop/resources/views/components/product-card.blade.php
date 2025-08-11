<div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out">
    <a href="{{ route('products.show', $product->slug) }}" class="block relative overflow-hidden">
        <img src="{{ $product->thumbnail_url ?: asset('images/placeholder.png') }}"
             alt="{{ $product->name }}"
             class="w-full h-48 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">

        {{-- Dugme za wishlist (srce) na slici --}}
        <button class="absolute top-3 right-3 text-gray-400 hover:text-red-500 bg-white rounded-full p-2 shadow-md transition duration-300 z-10">
            <i class="fa-regular fa-heart text-lg"></i> {{-- fa-regular za prazno srce, fa-solid za puno --}}
        </button>

        {{-- Dugme za korpu (shopping cart) na dnu slike - SADA UVEK VIDLJIVO --}}
        <button class="add-to-cart-button absolute bottom-3 right-3 text-gray-600 hover:text-primary-green bg-white rounded-full p-2 shadow-md transition duration-300 z-10">
            <i class="fa-solid fa-cart-shopping text-lg"></i>
        </button>

        @if ($product->discount_percentage)
            <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                -{{ $product->discount_percentage }}%
            </span>
        @endif
    </a>
    <div class="p-4 text-center">
        <h3 class="text-xl font-semibold text-dark-gray mb-2">
            <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out">
                {{ $product->name }}
            </a>
        </h3>
        <div class="text-lg font-bold text-primary-green mb-4">
            @if ($product->discount_price)
                <span class="text-red-500 mr-2">{{ number_format($product->discount_price, 2) }} USD</span>
                <span class="text-gray-500 line-through text-base">{{ number_format($product->price, 2) }} USD</span>
            @else
                {{ number_format($product->price, 2) }} USD
            @endif
        </div>

        {{-- Dugmad za Add to Cart i Add to Wishlist --}}
        <div class="flex gap-2 justify-center flex-wrap">
            <form action="{{ route('cart.store') }}" method="POST" class="w-full">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
        
                <button type="submit" class="flex-grow bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                    <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                </button>
            </form>
            <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
    
                <button type="submit" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105 text-sm whitespace-nowrap">
                    <i class="fa-solid fa-heart mr-1"></i> Add to Wishlist
                </button>
            </form>
        </div>
    </div>
</div>