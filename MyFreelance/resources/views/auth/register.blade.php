{{-- auth/register.blade.php --}}
<x-guest-layout> {{-- Користи guest-layout који нема навигацију, као што је предвиђено за аутентификационе странице --}}
    <div class="flex flex-col items-center justify-center min-h-screen bg-light-gray"> {{-- Централизује садржај --}}

        <div class="mb-8">
            <a href="/"> {{-- Лого линкује на почетну страницу --}}
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden sm:rounded-lg"> {{-- Кардолика форма --}}

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div>
                    <x-input-label for="name" value="{{ __('Name') }}" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email Address --}}
                <div class="mt-4">
                    <x-input-label for="email" value="{{ __('Email') }}" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="mt-4">
                    <x-input-label for="role" :value="__('I want to be')" />

                    <div class="mt-2 flex items-center space-x-6">
                        <label for="role_freelancer" class="inline-flex items-center cursor-pointer">
                            <input id="role_freelancer" type="radio" name="role" value="freelancer"
                                class="form-radio h-4 w-4 text-primary-orange focus:ring-primary-orange transition duration-150 ease-in-out"
                                required>
                            <span class="ml-2 text-sm text-gray-600">Freelancer</span>
                        </label>

                        <label for="role_client" class="inline-flex items-center cursor-pointer">
                            <input id="role_client" type="radio" name="role" value="client"
                                class="form-radio h-4 w-4 text-secondary-green focus:ring-secondary-green transition duration-150 ease-in-out"
                                checked required>
                            <span class="ml-2 text-sm text-gray-600">Client</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input-label for="password" value="{{ __('Password') }}" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6"> {{-- Повећан mt --}}
                    <a class="underline text-sm text-dark-gray hover:text-primary-orange rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange transition duration-300" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4"> {{-- Повећан ms --}}
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
