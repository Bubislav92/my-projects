<section class="bg-white py-8 md:py-12 border-b border-gray-200">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex flex-col md:flex-row items-center justify-between">
            
            {{-- Category Filter (Dropdown) --}}
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <label for="category" class="sr-only">Filter by Category</label>
                <select id="category" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green">
                    <option value="">All Categories</option>
                    <option value="ui-kits">UI Kits</option>
                    <option value="fonts">Fonts</option>
                    <option value="templates">Templates</option>
                    <option value="icons">Icons</option>
                </select>
            </div>
            
            {{-- Search Bar --}}
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <label for="search" class="sr-only">Search Products</label>
                <input type="text" id="search" placeholder="Search for products..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green">
            </div>

            {{-- Sort By (Dropdown) --}}
            <div class="w-full md:w-1/3">
                <label for="sort" class="sr-only">Sort By</label>
                <select id="sort" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green">
                    <option value="latest">Latest</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                </select>
            </div>
            
        </div>
    </div>
</section>