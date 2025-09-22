<section class="flex flex-col items-center justify-center py-16 px-6 text-center">
    
    <h1 class="text-6xl font-bold text-primary mb-4 sm:text-7xl lg:text-8xl">
        {{ config('app.name', 'Laravel') }}
    </h1>

    <p class="text-xl text-text-dark max-w-xl mx-auto mb-6 sm:text-2xl">
        Welcome to our modern chat application.
    </p>

    <p class="mt-4 text-text-light">
        Log in or register to start chatting with your friends.
    </p>
    
    <div class="mt-8 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
        <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3 rounded-lg bg-primary text-white font-semibold shadow-lg hover:bg-secondary transition-colors duration-200 transform hover:scale-105">
            Log In
        </a>
        
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3 rounded-lg bg-accent text-white font-semibold shadow-lg hover:bg-primary transition-colors duration-200 transform hover:scale-105">
                Register
            </a>
        @endif
    </div>
</section>