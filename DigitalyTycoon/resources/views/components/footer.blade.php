<footer class="bg-secondary-dark text-text-light py-12 mt-24">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">

        <div data-aos="fade-up" data-aos-delay="100">
            <h4 class="text-xl font-bold text-accent mb-4">DigitalyTycoon</h4>
            <p class="text-sm">
                {{ __('home_page.footer_description') }}
            </p>
        </div>

        <div data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-xl font-bold text-accent mb-4">{{ __('home_page.footer_links') }}</h4>
            <ul class="space-y-2">
                <a href="{{ route('home') }}" class="hover:text-accent transition duration-300">{{ __('home_page.home') }}</a>
                <li><a href="{{ route('about') }}" class="hover:text-accent transition duration-300">{{ __('home_page.about') }}</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-accent transition duration-300">{{ __('home_page.services') }}</a></li>
                <li><a href="{{ route('portfolio') }}" class="hover:text-accent transition duration-300">{{ __('home_page.portfolio') }}</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-accent transition duration-300">{{ __('home_page.contact') }}</a></li>
            </ul>
        </div>

        <div data-aos="fade-up" data-aos-delay="300">
            <h4 class="text-xl font-bold text-accent mb-4">{{ __('home_page.footer_contact') }}</h4>
            <p class="text-sm">
                {{ __('home_page.footer_address') }} Digitalnog Tigra 10, Novi Beograd<br>
                {{ __('home_page.footer_email') }} info@digitalytycoon.com<br>
                {{ __('home_page.footer_phone') }} +381 11 123 4567
            </p>
            <div class="flex space-x-4 mt-4 text-2xl">
                <a href="#" class="hover:text-accent transition duration-300"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-accent transition duration-300"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-accent transition duration-300"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="hover:text-accent transition duration-300"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div data-aos="fade-up" data-aos-delay="400">
            <h4 class="text-xl font-bold text-accent mb-4">{{ __('home_page.footer_partners') }}</h4>
            <div class="grid grid-cols-2 gap-4">
                <a href="https://panel.unlimited.rs/aff.php?aff=578" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('storage/logo/unlimited.rs_logo.svg') }}" alt="Logo saradnika 1" class="w-full h-auto rounded-md shadow-md hover:scale-105 transition-transform duration-300">
                </a>
                <a href="https://www.upwork.com/freelancers/~01c11d44fbe644e06b?mp_source=share" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('storage/logo/Upwork-logo.svg') }}" alt="Logo saradnika 2" class="w-full h-auto rounded-md shadow-md hover:scale-105 transition-transform duration-300">
                </a>
                </div>
        </div>

    </div>

    <div class="container mx-auto px-4 mt-8 pt-8 border-t border-gray-700 text-center">
        <p class="text-sm">&copy; <span id="current-year"></span> DigitalyTycoon. {{ __('home_page.footer_rights') }}</p>
    </div>

</footer>
