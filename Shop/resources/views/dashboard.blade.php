<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('dashboard_translate.my_dashboard') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Бочни навигациони мени за Dashboard --}}
            <aside class="md:col-span-1 bg-white p-6 rounded-xl shadow-md h-fit">
                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-gauge-high mr-3 {{ request()->routeIs('dashboard') ? 'text-primary-green' : '' }}"></i> {{ __('dashboard_translate.dashboard_overview') }}
                    </a>
                    <a href="{{ route('dashboard.orders') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard.orders') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard.orders'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-box-seam mr-3 {{ request()->routeIs('dashboard.orders') ? 'text-primary-green' : '' }}"></i> {{ __('dashboard_translate.my_orders') }}
                    </a>
                    <a href="{{ route('dashboard.wishlist') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard.wishlist') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard.wishlist'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-heart mr-3 {{ request()->routeIs('dashboard.wishlist') ? 'text-primary-green' : '' }}"></i> {{ __('dashboard_translate.my_wishlist') }}
                    </a>
                    <a href="{{ route('dashboard.profile') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard.profile') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard.profile'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-user mr-3 {{ request()->routeIs('dashboard.profile') ? 'text-primary-green' : '' }}"></i> {{ __('dashboard_translate.my_profile') }}
                    </a>

                    {{-- Дугме za odjavu --}}
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-left p-3 rounded-lg text-lg font-semibold text-red-600 hover:bg-red-50 transition duration-300">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i> {{ __('dashboard_translate.log_out') }}
                        </button>
                    </form>
                </nav>
            </aside>

            {{-- Главни садржај Dashboard-а (динамички учитан) --}}
            <div class="md:col-span-3 space-y-8">
                @if (request()->routeIs('dashboard'))
                    {{-- Садржај за "Dashboard Overview" --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-3xl font-semibold text-dark-gray mb-4 flex items-center">
                            <i class="fa-solid fa-circle-user text-primary-green mr-3"></i> {{ __('dashboard_translate.welcome_back') }} {{ $user->name }}!
                        </h2>
                        <p class="text-gray-700 text-lg mb-4">
                            {{ __('dashboard_translate.overview_text') }}
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-center">
                            <div class="bg-gradient-to-br from-primary-green-light to-primary-green p-4 rounded-lg shadow-md text-white flex flex-col items-center justify-center">
                                <i class="fa-solid fa-box-open text-4xl mb-2"></i>
                                <p class="text-sm font-light">{{ __('dashboard_translate.total_orders') }}</p>
                                <p class="text-3xl font-bold">{{ $totalOrders }}</p>
                            </div>
                            <div class="bg-gradient-to-br from-purple-400 to-purple-600 p-4 rounded-lg shadow-md text-white flex flex-col items-center justify-center">
                                <i class="fa-solid fa-heart text-4xl mb-2"></i>
                                <p class="text-sm font-light">{{ __('dashboard_translate.wishlist_items') }}</p>
                                <p class="text-3xl font-bold">{{ $wishlistCount }}</p>
                            </div>
                            <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-4 rounded-lg shadow-md text-white flex flex-col items-center justify-center">
                                <i class="fa-solid fa-circle-check text-4xl mb-2"></i>
                                <p class="text-sm font-light">{{ __('dashboard_translate.account_status') }}</p>
                                <p class="text-xl font-bold">{{ ucfirst($user->status ?? 'unverified') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Додајемо информативни блок о поврату новца --}}
                    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center">
                            <div class="py-1"><i class="fa-solid fa-circle-info text-2xl mr-3"></i></div>
                            <div>
                                <p class="font-bold">{{ __('dashboard_translate.refund_policy') }}</p>
                                <p class="text-sm">{{ __('dashboard_translate.refund_policy_info') }} <a href="{{ route('refund-policy') }}" class="font-semibold underline hover:text-blue-800">{{ __('dashboard_translate.refund_policy_link') }}</a> {{ __('dashboard_translate.to_understand_procedures') }}</p>
                            </div>  
                        </div>
                    </div>

                    {{-- Део "Последња наруџбина" --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">{{ __('dashboard_translate.last_order') }}</h2>
                        @if ($lastOrder)
                            <div class="border border-gray-200 rounded-lg p-4 bg-light-gray">
                                <div class="flex flex-wrap justify-between items-center mb-2 gap-y-2">
                                    <span class="text-gray-700 font-medium">{{ __('dashboard_translate.order_id') }} <span class="text-dark-gray">#{{ $lastOrder->id }}</span></span>
                                    <span class="text-gray-700 font-medium">{{ __('dashboard_translate.date') }} <span class="text-dark-gray">{{ $lastOrder->created_at->format('Y-m-d') }}</span></span>
                                    <span class="text-gray-700 font-medium">{{ __('dashboard_translate.total') }} <span class="text-primary-green font-bold">{{ number_format($lastOrder->total, 2) }} USD</span></span>
                                </div>
                                <div class="flex flex-wrap justify-between items-center mb-4 gap-y-2">
                                    <span class="text-gray-700 font-medium">{{ __('dashboard_translate.order_status') }}
                                        @php
                                            $orderStatusClass = '';
                                            switch ($lastOrder->status) {
                                                case 'processing': $orderStatusClass = 'bg-blue-100 text-blue-800'; break;
                                                case 'shipped': $orderStatusClass = 'bg-yellow-100 text-yellow-800'; break;
                                                case 'delivered': $orderStatusClass = 'bg-green-100 text-green-800'; break;
                                                case 'cancelled': $orderStatusClass = 'bg-red-100 text-red-800'; break;
                                                default: $orderStatusClass = 'bg-gray-100 text-gray-800'; break;
                                            }
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $orderStatusClass }}">
                                            {{ ucfirst($lastOrder->status) }}
                                        </span>
                                    </span>
                                    <span class="text-gray-700 font-medium">{{ __('dashboard_translate.refund_status') }}
                                        @php
                                            $refundStatusClass = '';
                                            switch ($lastOrder->refund_status) {
                                                case 'requested': $refundStatusClass = 'bg-orange-100 text-orange-800'; break;
                                                case 'approved': $refundStatusClass = 'bg-teal-100 text-teal-800'; break;
                                                case 'denied': $refundStatusClass = 'bg-pink-100 text-pink-800'; break;
                                                case 'completed': $refundStatusClass = 'bg-green-100 text-green-800'; break;
                                                default: $refundStatusClass = 'bg-gray-100 text-gray-800'; break;
                                            }
                                            $refundText = $lastOrder->refund_status ? ucfirst($lastOrder->refund_status) : 'N/A';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $refundStatusClass }}">
                                            {{ $refundText }}
                                        </span>
                                    </span>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('dashboard.orders') }}" class="inline-block bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                                        {{ __('dashboard_translate.view_order_details') }}
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-6 text-gray-600">
                                <i class="fa-solid fa-box-open text-5xl mb-4 text-gray-400"></i>
                                <p class="text-lg mb-4">{{ __('dashboard_translate.no_orders_yet') }}</p>
                                <a href="{{ route('products.index') }}" class="inline-block bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300">
                                    {{ __('dashboard_translate.start_shopping') }}
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- Брзе акције / Дугмад за навигацију --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">{{ __('dashboard_translate.quick_actions') }}</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <a href="{{ route('dashboard.orders') }}" class="flex flex-col items-center justify-center p-6 bg-light-gray rounded-lg shadow-inner hover:bg-gray-200 transition duration-300 transform hover:scale-105 text-dark-gray font-semibold">
                                <i class="fa-solid fa-list-check text-4xl mb-3 text-primary-green"></i>
                                {{ __('dashboard_translate.my_orders') }}
                            </a>
                            <a href="{{ route('dashboard.wishlist') }}" class="flex flex-col items-center justify-center p-6 bg-light-gray rounded-lg shadow-inner hover:bg-gray-200 transition duration-300 transform hover:scale-105 text-dark-gray font-semibold">
                                <i class="fa-solid fa-heart text-4xl mb-3 text-red-500"></i>
                                {{ __('dashboard_translate.my_wishlist') }}
                            </a>
                            <a href="{{ route('dashboard.profile') }}" class="flex flex-col items-center justify-center p-6 bg-light-gray rounded-lg shadow-inner hover:bg-gray-200 transition duration-300 transform hover:scale-105 text-dark-gray font-semibold">
                                <i class="fa-solid fa-user-gear text-4xl mb-3 text-blue-500"></i>
                                {{ __('dashboard_translate.edit_profile') }}
                            </a>
                        </div>
                    </div>
                @endif

                {{-- Садржај за "My Orders" --}}
                @if (request()->routeIs('dashboard.orders'))
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-3xl font-semibold text-dark-gray mb-6">{{ __('dashboard_translate.my_orders') }}</h2>
                        @if ($orders->isEmpty())
                            <div class="text-center py-10">
                                <i class="fa-solid fa-box-open text-gray-400 text-6xl mb-4"></i>
                                <p class="text-xl text-gray-600 mb-4">{{ __('dashboard_translate.no_order_yet') }}</p>
                                <a href="{{ route('products.index') }}" class="inline-block bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300">
                                    {{ __('dashboard_translate.start_shipping') }}
                                </a>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                    <thead class="bg-light-gray border-b border-gray-200">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('dashboard_translate.order_id') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('dashboard_translate.date') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('dashboard_translate.total') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('dashboard_translate.order_status') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('dashboard_translate.refund_status') }}</th>
                                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('dashboard_translate.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($orders as $order)
                                            <tr class="hover:bg-gray-50 transition duration-150">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">#{{ $order->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $order->created_at->format('Y-m-d') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary-green font-semibold">{{ number_format($order->total, 2) }} USD</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    @php
                                                        $orderStatusClass = '';
                                                        switch ($order->status) {
                                                            case 'processing': $orderStatusClass = 'bg-blue-100 text-blue-800'; break;
                                                            case 'shipped': $orderStatusClass = 'bg-yellow-100 text-yellow-800'; break;
                                                            case 'delivered': $orderStatusClass = 'bg-green-100 text-green-800'; break;
                                                            case 'cancelled': $orderStatusClass = 'bg-red-100 text-red-800'; break;
                                                            default: $orderStatusClass = 'bg-gray-100 text-gray-800'; break;
                                                        }
                                                    @endphp
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $orderStatusClass }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    @php
                                                        $refundStatusClass = '';
                                                        switch ($order->refund_status) {
                                                            case 'requested': $refundStatusClass = 'bg-orange-100 text-orange-800'; break;
                                                            case 'approved': $refundStatusClass = 'bg-teal-100 text-teal-800'; break;
                                                            case 'denied': $refundStatusClass = 'bg-pink-100 text-pink-800'; break;
                                                            case 'completed': $refundStatusClass = 'bg-green-100 text-green-800'; break;
                                                            default: $refundStatusClass = 'bg-gray-100 text-gray-800'; break;
                                                        }
                                                        $refundText = $order->refund_status ? ucfirst($order->refund_status) : 'N/A';
                                                    @endphp
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $refundStatusClass }}">
                                                        {{ $refundText }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-center">
                                                    <a href="#" class="text-primary-green hover:text-primary-green-dark mr-4">{{ __('dashboard_translate.view_details') }}</a>
                                                    @if ($order->status == 'delivered' && !$order->refund_status)
                                                        <button class="text-blue-500 hover:text-blue-700 ml-2">{{ __('dashboard_translate.request_refund') }}</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                @endif

                {{-- Садржај за "My Wishlist" --}}
                @if (request()->routeIs('dashboard.wishlist'))
                    <div class="bg-white p-6 md:p-8 rounded-xl shadow-md">
                        <h2 class="text-3xl font-semibold text-dark-gray mb-6">{{ __('my_wishlist.my_wishlist') }}</h2>
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
                                @foreach ($wishlistItems as $item)
                                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out">
                                        <a href="{{ route('products.show', $item->product->slug) }}" class="block relative overflow-hidden">
                                            <img src="{{ asset('images/products/' . $item->product->image) }}"
                                                 alt="{{ $item->product->name }}"
                                                 class="w-full h-48 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">
                                        </a>
                                        <div class="p-4 text-center">
                                            <h3 class="text-xl font-semibold text-dark-gray mb-2">
                                                <a href="{{ route('products.show', $item->product->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out">
                                                    {{ $item->product->name }}
                                                </a>
                                            </h3>
                                            <p class="text-lg font-bold text-primary-green mb-4">{{ number_format($item->product->price, 2) }} RSD</p>
                                            <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                                <form action="{{ route('cart.store') }}" method="POST" class="flex-grow">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                                    <button type="submit" class="w-full bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                                                        <i class="fa-solid fa-cart-plus mr-1"></i> Add to Cart
                                                    </button>
                                                </form>
                                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="flex-shrink-0">
                                                    @csrf
                                                    @method('DELETE')
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
                @endif
                
                {{-- Садржај за "My Profile" --}}
                @if (request()->routeIs('dashboard.profile'))
                    {{-- Одељак за ажурирање личних података --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-3xl font-semibold text-dark-gray mb-6">Personal Information</h2>
                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                            @csrf
                            @method('patch')

                            <div>
                                <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Name</label>
                                <input id="name"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="text"
                                       name="name"
                                       value="{{ old('name', $user->name) }}"
                                       required autofocus>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                                <input id="email"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="email"
                                       name="email"
                                       value="{{ old('email', $user->email) }}"
                                       required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="flex justify-end mt-6">
                                <button type="submit" class="bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Одељак за ажурирање лозинке --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h2 class="text-3xl font-semibold text-dark-gray mb-6">Update Password</h2>
                        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                            @csrf
                            @method('put')

                            <div>
                                <label for="current_password" class="block text-gray-700 text-sm font-semibold mb-2">Current Password</label>
                                <input id="current_password"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="password"
                                       name="current_password"
                                       required>
                                @error('current_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">New Password</label>
                                <input id="password"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="password"
                                       name="password"
                                       required>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirm New Password</label>
                                <input id="password_confirmation"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="password"
                                       name="password_confirmation"
                                       required>
                                @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end mt-6">
                                <button type="submit" class="bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>