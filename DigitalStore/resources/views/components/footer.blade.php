<footer class="bg-background-dark text-text-primary py-12 md:py-16">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-16 border-b border-gray-700 pb-8 mb-8">

            {{-- Brand Info & Social Media --}}
            <div>
                <a href="/" class="flex items-center space-x-2 mb-4">
                    {{-- Logo SVG --}}
                    <svg class="h-8 w-8 text-accent-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9.25 10.75m0 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0m9 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0m-4.5 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0m9 0a2.25 2.25 0 014.5 0m-4.5 0a2.25 2.25 0 00-4.5 0" />
                    </svg>
                    <span class="text-2xl font-bold">Digital Store</span>
                </a>
                <p class="text-text-secondary text-sm">
                    High-quality digital products for creative professionals.
                </p>
                <div class="flex space-x-4 mt-6">
                    {{-- Social Media Icons --}}
                    <a href="#" class="text-text-primary hover:text-accent-green transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i> {{-- Placeholder for Font Awesome or other icon --}}
                    </a>
                    <a href="#" class="text-text-primary hover:text-accent-green transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-text-primary hover:text-accent-green transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- Navigation Links --}}
            <div>
                <h4 class="text-lg font-semibold text-text-primary mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="/shop" class="text-text-secondary hover:text-accent-green transition-colors duration-300">Shop</a></li>
                    <li><a href="/about" class="text-text-secondary hover:text-accent-green transition-colors duration-300">About Us</a></li>
                    <li><a href="/blog" class="text-text-secondary hover:text-accent-green transition-colors duration-300">Blog</a></li>
                    <li><a href="/faq" class="text-text-secondary hover:text-accent-green transition-colors duration-300">FAQ</a></li>
                </ul>
            </div>

            {{-- Support Links --}}
            <div>
                <h4 class="text-lg font-semibold text-text-primary mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="/contact" class="text-text-secondary hover:text-accent-green transition-colors duration-300">Contact Us</a></li>
                    <li><a href="/terms" class="text-text-secondary hover:text-accent-green transition-colors duration-300">Terms of Service</a></li>
                    <li><a href="/privacy" class="text-text-secondary hover:text-accent-green transition-colors duration-300">Privacy Policy</a></li>
                    <li><a href="/returns" class="text-text-secondary hover:text-accent-green transition-colors duration-300">Returns</a></li>
                </ul>
            </div>

            {{-- Newsletter Subscription --}}
            <div>
                <h4 class="text-lg font-semibold text-text-primary mb-4">Stay Updated</h4>
                <p class="text-text-secondary text-sm mb-4">
                    Subscribe to our newsletter for the latest products and special offers.
                </p>
                <form action="#" method="POST" class="flex flex-col space-y-2">
                    <input type="email" placeholder="Your email address" class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-accent-green text-text-primary">
                    <button type="submit" class="bg-accent-orange text-white font-bold py-3 rounded-lg hover:bg-opacity-80 transition-colors duration-300">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="text-center md:flex md:justify-between md:items-center text-text-secondary text-sm">
            <span>&copy; {{ date('Y') }} Store Name. All Rights Reserved.</span>
            <div class="flex justify-center md:space-x-4 mt-4 md:mt-0">
                <a href="https://www.digitalytycoon.com" class="hover:text-accent-green transition-colors duration-300">Designed and developed by Digitaly Tycoon</a>
            </div>
        </div>
    </div>
</footer>