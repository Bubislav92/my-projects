<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/order-modal.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">My Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <aside class="md:col-span-1 bg-white p-6 rounded-xl shadow-md h-fit">
                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard') ? 'bg-light-gray text-primary-green' : '' }}">
                        Dashboard Overview
                    </a>
                    <a href="{{ route('dashboard.orders') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard.orders') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard.orders'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-box-seam mr-3 {{ request()->routeIs('dashboard.orders') ? 'text-primary-green' : '' }}"></i> My Orders
                    </a>
                    <a href="{{ route('components.wishlist') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('components.wishlist') ? 'bg-light-gray text-primary-green' : '' }}">
                        </i> My Wishlist
                    </a>
                    <a href="{{ route('dashboard.profile') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard.profile') ? 'bg-light-gray text-primary-green' : '' }}">
                        </i> My Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-left p-3 rounded-lg text-lg font-semibold text-red-600 hover:bg-red-50 transition duration-300">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i> Log Out
                        </button>
                    </form>
                </nav>
            </aside>

            <div class="md:col-span-3 space-y-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-3xl font-semibold text-dark-gray mb-6">My Orders</h2>

                    @if ($orders->isEmpty())
                        <div class="text-center py-10 text-gray-500">
                            <i class="fa-solid fa-boxes-stacked text-6xl mb-4"></i>
                            <p class="text-xl">You have no orders yet.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-light-gray">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">View Details</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">#{{ $order->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('d.m.Y.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($order->total_amount, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->status }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button data-order-id="{{ $order->id }}" class="view-order-btn bg-primary-green text-white px-3 py-1 rounded-md text-sm hover:bg-primary-green-dark">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <x-footer />

    <div id="orderDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-2xl w-full relative">
            <div class="flex justify-between items-center mb-4 border-b pb-2">
                <h3 class="text-2xl font-semibold text-dark-gray">Order Details</h3>
                <button id="closeOrderModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div id="modalContent" class="overflow-y-auto max-h-[80vh] pr-4">
                <div id="orderId" class="mb-2"></div>
                <div id="orderStatus" class="mb-2"></div>
                <div id="orderTotal" class="mb-4"></div>
                
                <h4 class="text-xl font-semibold text-dark-gray mb-2">Order Items</h4>
                <div id="orderItemsContainer" class="space-y-4"></div>
            </div>
        </div>
    </div>
</body>
</html>
