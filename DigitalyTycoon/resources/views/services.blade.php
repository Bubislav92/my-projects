<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Standardni SEO Meta Tagovi --}}
    <meta name="description" content="**DigitalyTycoon nudi vrhunske usluge web razvoja, izrade sajtova, e-commerce rešenja i digitalnog marketinga. Pretvorite svoju ideju u moćno online prisustvo.**">
    <meta name="keywords" content="web razvoj, izrada sajtova, e-commerce, digitalni marketing, frontend, backend, prilagođena rešenja, DigitalyTycoon">
    <link rel="canonical" href="**https://www.digitalytycoon.com/**"> {{-- Zameniti sa stvarnim URL-om vaše glavne stranice --}}
    <meta name="author" content="DigitalyTycoon">

    {{-- Open Graph (OG) Meta Tagovi - Za Facebook, LinkedIn, i većinu drugih mreža --}}
    <meta property="og:title" content="DigitalyTycoon - Vrhunski web razvoj i digitalna rešenja">
    <meta property="og:description" content="**DigitalyTycoon nudi vrhunske usluge web razvoja, izrade sajtova, e-commerce rešenja i digitalnog marketinga. Pretvorite svoju ideju u moćno online prisustvo.**">
    <meta property="og:url" content="**https://www.digitalytycoon.com/**"> {{-- Zameniti sa stvarnim URL-om --}}
    <meta property="og:site_name" content="DigitalyTycoon">
    <meta property="og:type" content="website"> {{-- Ako je ovo blog post, koristite "article" --}}
    <meta property="og:image" content="**https://www.digitalytycoon.com/images/share-slika.jpg**"> {{-- Zameniti sa URL-om slike (preporučeno 1200x630 piksela) --}}
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="sr_RS"> {{-- Ili sr_SR, en_US, itd. --}}

    {{-- Twitter Card Meta Tagovi - Specijalno za X (Twitter) --}}
    <meta name="twitter:card" content="summary_large_image"> {{-- Preporučuje se 'summary_large_image' --}}
    <meta name="twitter:site" content="@**DigitalyTycoon**"> {{-- Zameniti sa vašim Twitter handle-om (sa @) --}}
    <meta name="twitter:creator" content="@**DigitalyTycoon**"> {{-- Ako je isti kao site --}}
    <meta name="twitter:title" content="DigitalyTycoon - Vrhunski web razvoj">
    <meta name="twitter:description" content="**Pretvorite svoju ideju u moćno online prisustvo uz DigitalyTycoon. Web razvoj, e-commerce i digitalni marketing.**">
    <meta name="twitter:image" content="**https://www.digitalytycoon.com/images/share-slika.jpg**"> {{-- URL iste OG slike --}}

    <title>Услуге - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    <main>
        <section class="bg-secondary-dark text-text-light text-center py-20">
            <div class="container mx-auto px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold text-accent mb-4">
                    {{ __('services_page.services_title_page') }}
                </h1>
                <p class="text-lg md:text-xl max-w-3xl mx-auto">
                    {{ __('services_page.services_intro') }}
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-laptop-code text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">{{ __('services_page.service_web_dev_title') }}</h3>
                        <p class="text-text-light/80">
                            {{ __('services_page.service_web_dev_text') }}
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-shopping-cart text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">{{ __('services_page.service_ecommerce_title') }}</h3>
                        <p class="text-text-light/80">
                            {{ __('services_page.service_ecommerce_text') }}
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-drafting-compass text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">{{ __('services_page.service_ui_ux_title') }}</h3>
                        <p class="text-text-light/80">
                            {{ __('services_page.service_ui_ux_text') }}
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="fas fa-chart-line text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">{{ __('services_page.service_seo_marketing_title') }}</h3>
                        <p class="text-text-light/80">
                            {{ __('services_page.service_seo_marketing_text') }}
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="500">
                        <i class="fas fa-headset text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">{{ __('services_page.service_maintenance_title') }}</h3>
                        <p class="text-text-light/80">
                            {{ __('services_page.service_maintenance_text') }}
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="600">
                        <i class="fas fa-server text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">{{ __('services_page.service_hosting_title') }}</h3>
                        <p class="text-text-light/80">
                            {{ __('services_page.service_hosting_text') }}
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-20 bg-secondary-dark">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold text-accent mb-12" data-aos="fade-up">{{ __('services_page.why_choose_us_title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="p-6 rounded-lg" data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-check-circle text-accent text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">{{ __('services_page.why_choose_us_1_title') }}</h4>
                        <p class="text-text-light/80">
                            {{ __('services_page.why_choose_us_1_text') }}
                        </p>
                    </div>
                    <div class="p-6 rounded-lg" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fas fa-handshake text-accent text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">{{ __('services_page.why_choose_us_2_title') }}</h4>
                        <p class="text-text-light/80">
                            {{ __('services_page.why_choose_us_2_text') }}
                        </p>
                    </div>
                    <div class="p-6 rounded-lg" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-star text-accent text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">{{ __('services_page.why_choose_us_3_title') }}</h4>
                        <p class="text-text-light/80">
                            {{ __('services_page.why_choose_us_3_text') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <x-cta />
    </main>

    <x-footer />

</body>
</html>
