<footer class="bg-primary pt-10 pb-6 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Главни садржај футера (колоне) --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 border-b border-secondary/50 pb-8 mb-6">
            
            {{-- 1. Информације о компанији --}}
            <div>
                <h3 class="text-2xl font-bold text-white mb-4">
                    <span class="text-secondary">Volt</span>Stream
                </h3>
                <p class="text-accent text-sm leading-relaxed">
                    Providing reliable and professional residential electrical installations. Your trusted partner for safe and modern home power solutions.
                </p>
                <div class="mt-4 flex space-x-4">
                    {{-- Овде додајте иконе друштвених мрежа (нпр. Font Awesome или SVG) --}}
                    <a href="#" class="text-accent hover:text-secondary transition duration-300" aria-label="Facebook">
                        [Icon: FB]
                    </a>
                    <a href="#" class="text-accent hover:text-secondary transition duration-300" aria-label="LinkedIn">
                        [Icon: LI]
                    </a>
                    <a href="#" class="text-accent hover:text-secondary transition duration-300" aria-label="Instagram">
                        [Icon: IG]
                    </a>
                </div>
            </div>

            {{-- 2. Брзи линкови --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Home</a></li>
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">About Us</a></li>
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Our Services</a></li>
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Pricing</a></li>
                </ul>
            </div>

            {{-- 3. Услуге --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Residential Services</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Full House Wiring</a></li>
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Lighting Installation</a></li>
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Panel Upgrades</a></li>
                    <li><a href="#" class="text-accent hover:text-white text-sm transition duration-300">Smart Home Setup</a></li>
                </ul>
            </div>

            {{-- 4. Контакт --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Contact Us</h4>
                <ul class="space-y-2">
                    <li class="text-accent text-sm">
                        <strong class="text-white">Address:</strong> 123 Electric Blvd, City, 10001
                    </li>
                    <li class="text-accent text-sm">
                        <strong class="text-white">Phone:</strong> (555) 123-4567
                    </li>
                    <li class="text-accent text-sm">
                        <strong class="text-white">Email:</strong> <a href="mailto:info@voltstream.com" class="hover:text-white transition duration-300">info@voltstream.com</a>
                    </li>
                </ul>
                {{-- CTA у футеру --}}
                <a href="#" class="mt-6 inline-flex items-center px-4 py-2 border border-secondary text-sm font-medium rounded-md shadow-sm 
                    text-white bg-secondary hover:bg-white hover:text-primary transition duration-300">
                    Book an Appointment
                </a>
            </div>
        </div>

        {{-- Део за ауторска права --}}
        <div class="text-center pt-4">
            <p class="text-accent text-xs">
                &copy; {{ date('Y') }} VoltStream Installations. All rights reserved. | Designed with Laravel & Tailwind CSS.
            </p>
        </div>

    </div>
</footer>