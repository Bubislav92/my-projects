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

    <title>Портфолио - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Definise stil za nevidljive kartice */
        .project-card:not(.visible) {
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
        }

        /* Definise stil za vidljive kartice */
        .project-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Dodaje glatku tranziciju za animaciju */
        .project-card {
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    <main>
        <section class="bg-secondary-dark text-text-light text-center py-20">
            <div class="container mx-auto px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold text-accent mb-4">
                    {{ __('portfolio_page.portfolio_title_page') }}
                </h1>
                <p class="text-lg md:text-xl max-w-3xl mx-auto">
                    {{ __('portfolio_page.portfolio_intro') }}
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-colors duration-300 bg-accent text-primary-dark hover:bg-opacity-80" data-filter="all">
                        {{ __('portfolio_page.portfolio_all') }}
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-colors duration-300 bg-secondary-dark text-text-light hover:bg-gray-700" data-filter="website">
                        {{ __('portfolio_page.portfolio_websites') }}
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-colors duration-300 bg-secondary-dark text-text-light hover:bg-gray-700" data-filter="ecommerce">
                        {{ __('portfolio_page.portfolio_ecommerce') }}
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-colors duration-300 bg-secondary-dark text-text-light hover:bg-gray-700" data-filter="agency">
                        {{ __('portfolio_page.portfolio_web_agencies') }}
                    </button>
                </div>

                <div id="project-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="website">
                        <a href="{{ asset('storage/project2.png') }}">
                            <img src="{{ asset('storage/project2.png') }}" alt="Веб сајт 1" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">{{ __('portfolio_page.portfolio_administrator_dashboard') }}</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">{{ __('portfolio_page.portfolio_category') }}</span> {{ __('portfolio_page.portfolio_websites') }}</p>
                            <a href="{{ asset('storage/project2.png') }}" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">{{ __('portfolio_page.portfolio_view_project') }}</a>
                        </div>
                    </div>

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="ecommerce">
                        <a href="{{ asset('storage/project1.png') }}">
                            <img src="{{ asset('storage/project1.png') }}" alt="Е-продавница 1" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Web Shop</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold"> {{ __('portfolio_page.portfolio_category') }}</span> {{ __('portfolio_page.portfolio_ecommerce') }}</p>
                            <a href="{{ asset('storage/project1.png') }}" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">{{ __('portfolio_page.portfolio_view_project') }}</a>
                        </div>
                    </div>

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="agency">
                        <a href="{{ asset('storage/project5.png') }}">
                            <img src="{{ asset('storage/project5.png') }}" alt="Веб агенција 1" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Web Agency</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">{{ __('portfolio_page.portfolio_category') }}</span> {{ __('portfolio_page.portfolio_web_agencies') }}</p>
                            <a href="{{ asset('storage/project5.png') }}" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">{{ __('portfolio_page.portfolio_view_project') }}</a>
                        </div>
                    </div>

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="website">
                        <a href="{{ asset('storage/project3.png') }}">
                            <img src="{{ asset('storage/project3.png') }}" alt="Веб сајт 2" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">{{ __('portfolio_page.portfolio_custom_web_site') }}</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">{{ __('portfolio_page.portfolio_category') }}</span> {{ __('portfolio_page.portfolio_websites') }}</p>
                            <a href="{{ asset('storage/project3.png') }}" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">{{ __('portfolio_page.portfolio_view_project') }}</a>
                        </div>
                    </div>
                 </div>
            
        </section>

        <x-cta />
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const projectGrid = document.getElementById('project-grid');
            const projectCards = document.querySelectorAll('.project-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Uklanja aktivni stil sa svih dugmadi
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-accent', 'text-primary-dark');
                        btn.classList.add('bg-secondary-dark', 'text-text-light');
                    });

                    // Dodaje aktivni stil kliknutom dugmetu
                    button.classList.remove('bg-secondary-dark', 'text-text-light');
                    button.classList.add('bg-accent', 'text-primary-dark');

                    const filter = button.dataset.filter;
                    let delay = 0;

                    // Privremeno skrivanje svih kartica pre ponovnog prikaza
                    projectCards.forEach(card => {
                        card.classList.remove('visible');
                    });

                    // Koristi setTimeout za glatku animaciju, ali na nivou grupe
                    setTimeout(() => {
                        projectCards.forEach(card => {
                            const category = card.dataset.category;

                            // Prikazuje kartice koje se podudaraju
                            if (filter === 'all' || category === filter) {
                                card.classList.add('visible');
                            }
                        });
                    }, 500); // Kratko kašnjenje pre prikaza nove grupe

                });
            });
        });
    </script>
</body>
</html>
