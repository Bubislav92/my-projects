{{-- resources/views/components/wishlist.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Wishlist - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">My Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Бочни навигациони мени за Dashboard (Исти као на главној dashboard страници) --}}
            <aside class="md:col-span-1 bg-white p-6 rounded-xl shadow-md h-fit">
                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard') ? 'bg-light-gray text-primary-green' : '' }}">
                        <i class="fa-solid fa-gauge-high mr-3"></i> Dashboard Overview
                    </a>
                    <a href="{{ route('dashboard.orders') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard.orders') ? 'bg-light-gray text-primary-green' : '' }}">
                        <i class="fa-solid fa-box-seam mr-3"></i> My Orders
                    </a>
                    <a href="{{ route('dashboard.wishlist') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard.wishlist') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard.wishlist'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-heart mr-3 {{ request()->routeIs('dashboard.wishlist') ? 'text-primary-green' : '' }}"></i> My Wishlist
                    </a>
                    <a href="{{ route('dashboard.profile') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard.profile') ? 'bg-light-gray text-primary-green' : '' }}">
                        <i class="fa-solid fa-user mr-3"></i> My Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-left p-3 rounded-lg text-lg font-semibold text-red-600 hover:bg-red-50 transition duration-300">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i> Log Out
                        </button>
                    </form>
                </nav>
            </aside>

            {{-- Glavni sadržaj sekcije "My Wishlist" --}}
            <div class="md:col-span-3">
                <div class="bg-white p-6 md:p-8 rounded-xl shadow-md">
                    <h2 class="text-3xl font-semibold text-dark-gray mb-6">My Wishlist</h2>

                    {{-- Prikaz poruka o uspehu ili greškama --}}
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if(session('info'))
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('info') }}</span>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif


                    @if ($wishlistItems->isEmpty())
                        <div class="text-center py-10">
                            <i class="fa-solid fa-heart text-gray-400 text-6xl mb-4"></i>
                            <p class="text-xl text-gray-600 mb-4">Your wishlist is empty.</p>
                            <a href="{{ route('products.index') }}" class="inline-block bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300">
                                Discover Products
                            </a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($wishlistItems as $wishlistItem)
                                @php
                                    $product = $wishlistItem->product; // Pristup proizvodu kroz relaciju
                                    // Dohvatamo URL glavne slike proizvoda iz Spatie Media Library
                                    $productImageUrl = $product->getFirstMediaUrl('product_images', 'thumb');
                                    // Ako nema 'thumb' konverzije, getFirstMediaUrl će vratiti URL originala.
                                    // Ako nema slika u kolekciji, vratiće prazan string.
                                @endphp

                                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out">
                                    <a href="{{ route('products.show', $product->slug) }}" class="block relative overflow-hidden">
                                        @if($productImageUrl)
                                            <img src="{{ $productImageUrl }}"
                                                alt="{{ $product->name }}"
                                                class="w-full h-48 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">
                                        @else
                                            {{-- Placeholder slika ako nema slike za proizvod --}}
                                            <img src="https://via.placeholder.com/400x300/F5F5F5/333333?text=No+Product+Image"
                                                alt="No image available for {{ $product->name }}"
                                                class="w-full h-48 object-cover rounded-t-xl">
                                        @endif
                                    </a>
                                    <div class="p-4 text-center">
                                        <h3 class="text-xl font-semibold text-dark-gray mb-2">
                                            <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out">
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <p class="text-lg font-bold text-primary-green mb-4">
                                            @if($product->discount_price)
                                                <span class="text-gray-500 line-through text-base mr-2">{{ number_format($product->price, 2) }} USD</span>
                                                {{ number_format($product->discount_price, 2) }} USD
                                            @else
                                                {{ number_format($product->price, 2) }} USD
                                            @endif
                                        </p>
                                        <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                            {{-- Dugme za prebacivanje u korpu (form sa POST metodom) --}}
                                            <form action="{{ route('cart.store') }}" method="POST" class="flex-grow">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1"> {{-- Default količina 1 --}}
                                                <button type="submit" class="w-full bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                                                    <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                                                </button>
                                            </form>
                                            
                                            {{-- Dugme za brisanje iz liste želja (form sa DELETE metodom) --}}
                                            <form action="{{ route('wishlist.destroy', $wishlistItem->id) }}" method="POST" class="flex-shrink-0">
                                                @csrf
                                                @method('DELETE') {{-- Laravel metoda za DELETE zahtev --}}
                                                <button type="submit" class="w-full bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                                                    <i class="fa-solid fa-trash-can mr-1"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>