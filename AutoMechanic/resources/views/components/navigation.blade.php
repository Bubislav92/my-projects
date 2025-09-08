<nav class="bg-primary text-light-gray">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between" data-aos="fade-down">
        <a href="#" class="text-xl font-bold text-secondary">
            Аутосервис
        </a>

        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="hover:text-secondary transition duration-300">Почетна</a>
            <a href="{{ route('services') }}" class="hover:text-secondary transition duration-300">Услуге</a>
            <a href="{{ route('about') }}" class="hover:text-secondary transition duration-300">О нама</a>
            <a href="{{ route('gallery') }}" class="hover:text-secondary transition duration-300">Галерија</a>
        </div>

        <a href="{{ route('contact') }}" class="bg-secondary text-primary font-bold py-2 px-4 rounded-full hover:bg-accent transition duration-300">
            Закажите термин
        </a>
    </div>
</nav>