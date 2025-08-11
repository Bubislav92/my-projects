<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Продавнице - Мој Мулти Вендор</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    <style>
        /* Custom keyframes for animations - ako niste definisali u tailwind.config.js */
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in-left {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes fade-in-right {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out forwards; }
        .animate-fade-in-left { animation: fade-in-left 0.6s ease-out forwards; }
        .animate-fade-in-right { animation: fade-in-right 0.6s ease-out forwards; }
    </style>
</head>
<body class="antialiased font-sans bg-gray-100">

    <x-header />

    <main class="min-h-screen py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-10 animate-fade-in-up opacity-0" style="animation-delay: 0.1s;">
                Истражите све наше продавнице
            </h1>

            {{-- Можете имплементирати стварну логику филтрирања овде или у Livewire компоненти --}}
            <div class="mb-8 p-6 bg-white rounded-xl shadow-lg animate-fade-in-up opacity-0" style="animation-delay: 0.2s;">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Филтрирајте продавнице</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Претрага по имену</label>
                        <input type="text" id="search" placeholder="Претражите продавнице..."
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-400 focus:ring focus:ring-orange-400 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Категорија</label>
                        <select id="category"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-400 focus:ring focus:ring-emerald-400 focus:ring-opacity-50">
                            <option value="">Све категорије</option>
                            <option value="clothing">Одећа</option>
                            <option value="electronics">Електроника</option>
                            <option value="handmade">Ручно рађено</option>
                            </select>
                    </div>
                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Оцена</label>
                        <select id="rating"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-400 focus:ring focus:ring-orange-400 focus:ring-opacity-50">
                            <option value="">Све оцене</option>
                            <option value="5">5 звездица</option>
                            <option value="4">4+ звездице</option>
                            <option value="3">3+ звездице</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <button class="bg-orange-400 text-white py-2 px-6 rounded-md font-semibold shadow-md transition-all duration-300 hover:bg-orange-500 hover:scale-105">
                        Примени филтере
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Пример: Итерирање кроз колекцију продавница --}}
                @forelse ($shops as $shop)
                    <x-shop-card :shop="$shop" class="animate-fade-in-up opacity-0" style="animation-delay: {{ 0.3 + $loop->index * 0.1 }}s;" />
                @empty
                    <p class="col-span-full text-center text-gray-600 text-lg py-10">Тренутно нема доступних продавница.</p>
                @endforelse
            </div>

            @if ($shops->hasPages())
                <div class="mt-10 animate-fade-in-up opacity-0" style="animation-delay: {{ 0.3 + count($shops) * 0.1 + 0.1 }}s;">
                    {{ $shops->links() }} {{-- Ово користи Laravel-ов подразумевани Tailwind пагинатор --}}
                </div>
            @endif
        </div>
    </main>

    <x-footer />

    @vite('resources/js/app.js')
</body>
</html>
