<section id="projects" class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <h2 class="text-base font-semibold text-wood-primary tracking-wide uppercase" 
            data-aos="fade-up">
            Our Portfolio
        </h2>
        
        <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight" 
           data-aos="fade-up" data-aos-delay="200">
            Recent Masterpieces
        </p>

        {{-- Грид Пројеката --}}
        <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-3">
            
            {{-- Пројекат 1: Modern Kitchen --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" 
                 data-aos="zoom-in-up" data-aos-delay="400">
                
                <img class="w-full h-80 object-cover transition duration-500 ease-in-out group-hover:scale-110" 
                     src="{{ asset('images/project_kitchen.jpg') }}" alt="Modern Custom Kitchen">
                
                <div class="absolute inset-0 bg-charcoal bg-opacity-40 group-hover:bg-opacity-70 transition duration-500 flex items-end">
                    <div class="p-6 text-left">
                        <h3 class="text-2xl font-bold text-off-white">The Aspen Kitchen</h3>
                        <p class="text-wood-light mt-1">Custom Cabinetry & Island</p>
                    </div>
                </div>
            </div>

            {{-- Пројекат 2: Library Shelving --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" 
                 data-aos="zoom-in-up" data-aos-delay="600">
                
                <img class="w-full h-80 object-cover transition duration-500 ease-in-out group-hover:scale-110" 
                     src="{{ asset('images/project_library.jpg') }}" alt="Built-in Library Shelving">
                
                <div class="absolute inset-0 bg-charcoal bg-opacity-40 group-hover:bg-opacity-70 transition duration-500 flex items-end">
                    <div class="p-6 text-left">
                        <h3 class="text-2xl font-bold text-off-white">The Study Nook</h3>
                        <p class="text-wood-light mt-1">Integrated Millwork</p>
                    </div>
                </div>
            </div>

            {{-- Пројекат 3: Live-Edge Table --}}
            <div class="group relative overflow-hidden rounded-lg shadow-lg" 
                 data-aos="zoom-in-up" data-aos-delay="800">
                
                <img class="w-full h-80 object-cover transition duration-500 ease-in-out group-hover:scale-110" 
                     src="{{ asset('images/project_table.jpg') }}" alt="Live-Edge Dining Table">
                
                <div class="absolute inset-0 bg-charcoal bg-opacity-40 group-hover:bg-opacity-70 transition duration-500 flex items-end">
                    <div class="p-6 text-left">
                        <h3 class="text-2xl font-bold text-off-white">The Sequoia Table</h3>
                        <p class="text-wood-light mt-1">Bespoke Furniture</p>
                    </div>
                </div>
            </div>

        </div>

        <a href="/portfolio" class="mt-12 inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-off-white bg-wood-primary hover:bg-wood-light transition duration-300">
            See All 40+ Projects →
        </a>
    </div>
</section>