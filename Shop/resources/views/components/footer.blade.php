{{-- resources/views/components/footer.blade.php --}}

<footer class="bg-dark-gray text-light-gray py-8 mt-12 shadow-inner">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
            {{-- Секција 1: О нама --}}
            <div>
                <h3 class="text-xl font-bold text-primary-green mb-4">{{ __('footer.about_us') }}</h3> {{-- О нама --}}
                <p class="text-sm leading-relaxed mb-4">
                    {{ __('footer.footer_text') }}
                </p>
            </div>

            {{-- Секција 2: Линкови --}}
            <div>
                <h3 class="text-xl font-bold text-primary-green mb-4">{{ __('footer.quick_links') }}</h3> {{-- Брзи линкови --}}
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('welcome') }}" class="hover:text-primary-green transition-colors duration-300">{{ __('navigation.home') }}</a></li> {{-- Почетна --}}
                    <li><a href="{{ route('products.index') }}" class="hover:text-primary-green transition-colors duration-300">{{ __('footer.shop') }}</a></li> {{-- Продавница --}}
                    <li><a href="{{ route('contact') }}" class="hover:text-primary-green transition-colors duration-300">{{ __('navigation.contact') }}</a></li> {{-- Контактирајте нас --}}
                    <li><a href="{{ route('faqs') }}" class="hover:text-primary-green transition-colors duration-300">{{ __('navigation.faqs') }}</a></li> {{-- Честа питања --}}
                    <li><a href="{{ route('refund-policy') }}" class="hover:text-primary-green transition-colors duration-300">{{ __('footer.refund_policy') }}</a></li> {{-- Политика поврата новца --}}
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-primary-green transition-colors duration-300">{{ __('footer.privacy_policy') }}</a></li> {{-- Политика приватности --}}
                </ul>
            </div>

            {{-- Секција 3: Контакт --}}
            <div>
                <h3 class="text-xl font-bold text-primary-green mb-4">{{ __('footer.contact') }}</h3> {{-- Контакт --}}
                <p class="text-sm">
                    123 E-commerce Street<br>
                    Belgrade, Serbia<br>
                    Email: <a href="mailto:info@vesnaswebstore.com" class="hover:text-primary-green transition-colors duration-300">info@vesnaswebstore.com</a><br>
                    Phone: <a href="tel:+38111234567" class="hover:text-primary-green transition-colors duration-300">+381 11 234 567</a>
                </p>
            </div>

            {{-- Секција 4: Пратите нас и Платне Методе --}}
            {{-- Секција 4: Пратите нас и Платне Методе --}}
<div>
    <h3 class="text-xl font-bold text-primary-green mb-4">{{ __('footer.follow_us') }}</h3> {{-- Пратите нас --}}
    <div class="flex space-x-4">
        {{-- Ikone društvenih mreža --}}
        <img src="{{ asset('images/logo/2023_Facebook_icon.svg.png') }}" alt="PayPal" class="h-8 max-h-8">
        <img src="{{ asset('images/logo/Instagram_logo_2016.svg') }}" alt="PayPal" class="h-8 max-h-8">
        <img src="{{ asset('images/logo/Tiktok_icon.png') }}" alt="PayPal" class="h-8 max-h-8">
    </div>

    {{-- Платне Методе --}}
    <h3 class="text-xl font-bold text-primary-green mb-4 mt-8">{{ __('footer.payment_methods') }}</h3> {{-- Dodata 'mt-8' klasa ovde --}}
    <div class="flex flex-wrap justify-center md:justify-start gap-4">
        <img src="{{ asset('images/payments/Paypal.png') }}" alt="PayPal" class="h-8 max-h-8">
        <img src="{{ asset('images/payments/Mastercard-logo.svg') }}" alt="MasterCard" class="h-8 max-h-8">
        <img src="{{ asset('images/payments/Maestro_Logo.png') }}" alt="Maestro" class="h-8 max-h-8">
        <img src="{{ asset('images/payments/Visa_Inc.-Logo.svg') }}" alt="Visa" class="h-8 max-h-8">
        <img src="{{ asset('images/payments/American-Express-logo.png') }}" alt="American Express" class="h-8 max-h-8">
        <img src="{{ asset('images/payments/discover.svg') }}" alt="Discover" class="h-8 max-h-8">
    </div>
</div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm">
            <p>&copy; {{ date('Y') }} Vesna's Web Store. {{ __('footer.all_rights_reserved') }}</p>
            {{-- DODATO OVDE --}}
            <p class="mt-2 text-gray-400">{{ __('footer.designed_by') }} <a href="https://www.digitalytycoon.com" target="_blank" rel="noopener noreferrer" class="hover:text-primary-green transition-colors duration-300">Digitaly Tycoon</a></p>
        </div>
    </div>
</footer>