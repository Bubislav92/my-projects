<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>All Products - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/cart-modal.js', 'resources/js/wishlist-modal.js'])

</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('products.all_products') }}</h1>

        <div class="flex flex-col md:flex-row gap-8">
            {{-- Филтери - Лева бочна трака --}}
            <aside class="md:w-1/4 bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-semibold text-dark-gray mb-4">{{ __('filter.filters') }}</h2>

                {{-- Glavna forma za sve filtere --}}
                <form method="GET" action="{{ route('products.index') }}">

                {{-- Филтер по категоријама --}}
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-dark-gray mb-3">{{ __('filter.categories') }}</h3>
                    <div class="relative">
                        <div id="custom-category-select" class="relative">
                            {{-- Dugme/Prikaz trenutno odabrane opcije --}}
                            <button type="button"
                                    class="flex items-center justify-between w-full
                                        bg-white border-2 border-dark-gray/20
                                        hover:border-primary-green-dark
                                        px-4 py-2 pr-8 rounded-md
                                        shadow-md
                                        leading-tight
                                        focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-offset-2 focus:ring-opacity-75
                                        transition duration-200 text-dark-gray cursor-pointer"
                                    aria-haspopup="listbox" aria-expanded="false" aria-labelledby="category-label"
                                    data-current-selection="{{ request('category_slug', '') }}">
                                <span id="category-label" class="truncate">
                                    {{-- Prikaz izabrane kategorije ili "All Categories" --}}
                                    @php
                                        $selectedCategoryName = 'All Categories';
                                        if (request()->filled('category_slug')) {
                                            foreach ($categories as $cat) {
                                                if ($cat->slug == request('category_slug')) {
                                                    $selectedCategoryName = $cat->name;
                                                    break;
                                                }
                                            }
                                        }
                                    @endphp
                                    {{ $selectedCategoryName }}
                                </span>
                                {{-- Ikona strelice --}}
                                <svg class="h-4 w-4 text-dark-gray ml-2 transition-transform duration-200 transform rotate-0"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 6.757 7.586 5.343 9l4.5 4.5z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            {{-- Opcije padajućeg menija --}}
                            <div class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 ring-1 ring-black ring-opacity-5 focus:outline-none
                                        hidden" role="listbox" aria-labelledby="category-label" id="category-options">
                                {{-- "All Categories" opcija --}}
                                <div class="text-dark-gray cursor-pointer select-none relative py-2 pl-3 pr-9
                                            hover:bg-primary-green hover:text-white rounded-md mx-1 my-0.5
                                            transition duration-150 ease-in-out
                                            {{ !request()->filled('category_slug') ? 'bg-primary-green text-white font-semibold' : '' }}"
                                    data-value="" data-route="{{ route('products.index', request()->except('category_slug', 'page')) }}">
                                    {{ __('filter.all_categories') }}
                                </div>

                                {{-- Dinamički učitane kategorije --}}
                                @foreach ($categories as $category)
                                    <div class="text-dark-gray cursor-pointer select-none relative py-2 pl-3 pr-9
                                                hover:bg-primary-green hover:text-white rounded-md mx-1 my-0.5
                                                transition duration-150 ease-in-out
                                                {{ request('category_slug') == $category->slug ? 'bg-primary-green text-white font-semibold' : '' }}"
                                        data-value="{{ $category->slug }}"
                                        data-route="{{ route('products.index', array_merge(request()->except('page'), ['category_slug' => $category->slug])) }}">
                                        {{ $category->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const allCategoriesText = "{{ __('filter.all_categories') }}";

                document.addEventListener('DOMContentLoaded', function() {
                    const customSelect = document.getElementById('custom-category-select');
                    const selectButton = customSelect.querySelector('button');
                    const optionsContainer = customSelect.querySelector('#category-options');
                    const currentSelectionSpan = selectButton.querySelector('span');
                    const arrowIcon = selectButton.querySelector('svg');

                    // Otvaranje/zatvaranje padajućeg menija
                    selectButton.addEventListener('click', function() {
                        const isExpanded = selectButton.getAttribute('aria-expanded') === 'true';
                        selectButton.setAttribute('aria-expanded', !isExpanded);
                        optionsContainer.classList.toggle('hidden', isExpanded);
                        arrowIcon.classList.toggle('rotate-180', !isExpanded); // Rotiraj strelicu
                    });

                    // Klik na opciju
                    optionsContainer.addEventListener('click', function(event) {
                        const selectedOption = event.target.closest('div[data-value]');
                        if (selectedOption) {
                            const route = selectedOption.dataset.route;
                            window.location.href = route; // Preusmeri na novu URL-u sa filterom
                        }
                    });

                    // Zatvaranje menija kada se klikne van njega
                    document.addEventListener('click', function(event) {
                        if (!customSelect.contains(event.target)) {
                            selectButton.setAttribute('aria-expanded', 'false');
                            optionsContainer.classList.add('hidden');
                            arrowIcon.classList.remove('rotate-180');
                        }
                    });

                    // Prikazivanje trenutno odabrane opcije na dugmetu
                    const initialSelectedValue = selectButton.dataset.currentSelection;
                    if (initialSelectedValue === '') {
                        currentSelectionSpan.textContent = allCategoriesText;
                    } else {
                        const initialSelectedOption = optionsContainer.querySelector(`div[data-value="${initialSelectedValue}"]`);
                        if (initialSelectedOption) {
                            currentSelectionSpan.textContent = initialSelectedOption.textContent.trim();
                        }
                    }
                });
                </script>

                {{-- Филтер: Бренд/Произвођач --}}
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-dark-gray mb-3">{{ __('filter.all_brands') }}</h3>
                    <div class="relative">
                        <div id="custom-brand-select" class="relative">
                            {{-- Dugme/Prikaz trenutno odabrane opcije --}}
                            <button type="button"
                                    class="flex items-center justify-between w-full
                                        bg-white border-2 border-dark-gray/20
                                        hover:border-primary-green-dark
                                        px-4 py-2 pr-8 rounded-md
                                        shadow-md
                                        leading-tight
                                        focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-offset-2 focus:ring-opacity-75
                                        transition duration-200 text-dark-gray cursor-pointer"
                                    aria-haspopup="listbox" aria-expanded="false" aria-labelledby="brand-label"
                                    data-current-selection="{{ request('brand', '') }}">
                                <span id="brand-label" class="truncate">
                                    {{-- Prikaz izabranog brenda ili "All Brands" --}}
                                    @php
                                        $selectedBrandName = __('filter.all_brands');
                                        if (request()->filled('brand')) {
                                            $selectedBrandName = request('brand');
                                        }
                                    @endphp
                                    {{ $selectedBrandName }}
                                </span>
                                {{-- Ikona strelice --}}
                                <svg class="h-4 w-4 text-dark-gray ml-2 transition-transform duration-200 transform rotate-0"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 6.757 7.586 5.343 9l4.5 4.5z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            {{-- Opcije padajućeg menija --}}
                            <div class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 ring-1 ring-black ring-opacity-5 focus:outline-none
                                        hidden" role="listbox" aria-labelledby="brand-label" id="brand-options">
                                {{-- "All Brands" opcija --}}
                                <div class="text-dark-gray cursor-pointer select-none relative py-2 pl-3 pr-9
                                            hover:bg-primary-green hover:text-white rounded-md mx-1 my-0.5
                                            transition duration-150 ease-in-out
                                            {{ !request()->filled('brand') ? 'bg-primary-green text-white font-semibold' : '' }}"
                                    data-value="" data-route="{{ route('products.index', request()->except('brand', 'page')) }}">
                                    {{ __('filter.all_brands') }}
                                </div>

                                {{-- Dinamički učitani brendovi --}}
                                @foreach ($availableBrands as $brand)
                                    <div class="text-dark-gray cursor-pointer select-none relative py-2 pl-3 pr-9
                                                hover:bg-primary-green hover:text-white rounded-md mx-1 my-0.5
                                                transition duration-150 ease-in-out
                                                {{ request('brand') == $brand ? 'bg-primary-green text-white font-semibold' : '' }}"
                                        data-value="{{ $brand }}"
                                        data-route="{{ route('products.index', array_merge(request()->except('page'), ['brand' => $brand])) }}">
                                        {{ $brand }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const allBrandsText = "{{ __('filter.all_brands') }}";

                document.addEventListener('DOMContentLoaded', function() {
                    // JavaScript za Brand filter
                    const customBrandSelect = document.getElementById('custom-brand-select');
                    const brandSelectButton = customBrandSelect.querySelector('button');
                    const brandOptionsContainer = customBrandSelect.querySelector('#brand-options');
                    const brandCurrentSelectionSpan = brandSelectButton.querySelector('span');
                    const brandArrowIcon = brandSelectButton.querySelector('svg');

                    // Otvaranje/zatvaranje padajućeg menija
                    brandSelectButton.addEventListener('click', function() {
                        const isExpanded = brandSelectButton.getAttribute('aria-expanded') === 'true';
                        brandSelectButton.setAttribute('aria-expanded', !isExpanded);
                        brandOptionsContainer.classList.toggle('hidden', isExpanded);
                        brandArrowIcon.classList.toggle('rotate-180', !isExpanded); // Rotiraj strelicu
                    });

                    // Klik na opciju
                    brandOptionsContainer.addEventListener('click', function(event) {
                        const selectedOption = event.target.closest('div[data-value]');
                        if (selectedOption) {
                            const route = selectedOption.dataset.route;
                            window.location.href = route; // Preusmeri na novu URL-u sa filterom
                        }
                    });

                    // Zatvaranje menija kada se klikne van njega
                    document.addEventListener('click', function(event) {
                        if (!customBrandSelect.contains(event.target)) {
                            brandSelectButton.setAttribute('aria-expanded', 'false');
                            brandOptionsContainer.classList.add('hidden');
                            brandArrowIcon.classList.remove('rotate-180');
                        }
                    });

                    // Prikazivanje trenutno odabrane opcije na dugmetu
                    const initialSelectedBrandValue = brandSelectButton.dataset.currentSelection;
                    if (initialSelectedBrandValue === '') {
                        brandCurrentSelectionSpan.textContent = allBrandsText;
                    } else {
                        const initialSelectedBrandOption = brandOptionsContainer.querySelector(`div[data-value="${initialSelectedBrandValue}"]`);
                        if (initialSelectedBrandOption) {
                            brandCurrentSelectionSpan.textContent = initialSelectedBrandOption.textContent.trim();
                        }
                    }
                });
                </script>

                    {{-- Филтер: Боја --}}
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-dark-gray mb-3">{{ __('filter.color') }}</h3>
                        {{-- Izmenjena klasa sa "grid-cols-3" na "grid-cols-2" --}}
                        <div class="grid grid-cols-2 gap-2">
                            @php
                                $colorsToDisplay = isset($availableColors) ? $availableColors : ['black', 'white', 'gray', 'blue', 'red', 'green', 'orange', 'yellow'];
                            @endphp
                            @foreach ($colorsToDisplay as $color)
                                <label class="inline-flex items-center cursor-pointer p-2 rounded-md
                                            transition duration-300 ease-in-out transform
                                            hover:shadow-md hover:scale-105 hover:bg-light-gray
                                            {{ in_array($color, (array)request('color', [])) ? 'bg-primary-green text-white font-semibold hover:text-white' : 'text-dark-gray' }}
                                            relative group">

                                    <input type="checkbox" name="color[]" value="{{ $color }}"
                                        class="form-checkbox text-primary-green rounded focus:ring-primary-green hidden peer"
                                        {{ in_array($color, (array)request('color', [])) ? 'checked' : '' }}
                                        onchange="this.form.submit()">

                                    <span class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center
                                                @if($color == 'black') bg-black @elseif($color == 'white') bg-white @elseif($color == 'gray') bg-gray-500 @elseif($color == 'blue') bg-blue-500 @elseif($color == 'red') bg-red-500 @elseif($color == 'green') bg-primary-green @elseif($color == 'orange') bg-orange-500 @elseif($color == 'yellow') bg-yellow-400 @endif
                                                peer-checked:border-primary-green peer-checked:ring-2 peer-checked:ring-primary-green peer-checked:ring-offset-2
                                                transition duration-200 ease-in-out"
                                                title="{{ ucfirst($color) }}">
                                    </span>
                                    <span class="ml-2 text-sm font-medium">{{ ucfirst($color) }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Филтер: Оцена (Rating) --}}
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-dark-gray mb-3">{{ __('filter.customer_review') }}</h3>
                        {{-- Forma za filter ocenjivanja --}}
                        <form method="GET" action="{{ route('products.index') }}" id="ratingFilterForm">
                            {{-- Prosleđujemo sve ostale trenutne filtere da se ne izgube --}}
                            @foreach(request()->except(['rating', 'page']) as $key => $value)
                                @if(is_array($value))
                                    @foreach($value as $item)
                                        <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach

                            <div class="space-y-2">
                                {{-- "Any Rating" opcija --}}
                                <label class="flex items-center cursor-pointer p-2 rounded-md
                                            transition duration-300 ease-in-out
                                            hover:shadow-md hover:scale-105 hover:bg-light-gray
                                            {{ !request()->filled('rating') ? 'bg-primary-green text-white font-semibold hover:text-white' : 'text-dark-gray' }}">
                                    <input type="radio" name="rating" value=""
                                        class="form-radio h-4 w-4 text-primary-green border-gray-300 focus:ring-primary-green"
                                        onchange="this.form.submit()"
                                        {{ !request()->filled('rating') ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm font-medium">{{ __('filter.any_rating') }}</span>
                                </label>

                                @php $ratings = [5, 4, 3, 2, 1]; @endphp {{-- Оцене од 5 до 1 --}}
                                @foreach ($ratings as $rating)
                                    <label class="flex items-center cursor-pointer p-2 rounded-md
                                                transition duration-300 ease-in-out
                                                hover:shadow-md hover:scale-105 hover:bg-light-gray
                                                {{ request('rating') == $rating ? 'bg-primary-green text-white font-semibold hover:text-white' : 'text-dark-gray' }}">
                                        <input type="radio" name="rating" value="{{ $rating }}"
                                            class="form-radio h-4 w-4 text-primary-green border-gray-300 focus:ring-primary-green"
                                            onchange="this.form.submit()"
                                            {{ request('rating') == $rating ? 'checked' : '' }}>
                                        <span class="ml-2 flex items-center text-sm font-medium">
                                            {{-- Prikaz zvezdica: Samo žute zvezdice do vrednosti $rating --}}
                                            @for ($i = 1; $i <= $rating; $i++)
                                                <i class="fa-solid fa-star text-yellow-400"></i>
                                            @endfor
                                            
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </form>
                    </div>

                    {{-- Филтер по распону цене --}}
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-dark-gray mb-3">{{ __('filter.price_range') }}</h3>
                        {{-- Promenjen input type na "number" umesto "range" za precizniji unos, ili koristite JavaScript za range slider --}}
                        {{-- Ako želite slider, potrebno je malo JS-a ili samo za prikaz vrednosti. Za sada idemo na osnovni input. --}}
                        <div class="flex gap-2 mb-2">
                            <input type="number" name="min_price" placeholder="Min"
                                   class="w-1/2 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-green"
                                   value="{{ request('min_price') }}">
                            <input type="number" name="max_price" placeholder="Max"
                                   class="w-1/2 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-green"
                                   value="{{ request('max_price') }}">
                        </div>
                    </div>


                    {{-- Филтер: Доступност --}}
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-dark-gray mb-3">{{ __('filter.availability') }}</h3>
                        <div class="flex flex-col space-y-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" id="in_stock" name="availability[]" value="in_stock"
                                       class="form-checkbox text-primary-green rounded focus:ring-primary-green"
                                       {{ in_array('in_stock', (array)request('availability', [])) ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">{{ __('filter.in_stock') }}</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" id="on_sale" name="availability[]" value="on_sale"
                                       class="form-checkbox text-primary-green rounded focus:ring-primary-green"
                                       {{ in_array('on_sale', (array)request('availability', [])) ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">{{ __('filter.on_sale') }}</span>
                            </label>
                        </div>
                    </div>

                    {{-- Дугме за примену филтера --}}
                    <button type="submit" class="w-full bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50">
                        {{ __('filter.apply_filters') }}
                    </button>

                    {{-- Дугме за ресетовање филтера (приказује се ако постоји барем један активни филтер) --}}
                    @if(count(request()->except(['page', '_token'])) > 0)
                        <a href="{{ route('products.index') }}" class="w-full block text-center mt-3 bg-gray-200 text-dark-gray font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-gray-300 transition duration-300 ease-in-out">
                            {{ __('filter.clear_filters') }}
                        </a>
                    @endif
                </form>
            </aside>

            {{-- Главни садржај: Листа производа и Сортирање --}}
            <section class="md:w-3/4">
                {{-- Сортирање - Стилизовани падајући мени --}}
                <div class="flex justify-end mb-6">
                    <div class="relative inline-block text-left">
                        <form method="GET" action="{{ route('products.index') }}" id="sortForm">
                            {{-- Prosleđujemo sve trenutne filtere da se ne izgube prilikom sortiranja --}}
                            @foreach(request()->except(['sort_by', 'sort_order', 'page']) as $key => $value)
                                @if(is_array($value))
                                    @foreach($value as $item)
                                        <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach

                            <select name="sort_by" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded-md shadow-sm leading-tight focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-200 text-dark-gray" onchange="this.form.submit()">
                                <option value="created_at" {{ request('sort_by', 'created_at') == 'created_at' && request('sort_order', 'desc') == 'desc' ? 'selected' : '' }}>{{ __('filter.sort_by_newest') }}</option>
                                <option value="price_asc" {{ request('sort_by') == 'price' && request('sort_order') == 'asc' ? 'selected' : '' }}>{{ __('filter.sort_by_price_asc') }}</option>
                                <option value="price_desc" {{ request('sort_by') == 'price' && request('sort_order') == 'desc' ? 'selected' : '' }}>{{ __('filter.sort_by_price_desc') }}</option>
                                <option value="name_asc" {{ request('sort_by') == 'name' && request('sort_order') == 'asc' ? 'selected' : '' }}>{{ __('filter.sort_by_name_asc') }}</option>
                                <option value="name_desc" {{ request('sort_by') == 'name' && request('sort_order') == 'desc' ? 'selected' : '' }}>{{ __('filter.sort_by_name_desc') }}</option>
                                <option value="average_rating_desc" {{ request('sort_by') == 'average_rating' && request('sort_order') == 'desc' ? 'selected' : '' }}>{{ __('filter.sort_by_top_rated') }}</option>
                            </select>
                            {{-- Skrivena polja za sort_by i sort_order će se automatski postaviti JS-om iz value atributa selekta --}}
                            <input type="hidden" name="sort_order" value="{{ request('sort_order', 'desc') }}">
                            <input type="hidden" name="sort_by" value="{{ request('sort_by', 'created_at') }}">
                        </form>
                        {{-- Иконица стрелице за падајући мени --}}
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 6.757 7.586 5.343 9l4.5 4.5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Грид са производима --}}
                @if($products->isEmpty())
                    <div class="text-center py-10 bg-white rounded-xl shadow-md">
                        <i class="fa-solid fa-box-open text-gray-400 text-6xl mb-4"></i>
                        <p class="text-xl text-gray-600 mb-4">{{ __('products.no_products_found') }}</p>
                        <a href="{{ route('products.index') }}" class="inline-block bg-primary-green text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 mt-4">
                            {{ __('filter.clear_filters') }}
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col">
                                <a href="{{ route('products.show', $product->slug) }}"> {{-- Link ka stranici sa detaljima proizvoda --}}
                                    @php
                                        $mainProductImageUrl = $product->getFirstMediaUrl('product_images', 'thumb');
                                    @endphp

                                    @if($mainProductImageUrl)
                                        <img src="{{ $mainProductImageUrl }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                    @else
                                        <img src="https://via.placeholder.com/400x300/F5F5F5/333333?text=No+Product+Image"
                                            alt="No image available for {{ $product->name }}"
                                            class="w-full h-48 object-cover rounded-t-xl">
                                    @endif
                                </a>
                                <div class="p-4 flex-grow flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-dark-gray mb-1 truncate">
                                            <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary-green">{{ $product->name }}</a>
                                        </h3>
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
                                    </div>
                                    <div class="flex items-center gap-2 mt-4">
                                        <form action="{{ route('cart.store') }}" method="POST" class="w-1/2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                        
                                            <button type="submit" class="w-full bg-primary-green text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                                                <i class="fa-solid fa-cart-plus mr-1"></i> {{ __('product_card.add_to_cart') }}
                                            </button>
                                        </form>
                                        <form action="{{ route('wishlist.store') }}" method="POST" class="w-1/2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    
                                            <button type="submit" class="w-full bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105 text-sm">
                                                <i class="fa-solid fa-heart mr-1"></i> {{ __('product_card.add_to_wishlist') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Пагинација --}}
                    <div class="mt-10 flex justify-center">
                        {{ $products->links() }}
                    </div>
                @endif
            </section>
        </div>
    </main>

    {{-- index.blade.php --}}

    {{-- ... (Vaš postojeći glavni sadržaj, sekcija proizvoda i paginacija) ... --}}

    {{-- Modal za potvrdu dodavanja u korpu (skriven po defaultu) --}}
    {{-- Modal za potvrdu dodavanja u korpu (skriven po defaultu) --}}
    <div id="addToCartModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full relative">
            <h3 class="text-xl font-semibold text-dark-gray mb-4">{{ __('cart_modal.product_added') }}</h3>

            <div id="modalProductDetails" class="flex items-center mb-4">
                {{-- Detalji proizvoda će biti popunjeni JS-om --}}
            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('components.cart') }}" class="bg-primary-green text-white px-5 py-2 rounded-md font-medium text-center
                                                      hover:bg-primary-green-dark transition duration-200">
                    {{ __('cart_modal.go_to_cart') }}
                </a>
                <button id="continueShoppingBtn" class="bg-gray-200 text-dark-gray px-5 py-2 rounded-md font-medium
                                              hover:bg-gray-300 transition duration-200">
                    {{ __('cart_modal.continue_shopping') }}
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
            <h3 class="text-xl font-semibold text-dark-gray mb-4">{{ __('wishlist_modal.product_added') }}</h3>
    
            <div id="wishlistModalProductDetails" class="flex items-center mb-4">
                {{-- Detalji proizvoda će biti popunjeni JS-om --}}
            </div>
    
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('components.wishlist') }}" class="bg-primary-green text-white px-5 py-2 rounded-md font-medium text-center
                                                          hover:bg-primary-green-dark transition duration-200">
                    {{ __('wishlist_modal.go_to_wishlist') }}
                </a>
                <button id="continueShoppingWishlistBtn" class="bg-gray-200 text-dark-gray px-5 py-2 rounded-md font-medium
                                                  hover:bg-gray-300 transition duration-200">
                    {{ __('wishlist_modal.continue_shopping') }}
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


    {{-- Dodajemo skriptu za automatsko podnošenje forme za sortiranje i parsiranje value atributa --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sortSelect = document.querySelector('select[name="sort_by"]');
            if (sortSelect) {
                sortSelect.addEventListener('change', function() {
                    const [sortBy, sortOrder] = this.value.split('_'); // npr. "price_asc" -> ["price", "asc"]

                    // Pronađi skrivena input polja za sortiranje
                    const hiddenSortBy = document.querySelector('input[name="sort_by"][type="hidden"]');
                    const hiddenSortOrder = document.querySelector('input[name="sort_order"][type="hidden"]');

                    if (sortBy && sortOrder) {
                        hiddenSortBy.value = sortBy;
                        hiddenSortOrder.value = sortOrder;
                    } else { // Ako je value samo npr. "created_at"
                        hiddenSortBy.value = this.value;
                        hiddenSortOrder.value = 'desc'; // Podrazumevano za 'created_at'
                    }

                    this.form.submit();
                });

                // Postavljamo početnu vrednost select boxa na osnovu trenutnih filtera
                const currentSortBy = "{{ request('sort_by', 'created_at') }}";
                const currentSortOrder = "{{ request('sort_order', 'desc') }}";
                let selectedOptionValue = currentSortBy;
                if (currentSortBy !== 'created_at') { // created_at ima samo jedan default smer
                     selectedOptionValue = `${currentSortBy}_${currentSortOrder}`;
                }


                // Proveri da li opcija postoji pre postavljanja vrednosti
                const optionExists = Array.from(sortSelect.options).some(option => option.value === selectedOptionValue);
                if (optionExists) {
                    sortSelect.value = selectedOptionValue;
                } else {
                    // Ako opcija ne postoji (npr. 'created_at' sa 'asc'), postavite default
                    sortSelect.value = 'created_at';
                }
            }
        });
    </script>

    

</body>
</html>