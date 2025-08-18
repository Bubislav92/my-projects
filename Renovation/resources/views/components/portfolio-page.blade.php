<section class="py-20 bg-light">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold font-serif text-center text-dark mb-16">
            Наши пројекти
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="relative overflow-hidden rounded-lg shadow-xl group">
                <img src="{{ asset('images/project-1.jpg') }}" alt="Реновирање модерне кухиње" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-primary bg-opacity-80 flex flex-col items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    <h3 class="text-2xl font-bold font-serif text-white text-center">Модерна кухиња у центру града</h3>
                    <p class="mt-2 text-sm text-gray-300 text-center">
                        Комплетна реконструкција са израдом намештаја по мери и уградњом паметних уређаја.
                    </p>
                    <a href="#" class="mt-4 text-secondary hover:underline font-semibold">Погледај детаље</a>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg shadow-xl group">
                <img src="{{ asset('images/project-2.jpg') }}" alt="Реновирање луксузног купатила" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-primary bg-opacity-80 flex flex-col items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    <h3 class="text-2xl font-bold font-serif text-white text-center">Луксузно купатило са мермером</h3>
                    <p class="mt-2 text-sm text-gray-300 text-center">
                        Од старе баре до оазе за опуштање, уз висококвалитетни мермер и дизајнерске плочице.
                    </p>
                    <a href="#" class="mt-4 text-secondary hover:underline font-semibold">Погледај детаље</a>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg shadow-xl group">
                <img src="{{ asset('images/project-3.jpg') }}" alt="Реновирање стана" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-primary bg-opacity-80 flex flex-col items-center justify-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    <h3 class="text-2xl font-bold font-serif text-white text-center">Модернизација стана у новом Београду</h3>
                    <p class="mt-2 text-sm text-gray-300 text-center">
                        Комплетна реновација стана уз промену распореда и инсталација, по принципу кључ у руке.
                    </p>
                    <a href="#" class="mt-4 text-secondary hover:underline font-semibold">Погледај детаље</a>
                </div>
            </div>

            </div>
    </div>
</section>
