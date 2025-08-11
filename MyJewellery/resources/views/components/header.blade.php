<header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/" class="text-2xl font-serif font-bold text-dark-gray tracking-wide transition-colors duration-300 hover:text-gold">
            My Jewellery
        </a>

        <nav class="hidden md:flex space-x-6">
            <a href="{{ url('/rings') }}" class="text-subtle-gray hover:text-dark-gray transition-colors duration-300 font-sans">Прстење</a>
            <a href="#" class="text-subtle-gray hover:text-dark-gray transition-colors duration-300 font-sans">Огрлице</a>
            <a href="#" class="text-subtle-gray hover:text-dark-gray transition-colors duration-300 font-sans">Наруквице</a>
            <a href="#" class="text-subtle-gray hover:text-dark-gray transition-colors duration-300 font-sans">Минђуше</a>
        </nav>

        <div class="flex items-center space-x-4">
            <a href="#" class="text-subtle-gray hover:text-gold transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 114 0 2 2 0 01-4 0z" />
                </svg>
            </a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-subtle-gray hover:text-gold transition-colors duration-300">Профил</a>
                @else
                    <a href="{{ route('login') }}" class="text-subtle-gray hover:text-gold transition-colors duration-300">Пријава</a>
                @endauth
            @endif
        </div>
    </div>
</header>
