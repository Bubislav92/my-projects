<section class="bg-neutral-50 py-16 md:py-24" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-950 mb-4">My Expertise</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                I specialize in the following areas, but I am always open to new creative projects.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Service 1: Portraits --}}
            <div class="flex flex-col items-center text-center p-6 bg-white rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-105" data-aos="fade-up">
                <x-heroicon-o-user-circle class="h-12 w-12 text-accent-600 mb-4" />                
                <h3 class="text-xl font-semibold text-neutral-950 mb-2">Portraits</h3>
                <p class="text-sm text-slate-600">
                    Whether it's professional headshots or artistic series, my goal is to capture the essence of your personality.
                </p>
            </div>

            {{-- Service 2: Weddings --}}
            <div class="flex flex-col items-center text-center p-6 bg-white rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                <x-heroicon-o-heart class="h-12 w-12 text-accent-600 mb-4" />
                <h3 class="text-xl font-semibold text-neutral-950 mb-2">Weddings</h3>
                <p class="text-sm text-slate-600">
                    I document your special day with all its emotions, details, and joys, creating an unforgettable story.
                </p>
            </div>

            {{-- Service 3: Landscapes --}}
            <div class="flex flex-col items-center text-center p-6 bg-white rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                <x-heroicon-o-photo class="h-12 w-12 text-accent-600 mb-4" />
                <h3 class="text-xl font-semibold text-neutral-950 mb-2">Landscapes</h3>
                <p class="text-sm text-slate-600">
                    I showcase the power and beauty of nature through dramatic and artistic landscape photography.
                </p>
            </div>

            {{-- Service 4: Events --}}
            <div class="flex flex-col items-center text-center p-6 bg-white rounded-lg shadow-lg transform transition-transform duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                <x-heroicon-o-calendar class="h-12 w-12 text-accent-600 mb-4" />
                <h3 class="text-xl font-semibold text-neutral-950 mb-2">Events</h3>
                <p class="text-sm text-slate-600">
                    I professionally document corporate events, concerts, or private celebrations with great attention to detail.
                </p>
            </div>
        </div>
    </div>
</section>