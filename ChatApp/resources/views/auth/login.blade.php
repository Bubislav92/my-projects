<x-guest-layout>
    <div class="w-full max-w-lg mx-auto p-8 bg-white rounded-xl shadow-2xl transform -translate-y-16 lg:translate-y-0">
        
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-text-dark mb-2">Welcome Back!</h1>
            <p class="text-text-light">Log in to your account to continue.</p>
        </div>
        
        <x-auth-session-status class="mb-4 text-text-dark" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-text-dark font-medium" />
                <x-text-input id="email" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary text-text-dark bg-background-light placeholder-text-light" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-text-dark font-medium" />
                <x-text-input id="password" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary text-text-dark bg-background-light placeholder-text-light"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-border text-primary shadow-sm focus:ring-primary" name="remember">
                    <span class="ms-2 text-sm text-text-light">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-text-light hover:text-primary transition-colors duration-200" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-6">
                <x-primary-button class="w-full py-3 bg-primary hover:bg-secondary text-white font-semibold transition-colors duration-200 transform hover:scale-105">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
            
            <div class="mt-6 text-center text-sm">
                <span class="text-text-light">Don't have an account?</span>
                <a href="{{ route('register') }}" class="underline font-semibold text-primary hover:text-secondary transition-colors duration-200">
                    Register here.
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>