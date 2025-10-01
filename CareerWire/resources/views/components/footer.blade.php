<footer class="bg-gray-800 mt-12 border-t border-carrerwire-green-dark">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            
            {{-- Секција 1: О CareerWire-у --}}
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-carrerwire-green">
                    CareerWire
                </h3>
                <p class="mt-4 text-sm text-gray-400">
                    Платформа за професионално повезивање и развој каријере. Изградите своју мрежу и пронађите нове могућности.
                </p>
                <div class="mt-4 flex space-x-4">
                    {{-- Овде додајте иконе друштвених мрежа (Facebook, Twitter, LinkedIn...) --}}
                    {{-- ... --}}
                </div>
            </div>

            {{-- Секција 2: Преглед (Explore) --}}
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-200">
                    Преглед
                </h3>
                <ul role="list" class="mt-4 space-y-4">
                    <li><a href="{{ route('home') }}" class="text-base text-gray-400 hover:text-white">Почетна (Фид)</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Мрежа</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Послови</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Учење</a></li>
                </ul>
            </div>

            {{-- Секција 3: Компанија --}}
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-200">
                    Компанија
                </h3>
                <ul role="list" class="mt-4 space-y-4">
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">О нама</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Каријера</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">За послодавце</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Подршка</a></li>
                </ul>
            </div>

            {{-- Секција 4: Правне одредбе --}}
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-200">
                    Правно
                </h3>
                <ul role="list" class="mt-4 space-y-4">
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Услови коришћења</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Политика приватности</a></li>
                    <li><a href="#" class="text-base text-gray-400 hover:text-white">Политика колачића</a></li>
                </ul>
            </div>
            
        </div>

        {{-- Доња линија и ауторска права --}}
        <div class="mt-12 border-t border-gray-700 pt-8">
            <p class="text-base text-gray-400 xl:text-center">
                &copy; {{ date('Y') }} CareerWire. Сва права задржана.
            </p>
        </div>
        
    </div>
</footer>