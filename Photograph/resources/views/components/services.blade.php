<section class="py-16 px-4 md:px-8 bg-stone-50"
         data-aos="fade-up" data-aos-duration="1000">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-stone-950 mb-4">
                My Services
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                I offer a range of photography services tailored to your needs. My goal is to create stunning images that tell your unique story.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Service Card 1: Portrait Sessions --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <img src="{{ asset('storage/images/photo22.jpg') }}"
                     alt="Portrait Session"
                     class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-neutral-950 bg-opacity-60 flex flex-col justify-end p-6 text-neutral-50 transition-all duration-500 group-hover:bg-opacity-80">
                    <h3 class="text-2xl font-bold mb-2 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        Portrait Sessions
                    </h3>
                    <p class="text-sm text-slate-300 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-100">
                        Creating authentic and striking portraits that reflect your personality and style.
                    </p>
                </div>
            </div>

            {{-- Service Card 2: Wedding Photography --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                <img src="{{ asset('storage/images/photo9.jpg') }}"
                     alt="Wedding Photography"
                     class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-neutral-950 bg-opacity-60 flex flex-col justify-end p-6 text-neutral-50 transition-all duration-500 group-hover:bg-opacity-80">
                    <h3 class="text-2xl font-bold mb-2 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        Wedding Photography
                    </h3>
                    <p class="text-sm text-slate-300 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-100">
                        Capturing the emotion and joy of your special day, creating timeless memories.
                    </p>
                </div>
            </div>

            {{-- Service Card 3: Event Photography --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                <img src="{{ asset('storage/images/photo12.jpg') }}"
                     alt="Event Photography"
                     class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-neutral-950 bg-opacity-60 flex flex-col justify-end p-6 text-neutral-50 transition-all duration-500 group-hover:bg-opacity-80">
                    <h3 class="text-2xl font-bold mb-2 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        Event Photography
                    </h3>
                    <p class="text-sm text-slate-300 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-100">
                        Documenting your corporate events, celebrations, and gatherings with professionalism and detail.
                    </p>
                </div>
            </div>

            {{-- Service Card 4: Product Photography (New example) --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                <img src="{{ asset('storage/images/photo13.jpg') }}"
                     alt="Product Photography"
                     class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-neutral-950 bg-opacity-60 flex flex-col justify-end p-6 text-neutral-50 transition-all duration-500 group-hover:bg-opacity-80">
                    <h3 class="text-2xl font-bold mb-2 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        Product Photography
                    </h3>
                    <p class="text-sm text-slate-300 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-100">
                        Showcasing your products with high-quality, professional imagery that stands out.
                    </p>
                </div>
            </div>

            {{-- Service Card 5: Landscape Photography (New example) --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1000">
                <img src="{{ asset('storage/images/photo11.jpg') }}"
                     alt="Landscape Photography"
                     class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-neutral-950 bg-opacity-60 flex flex-col justify-end p-6 text-neutral-50 transition-all duration-500 group-hover:bg-opacity-80">
                    <h3 class="text-2xl font-bold mb-2 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        Landscape Photography
                    </h3>
                    <p class="text-sm text-slate-300 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-100">
                        Capturing the grandeur and serenity of nature's breathtaking vistas.
                    </p>
                </div>
            </div>

            {{-- Service Card 6: Architecture Photography (New example) --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1200">
                <img src="{{ asset('storage/images/photo29.jpg') }}"
                     alt="Architecture Photography"
                     class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-neutral-950 bg-opacity-60 flex flex-col justify-end p-6 text-neutral-50 transition-all duration-500 group-hover:bg-opacity-80">
                    <h3 class="text-2xl font-bold mb-2 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        Architecture Photography
                    </h3>
                    <p class="text-sm text-slate-300 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-100">
                        Highlighting the intricate details and grand scale of buildings and structures.
                    </p>
                </div>
            </div>

        </div>

        <div class="text-center mt-12"
             data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
            <a href="#" class="inline-block bg-amber-500 hover:bg-amber-700 text-white font-bold py-3 px-8 rounded-full transition-colors duration-300">
                See Pricing
            </a>
        </div>
    </div>
</section>