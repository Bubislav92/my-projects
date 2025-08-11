{{-- auth/login.blade.php --}}
<x-guest-layout> {{-- Користи guest-layout који нема навигацију, као што је предвиђено за аутентификационе странице --}}
    <div class="flex flex-col items-center justify-center min-h-screen bg-light-gray"> {{-- Централизује садржај --}}

        <div class="mb-8">
            <a href="/"> {{-- Лого линкује на почетну страницу --}}
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden sm:rounded-lg"> {{-- Кардолика форма --}}

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email Address --}}
                <div>
                    <x-input-label for="email" value="{{ __('Email') }}" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input-label for="password" value="{{ __('Password') }}" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Remember Me --}}
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary-orange shadow-sm focus:ring-primary-orange transition duration-200" name="remember"> {{-- Чекбокс стил --}}
                        <span class="ms-2 text-sm text-dark-gray">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6"> {{-- Повећан mt --}}
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-dark-gray hover:text-primary-orange rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange transition duration-300" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-4"> {{-- Повећан ms --}}
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

                {{-- Линк ка регистрацији --}}
                <div class="text-center mt-6 text-sm text-dark-gray">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-primary-orange hover:underline transition duration-300">Register here.</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
