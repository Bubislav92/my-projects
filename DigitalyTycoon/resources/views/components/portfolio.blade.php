<section id="portfolio" class="bg-secondary-dark text-text-light py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-12 text-accent" data-aos="fade-up">{{ __('home_page.portfolio_title') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-primary-dark rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('storage/computer1.jpg') }}" alt="Projekat 1" class="w-full h-auto">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Назив пројекта 1</h3>
                    <p class="text-sm">Опис пројекта. Веб сајт за агенцију за дигитални маркетинг.</p>
                </div>
            </div>
            <div class="bg-primary-dark rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('storage/computer2.jpg') }}" alt="Projekat 2" class="w-full h-auto">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Назив пројекта 2</h3>
                    <p class="text-sm">Опис пројекта. Е-трговина за продају ручно израђеног накита.</p>
                </div>
            </div>
            <div class="bg-primary-dark rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('storage/computer3.jpg') }}" alt="Projekat 3" class="w-full h-auto">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Назив пројекта 3</h3>
                    <p class="text-sm">Опис пројекта. Пословни сајт за старт-ап компанију.</p>
                </div>
            </div>
        </div>
    </div>
</section>
