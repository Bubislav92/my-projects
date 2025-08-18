<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('my_profile.my_dashboard') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Бочни навигациони мени за Dashboard (Исти као на главној dashboard страници) --}}
            <aside class="md:col-span-1 bg-white p-6 rounded-xl shadow-md h-fit">
                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard') ? 'bg-light-gray text-primary-green' : '' }}">
                        <i class="fa-solid fa-gauge-high mr-3"></i> {{ __('my_profile.dashboard_overview') }}
                    </a>
                    <a href="{{ route('dashboard.orders') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('dashboard.orders') ? 'bg-light-gray text-primary-green' : '' }}">
                        <i class="fa-solid fa-box-seam mr-3"></i> {{ __('my_profile.my_orders') }}
                    </a>
                    <a href="{{ route('components.wishlist') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 {{ request()->routeIs('components.wishlist') ? 'bg-light-gray text-primary-green' : '' }}">
                        <i class="fa-solid fa-heart mr-3"></i> {{ __('my_profile.my_wishlist') }}
                    </a>
                    <a href="{{ route('dashboard.profile') }}" class="flex items-center p-3 rounded-lg text-lg font-semibold text-dark-gray hover:bg-light-gray hover:text-primary-green transition duration-300 relative {{ request()->routeIs('dashboard.profile') ? 'bg-light-gray text-primary-green' : '' }}">
                        @if (request()->routeIs('dashboard.profile'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-primary-green rounded-tl-lg rounded-bl-lg"></span>
                        @endif
                        <i class="fa-solid fa-user mr-3 {{ request()->routeIs('dashboard.profile') ? 'text-primary-green' : '' }}"></i> {{ __('my_profile.my_profile') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-left p-3 rounded-lg text-lg font-semibold text-red-600 hover:bg-red-50 transition duration-300">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i> {{ __('my_profile.log_out') }}
                        </button>
                    </form>
                </nav>
            </aside>

            {{-- Главни садржај секције "My Profile" --}}
            <div class="md:col-span-3 space-y-8">
                {{-- Успешна порука за ажурирање --}}
                @if (session('status') === 'profile-updated')
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ __('my_profile.profile_updated_successfully') }}</span>
                    </div>
                @endif
                
                {{-- Одељак за ажурирање личних података --}}
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-3xl font-semibold text-dark-gray mb-6">{{ __('my_profile.personal_information') }}</h2> {{-- Лични подаци --}}

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.name') }}</label> {{-- Име --}}
                            <input id="name"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="text"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   required
                                   autofocus />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.email') }}</label> {{-- Е-маил --}}
                            <input id="email"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   required />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.phone_number') }}</label> {{-- Телефон --}}
                            <input id="phone"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="text"
                                   name="phone"
                                   value="{{ old('phone', $user->phone) }}" />
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date_of_birth" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.date_of_birth') }}</label> {{-- Датум рођења --}}
                            <input id="date_of_birth"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="date"
                                   name="date_of_birth"
                                   value="{{ old('date_of_birth', $user->date_of_birth) }}" />
                            @error('date_of_birth')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="address_line_1" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.address_line_1') }}</label>
                                <input id="address_line_1"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="text"
                                       name="address_line_1"
                                       value="{{ old('address_line_1', $user->address_line_1) }}" />
                                @error('address_line_1')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="address_line_2" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.address_line_2_optional') }}</label>
                                <input id="address_line_2"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="text"
                                       name="address_line_2"
                                       value="{{ old('address_line_2', $user->address_line_2) }}" />
                                @error('address_line_2')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label for="city" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.city') }}</label>
                                <input id="city"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="text"
                                       name="city"
                                       value="{{ old('city', $user->city) }}" />
                                @error('city')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="state" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.state') }}</label>
                                <input id="state"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="text"
                                       name="state"
                                       value="{{ old('state', $user->state) }}" />
                                @error('state')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="zip_code" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.zip_code') }}</label>
                                <input id="zip_code"
                                       class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                       type="text"
                                       name="zip_code"
                                       value="{{ old('zip_code', $user->zip_code) }}" />
                                @error('zip_code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label for="country" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.country') }}</label>
                            <input id="country"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="text"
                                   name="country"
                                   value="{{ old('country', $user->country) }}" />
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                                {{ __('my_profile.update_profile') }}
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Одељак за ажурирање лозинке --}}
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-3xl font-semibold text-dark-gray mb-6">{{ __('my_profile.update_password') }}</h2> {{-- Ажурирај лозинку --}}

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                        @csrf
                        @method('put')

                        <div>
                            <label for="current_password" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.current_password') }}</label> {{-- Тренутна лозинка --}}
                            <input id="current_password"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="password"
                                   name="current_password"
                                   required
                                   autocomplete="current-password" />
                            @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.new_password') }}</label> {{-- Нова лозинка --}}
                            <input id="password"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="new-password" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('my_profile.confirm_new_password') }}</label> {{-- Потврди нову лозинку --}}
                            <input id="password_confirmation"
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200"
                                   type="password"
                                   name="password_confirmation"
                                   required
                                   autocomplete="new-password" />
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                            {{ __('my_profile.change_password') }}
                        </button>
                    </form>
                </div>

                {{-- Одељак за брисање налога (опционо) --}}
                <div class="bg-white p-6 rounded-xl shadow-md border border-red-200">
                    <h2 class="text-3xl font-semibold text-red-600 mb-6">{{ __('my_profile.delete_account') }}</h2> {{-- Обриши налог --}}
                    <p class="text-gray-700 mb-4">
                        {{ __('my_profile.delete_account_warning') }}
                    </p>
                    {{-- Овде ћеш касније додати потврду пре брисања налога --}}
                    <button class="bg-red-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                        {{ __('my_profile.delete_account_button') }}
                    </button>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>