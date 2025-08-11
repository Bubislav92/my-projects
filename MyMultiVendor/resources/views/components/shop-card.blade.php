@props(['shop'])

<a href="{{ route('shops.show', $shop->slug) }}" {{ $attributes->merge(['class' => 'block bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1']) }}>
    <img src="{{ $shop->image_url ?? 'https://via.placeholder.com/600x400?text=Продавница' }}"
         alt="{{ $shop->name }}"
         class="w-full h-48 object-cover">
    <div class="p-6">
        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $shop->name }}</h3>
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $shop->description ?? 'Опис продавнице није доступан.' }}</p>
        <div class="flex items-center justify-between">
            <div class="flex items-center text-sm text-gray-500">
                {{-- Пример приказа оцене (може бити динамички) --}}
                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.683-1.539 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.565-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69L9.049 2.927z"></path></svg>
                {{ $shop->average_rating ?? 'N/A' }} ({{ $shop->reviews_count ?? 0 }} рецензија)
            </div>
            {{-- Можете додати линк до свих производа продавнице --}}
            <span class="text-sm text-emerald-600 font-semibold">
                {{ $shop->products_count ?? 0 }} производа
            </span>
        </div>
        <div class="mt-4 flex justify-center">
            <span class="inline-block bg-orange-100 text-orange-800 text-xs font-medium px-3 py-1 rounded-full">
                {{ $shop->category ?? 'Опште' }}
            </span>
        </div>
    </div>
</a>
