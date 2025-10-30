<section id="featured" class="py-20 bg-background-dark">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Наслов Секције --}}
        <h2 class="text-4xl font-bold text-center text-text-light mb-4 uppercase tracking-wider">
            Featured <span class="text-accent-gold">Exotics</span>
        </h2>
        <p class="text-center text-lg text-border-gray mb-12 max-w-2xl mx-auto">
            A curated selection of the finest automobiles currently available in our showroom.
        </p>

        {{-- Грид са Аутомобилима (Пример за 3 модела) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @php
                $cars = [
                    ['model' => 'Model X-Class', 'price' => '$250,000', 'image' => 'path/to/car1.jpg'],
                    ['model' => 'Phantom GT', 'price' => '$320,000', 'image' => 'path/to/car2.jpg'],
                    ['model' => 'Viper SVR', 'price' => '$185,000', 'image' => 'path/to/car3.jpg'],
                ];
            @endphp

            @foreach ($cars as $car)
                <div class="bg-surface-dark rounded-lg shadow-xl overflow-hidden group hover:shadow-2xl transition duration-500 transform hover:-translate-y-1">
                    {{-- Слика Аутомобила --}}
                    <div class="h-60 overflow-hidden">
                        <img 
                            src="{{ $car['image'] }}" 
                            alt="{{ $car['model'] }}" 
                            class="w-full h-full object-cover group-hover:scale-[1.02] transition duration-500"
                        >
                    </div>

                    {{-- Детаљи --}}
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-text-light mb-2">{{ $car['model'] }}</h3>
                        <p class="text-3xl font-bold text-accent-gold mb-4">{{ $car['price'] }}</p>
                        
                        {{-- Дугме --}}
                        <a href="#" class="block w-full text-center py-3 bg-highlight-blue hover:bg-highlight-blue/80 text-text-light font-semibold rounded-sm transition duration-300 uppercase text-sm tracking-wider">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Дугме за комплетан Инвентар --}}
        <div class="text-center mt-12">
            <a href="#inventory" class="inline-block py-3 px-8 border border-accent-gold text-accent-gold hover:bg-accent-gold hover:text-background-dark font-semibold rounded-sm transition duration-300 uppercase tracking-wider">
                View Full Inventory
            </a>
        </div>
    </div>
</section>