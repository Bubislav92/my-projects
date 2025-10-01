<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 flex justify-between items-center">
        
        {{-- Лого --}}
        <a href="{{ url('/') }}" class="text-2xl font-extrabold text-carrerwire-green-dark">
            CareerWire
        </a>
        
        {{-- Дугмад за Аутентификацију --}}
        <nav class="flex space-x-4">
            
            {{-- Дугме: Пронађи Посао (Секундарни CTA) --}}
            <a href="#" class="px-4 py-2 text-sm font-semibold text-gray-700 rounded-full hover:bg-gray-100 transition duration-150">
                Пронађи посао
            </a>
            
            {{-- Дугме: Пријава --}}
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 rounded-full border border-gray-400 hover:bg-gray-100 transition duration-150">
                Пријава
            </a>

            {{-- Дугме: Регистрација (Примарни CTA) --}}
            <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold rounded-full text-white bg-carrerwire-green hover:bg-carrerwire-green-dark transition duration-150">
                Региструј се
            </a>
        </nav>
        
    </div>
</header>