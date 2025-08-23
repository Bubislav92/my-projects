<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400.png?text=Веб+сајт+1" alt="Веб сајт 1" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Наслов пројекта 1</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">{{ __('portfolio_page.portfolio_category') }}</span> Веб сајт</p>
                            <a href="#" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">{{ __('portfolio_page.portfolio_view_project') }}</a>
                        </div>
                    </div>

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="ecommerce">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400.png?text=Е-продавница+1" alt="Е-продавница 1" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Наслов пројекта 2</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">Категорија:</span> Е-продавница</p>
                            <a href="#" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">Погледај пројекат</a>
                        </div>
                    </div>

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="agency">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400.png?text=Веб+агенција+1" alt="Веб агенција 1" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Наслов пројекта 3</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">Категорија:</span> Веб агенције</p>
                            <a href="#" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">Погледај пројекат</a>
                        </div>
                    </div>

                    <div class="project-card visible bg-secondary-dark rounded-lg overflow-hidden shadow-xl" data-category="website">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400.png?text=Веб+сајт+2" alt="Веб сајт 2" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Наслов пројекта 4</h3>
                            <p class="text-text-light/80 text-sm mb-4"><span class="font-bold">Категорија:</span> Веб сајт</p>
                            <a href="#" class="inline-block bg-accent text-primary-dark font-bold py-2 px-4 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">Погледај пројекат</a>
                        </div>
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
