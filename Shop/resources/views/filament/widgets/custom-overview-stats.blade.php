<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

            <!-- Payments -->
            <div class="p-6 rounded-2xl bg-emerald-100 text-emerald-800 
                        shadow-sm transition hover:shadow-lg hover:bg-emerald-200">
                <div class="flex items-center space-x-4">
                    <x-heroicon-o-currency-dollar class="w-8 h-8 text-emerald-600" />
                    <div>
                        <div class="text-sm font-medium">Total Payments</div>
                        <div class="text-2xl font-bold">{{ \App\Models\Order::where('payment_status', 'paid')->count() }}</div>
                    </div>
                </div>
            </div>

            <!-- Orders -->
            <div class="p-6 rounded-2xl bg-sky-100 text-sky-800 
                        shadow-sm transition hover:shadow-lg hover:bg-sky-200">
                <div class="flex items-center space-x-4">
                    <x-heroicon-o-shopping-bag class="w-8 h-8 text-sky-600" />
                    <div>
                        <div class="text-sm font-medium">Total Orders</div>
                        <div class="text-2xl font-bold">{{ \App\Models\Order::count() }}</div>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="p-6 rounded-2xl bg-violet-100 text-violet-800 
                        shadow-sm transition hover:shadow-lg hover:bg-violet-200">
                <div class="flex items-center space-x-4">
                    <x-heroicon-o-users class="w-8 h-8 text-violet-600" />
                    <div>
                        <div class="text-sm font-medium">Total Users</div>
                        <div class="text-2xl font-bold">{{ \App\Models\User::count() }}</div>
                    </div>
                </div>
            </div>

            <!-- Blog posts -->
            <div class="p-6 rounded-2xl bg-amber-100 text-amber-800 
                        shadow-sm transition hover:shadow-lg hover:bg-amber-200">
                <div class="flex items-center space-x-4">
                    <x-heroicon-o-document-text class="w-8 h-8 text-amber-600" />
                    <div>
                        <div class="text-sm font-medium">Total Blog Posts</div>
                        <div class="text-2xl font-bold">{{ \App\Models\BlogPost::count() }}</div>
                    </div>
                </div>
            </div>

        </div>
    </x-filament::card>
</x-filament::widget>
