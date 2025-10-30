<footer class="bg-charcoal text-off-white mt-16 border-t-8 border-wood-primary" 
        data-aos="fade-up" 
        data-aos-duration="1000">

    <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- 1. Лого и кратак опис (Brand Info) --}}
            <div class="md:col-span-2 space-y-4" 
                 data-aos="fade-right" data-aos-delay="200">
                <a href="/" class="flex items-center space-x-2">
                    {{-- Користите исти SVG или лого као у хедеру, али у белој боји --}}
                    <svg class="h-8 w-8 text-wood-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-10v10a1 1 0 001 1h3m-9-1h2m-2 0h2"/>
                    </svg>
                    <span class="text-3xl font-extrabold tracking-wider text-off-white">
                        TimberCraft
                    </span>
                </a>
                <p class="text-sm text-gray-400 max-w-md">
                    Crafting timeless pieces from the finest wood. Your vision, built solid. Quality and tradition in every cut.
                </p>
            </div>

            {{-- 2. Брзи линкови (Quick Links) --}}
            <div class="space-y-4" 
                 data-aos="fade-up" data-aos-delay="400">
                <h3 class="text-lg font-semibold text-wood-light uppercase tracking-wider">
                    Quick Links
                </h3>
                <ul class="space-y-2">
                    <li><a href="#services" class="text-gray-400 hover:text-wood-light transition duration-300">Our Services</a></li>
                    <li><a href="#projects" class="text-gray-400 hover:text-wood-light transition duration-300">Recent Projects</a></li>
                    <li><a href="#about" class="text-gray-400 hover:text-wood-light transition duration-300">About Us</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-wood-light transition duration-300">Blog & Tips</a></li>
                </ul>
            </div>

            {{-- 3. Контакт (Contact & Social) --}}
            <div class="space-y-4" 
                 data-aos="fade-left" data-aos-delay="600">
                <h3 class="text-lg font-semibold text-wood-light uppercase tracking-wider">
                    Contact Us
                </h3>
                <ul class="space-y-2">
                    <li class="text-gray-400">123 Carpentry Way, Woodville</li>
                    <li class="text-gray-400">Phone: <a href="tel:555123456" class="hover:text-wood-light"> (555) 123-456</a></li>
                    <li class="text-gray-400">Email: <a href="mailto:info@timbercraft.com" class="hover:text-wood-light"> info@timbercraft.com</a></li>
                </ul>

                {{-- Социјалне мреже (Social Media Icons - можете заменити стварним иконама) --}}
                <div class="flex space-x-4 mt-4 text-wood-light">
                    <a href="#" class="hover:text-wood-light transition duration-300">
                        [F] {{-- Placeholder for Facebook Icon --}}
                    </a>
                    <a href="#" class="hover:text-wood-light transition duration-300">
                        [I] {{-- Placeholder for Instagram Icon --}}
                    </a>
                    <a href="#" class="hover:text-wood-light transition duration-300">
                        [P] {{-- Placeholder for Pinterest Icon --}}
                    </a>
                </div>
            </div>
        </div>

        {{-- Copyright Bar --}}
        <div class="mt-12 pt-8 border-t border-gray-700">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} TimberCraft. All rights reserved. | Designed and Developed by <a href="www.digitalytycoon.com" class="hover:text-wood-light">Digitaly Tycoon</a>
            </p>
        </div>
    </div>
</footer>