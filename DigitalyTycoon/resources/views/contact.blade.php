<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакт - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    @if(session('success'))
        <div id="success-notification" class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 p-4 rounded-lg shadow-lg text-white"
             style="background-color: #4CAF50;">
            {{ session('success') }}
        </div>
    @endif

    <main>
        <section class="bg-secondary-dark text-text-light text-center py-20">
            <div class="container mx-auto px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold text-accent mb-4">
                    {{ __('contact_page.contact_title') }}
                </h1>
                <p class="text-lg md:text-xl max-w-3xl mx-auto">
                    {{ __('contact_page.contact_hero_text') }}
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-start">
                <div data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-accent mb-6">{{ __('contact_page.form_title') }}</h2>
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="full_name" class="block text-sm font-semibold mb-2">{{ __('contact_page.form_name') }}</label>
                            <input type="text" id="full_name" name="full_name" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required>
                        </div>
                        <div>
                            <label for="company_name" class="block text-sm font-semibold mb-2">{{ __('contact_page.form_company') }}</label>
                            <input type="text" id="company_name" name="company_name" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold mb-2">{{ __('contact_page.form_email') }}</label>
                            <input type="email" id="email" name="email" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold mb-2">{{ __('contact_page.form_phone') }}</label>
                            <input type="tel" id="phone" name="phone" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent">
                        </div>
                        <div>
                            <label for="project_type" class="block text-sm font-semibold mb-2">{{ __('contact_page.form_project_type_title') }}</label>
                            <select id="project_type" name="project_type" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required>
                                <option value="">{{ __('contact_page.form_select_option') }}</option>
                                <option value="website">{{ __('contact_page.form_type_new_website') }}</option>
                                <option value="ecommerce">{{ __('contact_page.form_type_ecommerce') }}</option>
                                <option value="redesign">{{ __('contact_page.form_type_redesign') }}</option>
                                <option value="maintenance">{{ __('contact_page.form_type_maintenance') }}</option>
                                <option value="custom_app">{{ __('contact_page.form_type_custom_app') }}</option>
                                <option value="other">{{ __('contact_page.form_type_other') }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="budget" class="block text-sm font-semibold mb-2">{{ __('contact_page.form_budget_title') }}</label>
                            <select id="budget" name="budget" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent">
                                <option value="">{{ __('contact_page.form_select_option') }}</option>
                                <option value="<5000">{{ __('contact_page.form_budget_less_than') }} 5.000 €</option>
                                <option value="5000-10000">5.000 € - 10.000 €</option>
                                <option value="10000-20000">10.000 € - 20.000 €</option>
                                <option value=">20000">{{ __('contact_page.form_budget_more_than') }} 20.000 €</option>
                                <option value="unknown">{{ __('contact_page.form_budget_not_sure') }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold mb-2">{{ __('contact_page.detailed_project_description') }}</label>
                            <textarea id="message" name="message" rows="6" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required></textarea>
                        </div>
                            <div>
                                {!! htmlFormSnippet() !!}
                                @error('g-recaptcha-response')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        

                        <div>
                            <button type="submit" class="w-full bg-accent text-primary-dark font-bold py-3 px-6 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">
                                {{ __('contact_page.form_submit_button') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div data-aos="fade-left" class="space-y-12">
                    <div class="space-y-6 text-lg">
                        <h2 class="text-3xl font-bold text-accent mb-6">{{ __('contact_page.info_title') }}</h2>
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-accent text-2xl mr-4 mt-1"></i>
                            <div>
                                <h3 class="font-semibold">{{ __('contact_page.info_address') }}</h3>
                                <p>18224 Делиград, Србија</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-accent text-2xl mr-4 mt-1"></i>
                            <div>
                                <h3 class="font-semibold">{{ __('contact_page.info_email') }}</h3>
                                <p>info@digitalytycoon.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone-alt text-accent text-2xl mr-4 mt-1"></i>
                            <div>
                                <h3 class="font-semibold">{{ __('contact_page.info_phone') }}</h3>
                                <p>+381 11 123 4567</p>
                            </div>
                        </div>
                    </div>

                    <div data-aos="zoom-in">
                        <h3 class="text-2xl font-bold text-accent mb-4">{{ __('contact_page.info_location') }}</h3>
                        <div class="w-full h-80 rounded-lg overflow-hidden shadow-xl">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23107.319776154905!2d21.565818529748036!3d43.61872129445111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475429b9bfe6ef01%3A0xdc7fe16d6c6cd482!2sDeligrad%2C%20Serbia!5e0!3m2!1sen!2sde!4v1755989498561!5m2!1sen!2sde" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('success-notification');
            if (notification) {
                setTimeout(() => {
                    notification.style.opacity = '0';
                    // Уклоните елемент након што транзиција заврши
                    setTimeout(() => notification.remove(), 500);
                }, 3000); // Обавештење ће бити видљиво 3 секунде
            }
        });
    </script>
</body>
</html>
