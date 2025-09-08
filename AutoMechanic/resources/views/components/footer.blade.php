<footer class="bg-dark-gray text-light-gray py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            
            <div>
                <h4 class="text-xl font-bold text-secondary mb-4">Контактирајте нас</h4>
                <p class="text-sm">
                    <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                    Улица слободе 123, Београд
                </p>
                <p class="text-sm mt-2">
                    <i class="fas fa-phone-alt text-accent mr-2"></i>
                    Телефон: <a href="tel:+381641234567" class="hover:text-secondary">+381 64 123 4567</a>
                </p>
                <p class="text-sm mt-2">
                    <i class="fas fa-envelope text-accent mr-2"></i>
                    Е-пошта: <a href="mailto:info@automehanika.rs" class="hover:text-secondary">info@automehanika.rs</a>
                </p>
            </div>
            
            <div>
                <h4 class="text-xl font-bold text-secondary mb-4">Брзи линкови</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('services') }}" class="text-sm hover:text-secondary transition-colors">Наше услуге</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm hover:text-secondary transition-colors">О нама</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-sm hover:text-secondary transition-colors">Галерија</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm hover:text-secondary transition-colors">Контакт</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-bold text-secondary mb-4">Пратите нас</h4>
                <div class="flex justify-center md:justify-start space-x-4 mb-6">
                    <a href="#" class="text-light-gray hover:text-secondary transition-colors text-2xl" aria-label="Facebook">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="#" class="text-light-gray hover:text-secondary transition-colors text-2xl" aria-label="Instagram">
                        <i class="fab fa-instagram-square"></i>
                    </a>
                    <a href="#" class="text-light-gray hover:text-secondary transition-colors text-2xl" aria-label="Twitter">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                </div>
            </div>

        </div>

        <hr class="border-t border-gray-700 my-8">

        <div class="text-center text-sm">
            <p>&copy; {{ date('Y') }} Аутосервис. Сва права задржана.</p>
            <p class="mt-2">Дизајнирао и имплементирао: <a href="http://www.digitalytycoon.com" class="hover:text-secondary transition-colors"> Digitaly Tycoon</a></p>
        </div>
    </div>
</footer>