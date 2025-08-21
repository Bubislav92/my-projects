<section id="about" class="bg-secondary-dark text-text-light py-20">
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
        <div data-aos="fade-right">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-accent">{{ __('home_page.about_title') }}</h2>
            <p class="mb-4 text-lg">
                {{ __('home_page.about_text_1') }}
            </p>
            <p class="text-lg">
                {{ __('home_page.about_text_2') }}
            </p>
        </div>
        <div class="text-center" data-aos="fade-left">
            <img src="{{ asset('storage/team2.jpg') }}" alt="Tim DigitalyTycoon" class="rounded-lg shadow-xl mx-auto">
        </div>
    </div>
</section>
