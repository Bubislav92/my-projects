<header class="bg-white shadow-sm sticky top-0 z-50">
  <div class="container mx-auto px-6 py-4 flex items-center justify-between">
    <a href="/" class="flex items-center space-x-2">
      <span class="text-2xl font-bold text-gray-900">Aura Digital</span>
    </a>
    <nav class="hidden md:flex space-x-8">
      <a href="{{ route('services') }}" class="text-lg font-medium text-gray-600 hover:text-blue-700 transition duration-300">Услуге</a>
      <a href="{{ route('portfolio') }}" class="text-lg font-medium text-gray-600 hover:text-blue-700 transition duration-300">Портфолио</a>
      <a href="{{ route('about') }}" class="text-lg font-medium text-gray-600 hover:text-blue-700 transition duration-300">О нама</a>
      <a href="{{ route('contact') }}" class="text-lg font-medium text-gray-600 hover:text-blue-700 transition duration-300">Контакт</a>
    </nav>
    <a href="#contact" class="hidden md:block px-6 py-2 border-2 border-blue-700 text-blue-700 rounded-full font-semibold hover:bg-blue-700 hover:text-white transition duration-300">Започнимо</a>

    <div class="md:hidden">
      <button id="mobile-menu-button">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
      </button>
    </div>
  </div>
</header>
