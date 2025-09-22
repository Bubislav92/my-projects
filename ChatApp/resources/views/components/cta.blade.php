<section class="py-20 px-6 bg-primary text-center">
    <h2 class="text-4xl font-bold text-white mb-4">
        Ready to start?
    </h2>
    <p class="text-xl text-white mb-8">
        Join thousands of users and start chatting today!
    </p>
    
    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
        <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3 rounded-lg bg-secondary text-white font-semibold shadow-lg hover:bg-white hover:text-secondary transition-colors duration-200">
            Log In
        </a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3 rounded-lg bg-white text-primary font-semibold shadow-lg hover:bg-accent hover:text-white transition-colors duration-200">
                Register
            </a>
        @endif
    </div>
</section>