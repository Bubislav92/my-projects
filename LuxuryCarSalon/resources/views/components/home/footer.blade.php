<footer class="bg-surface-dark border-t border-border-gray pt-16 pb-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Главна секција Футера - Распоред колона --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 lg:gap-16">

            {{-- 1. ЛОГО и Контакт --}}
            <div class="md:col-span-2 space-y-6">
                {{-- Лого --}}
                <a href="/" class="flex-shrink-0">
                    <span class="text-3xl font-extrabold tracking-widest text-text-light uppercase">
                        <span class="text-accent-gold">L</span>UXURY<span class="text-accent-gold">.</span>
                    </span>
                </a>
                
                <p class="text-border-gray text-sm max-w-sm">
                    Experience the pinnacle of automotive excellence. Your journey to luxury starts here.
                </p>

                {{-- Социјалне мреже --}}
                <div class="flex space-x-4 pt-2">
                    @php
                        // Дефиниција линкова за друштвене мреже (можете додати праве УРЛ-ове)
                        $socials = [
                            ['icon' => 'M16 8a6 6 0 016 6v7H18v-7a3 3 0 00-6 0v7H9v-7a6 6 0 016-6zM3 17h3v-7H3v7zm0-9h3V1h-3v7z', 'href' => '#'], // LinkedIn
                            ['icon' => 'M7 10h10M7 14h10M4 22h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2z', 'href' => '#'], // YouTube
                            ['icon' => 'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3V2z', 'href' => '#'], // Facebook
                            ['icon' => 'M8 6h8c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2H8c-1.1 0-2-.9-2-2V8c0-1.1.9-2 2-2zm8 12c.55 0 1-.45 1-1V8c0-.55-.45-1-1-1H8c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h8zM17 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z', 'href' => '#'], // Instagram
                        ];
                    @endphp

                    @foreach ($socials as $social)
                        <a href="{{ $social['href'] }}" target="_blank" rel="noopener noreferrer" class="text-text-light hover:text-accent-gold transition duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="{{ $social['icon'] }}" />
                            </svg>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- 2. ЛИНКОВИ ЗА НАВИГАЦИЈУ --}}
            <div>
                <h4 class="text-lg font-bold text-text-light mb-4 uppercase tracking-wider">Navigation</h4>
                <ul class="space-y-3 text-border-gray text-sm">
                    <li><a href="#inventory" class="hover:text-accent-gold transition duration-300">New Inventory</a></li>
                    <li><a href="#models" class="hover:text-accent-gold transition duration-300">Pre-Owned Models</a></li>
                    <li><a href="#financing" class="hover:text-accent-gold transition duration-300">Financing Options</a></li>
                    <li><a href="#services" class="hover:text-accent-gold transition duration-300">Service & Parts</a></li>
                </ul>
            </div>

            {{-- 3. ПРАВНЕ ИНФОРМАЦИЈЕ --}}
            <div>
                <h4 class="text-lg font-bold text-text-light mb-4 uppercase tracking-wider">Legal</h4>
                <ul class="space-y-3 text-border-gray text-sm">
                    <li><a href="#terms" class="hover:text-accent-gold transition duration-300">Terms of Service</a></li>
                    <li><a href="#privacy" class="hover:text-accent-gold transition duration-300">Privacy Policy</a></li>
                    <li><a href="#sitemap" class="hover:text-accent-gold transition duration-300">Sitemap</a></li>
                    <li><a href="#cookie" class="hover:text-accent-gold transition duration-300">Cookie Settings</a></li>
                </ul>
            </div>
        </div>

        {{-- Футер дно: Цопиригхт и Потпис --}}
        <div class="mt-16 pt-8 border-t border-border-gray/50 text-center md:flex md:justify-between md:items-center">
            <p class="text-sm text-border-gray order-2">
                &copy; {{ date('Y') }} Luxury Car Salon. All Rights Reserved.
            </p>

            <p class="text-xs mt-4 md:mt-0 text-border-gray hover:text-accent-gold transition duration-300 order-1">
                Designed & Developed by <a href="https://www.digitalytycoon.com" target="_blank" rel="noopener noreferrer" class="font-semibold text-text-light hover:text-accent-gold">Digitaly Tycoon</a>
            </p>
        </div>

    </div>
</footer>