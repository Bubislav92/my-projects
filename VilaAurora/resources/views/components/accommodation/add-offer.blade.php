<section class="py-20 lg:py-24 bg-primary-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <h2 class="text-4xl font-serif font-bold text-accent-500 mb-12">
            Свеобухватни Луксуз
        </h2>

        <div class="grid md:grid-cols-4 gap-10 text-center">
            
            {{-- Погодност 1: Базен --}}
            <div class="space-y-3">
                <span class="text-5xl text-accent-500 block">🏊</span>
                <h3 class="text-xl font-bold text-primary-50">Приватни Базен</h3>
                <p class="text-primary-50/80 text-sm">
                    Неограничено коришћење базена и лежаљки током боравка.
                </p>
            </div>

            {{-- Погодност 2: Доручак --}}
            <div class="space-y-3">
                 <span class="text-5xl text-accent-500 block">🍳</span>
                <h3 class="text-xl font-bold text-primary-50">Гурмански Доручак</h3>
                <p class="text-primary-50/80 text-sm">
                    Свеж и богат доручак се сервира директно у апартман.
                </p>
            </div>

            {{-- Погодност 3: Паркинг --}}
            <div class="space-y-3">
                <span class="text-5xl text-accent-500 block">🚗</span>
                <h3 class="text-xl font-bold text-primary-50">Обезбеђен Паркинг</h3>
                <p class="text-primary-50/80 text-sm">
                    Бесплатан и сигуран паркинг у оквиру имања виле.
                </p>
            </div>

            {{-- Погодност 4: WiFi --}}
            <div class="space-y-3">
                <span class="text-5xl text-accent-500 block">📶</span>
                <h3 class="text-xl font-bold text-primary-50">High-Speed WiFi</h3>
                <p class="text-primary-50/80 text-sm">
                    Брза интернет веза доступна у свим просторијама виле.
                </p>
            </div>
            
        </div>
        
        <div class="mt-12">
            <a href="{{ route('appointment') }}" class="inline-flex items-center text-accent-500 hover:text-white font-semibold transition duration-300">
                Погледајте комплетан списак погодности
            </a>
        </div>
        
    </div>
</section>