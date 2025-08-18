<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>Shopping Cart - Vesna's Web Store</title>

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
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('shopping_cart.your_shopping_cart') }}</h1>

        <div class="bg-white p-6 md:p-8 rounded-xl shadow-md">
            {{-- Poruke o uspehu/grešci (flash poruke iz kontrolera) --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Proveravamo da li je korpa prazna koristeći podatke iz kontrolera --}}
            @if ($cartItems->isEmpty())
                {{-- Poruka ako je korpa prazna --}}
                <div class="text-center py-10">
                    <i class="fa-solid fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
                    <p class="text-xl text-gray-600 mb-4">{{ __('shopping_cart.cart_is_empty') }}</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300">
                        {{ __('shopping_cart.continue_shopping') }}
                    </a>
                </div>
            @else
                {{-- Tabela za prikazivanje stavki u korpi --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-light-gray">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('shopping_cart.product') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('shopping_cart.price') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('shopping_cart.quantity') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('shopping_cart.subtotal') }}</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{ __('shopping_cart.remove') }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-16 w-16">
                                                {{-- Prikaz slike proizvoda iz relacije --}}
                                                <img class="h-16 w-16 rounded-md object-cover"
                                                     src="{{ $item->product->thumbnail_url ?? 'https://picsum.photos/64/64?random=1' }}"
                                                     alt="{{ $item->product->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-dark-gray">{{ $item->product->name }}</div>
                                                {{-- Prikaz kategorije proizvoda iz relacije (ako je imate) --}}
                                                <div class="text-xs text-gray-500">{{ __('shopping_cart.category') }}  {{ $item->product->category->name ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{-- Prikaz cene (sa popustom ako postoji) --}}
                                        @php
                                            $displayPrice = $item->product->discount_price ?? $item->product->price;
                                        @endphp
                                        {{ number_format($displayPrice, 2) }} USD
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- Forma za ažuriranje količine --}}
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH') {{-- Koristimo PATCH metod za ažuriranje --}}
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                                   class="w-16 px-2 py-1 border border-gray-300 rounded-md text-center text-dark-gray focus:outline-none focus:ring-1 focus:ring-primary-green"
                                                   onchange="this.form.submit()"> {{-- Automatsko podnošenje forme pri promeni --}}
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{-- Podzbir za pojedinačnu stavku --}}
                                        {{ number_format($displayPrice * $item->quantity, 2) }} USD
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        {{-- Forma za brisanje stavke iz korpe (sada sa tekstom umesto ikone) --}}
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition duration-200"
                                                    onclick="return confirm('Are you sure to remove this Product from the Cart?');">
                                                <span>{{ __('shopping_cart.remove_product') }}</span> {{-- Tekstualna oznaka umesto ikone --}}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Rezime korpe i dugmad --}}
                <div class="mt-8 flex flex-col md:flex-row justify-between items-start md:items-end">
                    {{-- Dugme za nastavak kupovine i čišćenje korpe --}}
                    <div class="flex flex-col sm:flex-row gap-4 mb-4 md:mb-0">
                        <a href="{{ route('products.index') }}" class="inline-block bg-gray-200 text-dark-gray font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-gray-300 transition duration-300">
                            {{ __('shopping_cart.continue_shopping') }}
                        </a>
                        {{-- Dugme za čišćenje cele korpe --}}
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-block bg-red-500 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-red-600 transition duration-300"
                                    onclick="return confirm('Are you sure you want to clear your entire cart?');">
                                    {{ __('shopping_cart.clear_cart') }}
                            </button>
                        </form>
                    </div>

                    {{-- Rezime --}}
                    <div class="w-full md:w-1/3 bg-light-gray p-6 rounded-lg shadow-inner">
                        <h2 class="text-xl font-semibold text-dark-gray mb-4">{{ __('shopping_cart.cart_summary') }}</h2>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700">{{ __('shopping_cart.subtotal') }}:</span>
                            <span class="font-medium text-dark-gray">{{ number_format($subtotal, 2) }} USD</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700">{{ __('shopping_cart.shipping') }}:</span>
                            <span class="font-medium text-dark-gray">{{ number_format($shipping, 2) }} USD</span>
                        </div>
                        <div class="border-t border-gray-300 pt-2 mt-2 flex justify-between">
                            <span class="text-lg font-bold text-dark-gray">{{ __('shopping_cart.total') }}:</span>
                            <span class="text-lg font-bold text-primary-green">{{ number_format($total, 2) }} USD</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="w-full text-center bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105 mt-6 inline-block">
                            {{ __('shopping_cart.proceed_to_checkout') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <x-footer />
</body>
</html>