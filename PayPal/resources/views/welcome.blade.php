<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body >
        
    <header class="p-4 border-b border-gray-200">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

                    <style>
    .product-container {
        max-width: 320px;
        margin: 30px auto;
        padding: 20px;
        border: 2px solid #0070ba;
        border-radius: 10px;
        background-color: #f0f9ff;
        font-family: Arial, sans-serif;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .product-container h2 {
        color: #003087;
        margin-bottom: 10px;
        font-weight: 700;
    }
    .product-container h3 {
        color: #0070ba;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .product-container form button {
        background-color: #0070ba;
        color: white;
        border: none;
        padding: 12px 24px;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .product-container form button:hover {
        background-color: #004b8d;
    }
</style>

<div class="product-container">
    <h2>Product: Laptop</h2>
    <h3>Price: $20</h3>
    <form action="{{ route('paypal') }}" method="post">
        @csrf
        <input type="hidden" name="price" value="20">
        <input type="hidden" name="product_name" value="Laptop">
        <input type="hidden" name="quantity" value="1">
        <button type="submit">Pay with PayPal</button>
    </form>
</div>





                </div>
            </div>
        </div>

                </div>
            </div>
        </div>
    </body>
</html>
