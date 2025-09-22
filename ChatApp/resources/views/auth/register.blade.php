<x-guest-layout>
    <div class="w-full max-w-lg mx-auto p-8 bg-white rounded-xl shadow-2xl transform -translate-y-16 lg:translate-y-0">
        
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-text-dark mb-2">Create an Account</h1>
            <p class="text-text-light">Join our community and start chatting!</p>
        </div>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" class="text-text-dark font-medium" />
                <x-text-input id="name" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary text-text-dark bg-background-light placeholder-text-light" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-text-dark font-medium" />
                <x-text-input id="email" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary text-text-dark bg-background-light placeholder-text-light" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-text-dark font-medium" />
                <x-text-input id="password" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary text-text-dark bg-background-light placeholder-text-light"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-text-dark font-medium" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary text-text-dark bg-background-light placeholder-text-light"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-6">
                <x-primary-button class="w-full py-3 bg-primary hover:bg-secondary text-white font-semibold transition-colors duration-200 transform hover:scale-105">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
            
            <div class="mt-6 text-center text-sm">
                <span class="text-text-light">Already have an account?</span>
                <a href="{{ route('login') }}" class="underline font-semibold text-primary hover:text-secondary transition-colors duration-200">
                    Log in here.
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>