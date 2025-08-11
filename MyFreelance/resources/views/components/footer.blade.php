{{-- resources/views/components/footer.blade.php --}}

<footer class="bg-dark-gray text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
                <h4 class="text-2xl font-bold text-primary-orange mb-4">My Freelance</h4>
                <p class="text-gray-400">Your platform for freelancing.</p>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                <ul>
                    <li><a href="#how-it-works" class="text-gray-400 hover:text-primary-orange transition duration-300">How It Works</a></li>
                    <li><a href="{{ route('about-us') }}" class="text-gray-400 hover:text-primary-orange transition duration-300">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Support</h4>
                <ul>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-primary-orange transition duration-300">Contact</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-primary-orange transition duration-300">Terms of Service</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-primary-orange transition duration-300">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Follow Us</h4>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300 text-2xl"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300 text-2xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-primary-orange transition duration-300 text-2xl"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 pt-8 text-gray-400 text-sm">
            &copy; {{ date('Y') }} My Freelance. All rights reserved.
        </div>
    </div>
</footer>
