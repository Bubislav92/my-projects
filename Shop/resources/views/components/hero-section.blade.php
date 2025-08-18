<section class="relative bg-light-gray py-16 md:py-24 overflow-hidden">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between relative z-10">
        <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-dark-gray leading-tight mb-4 animate-fade-in-down">
                {{ __('hero.hero_heading') }}
            </h1>
            <p class="text-lg md:text-xl text-gray-700 mb-8 animate-fade-in-up">
                {{ __('hero.hero_text') }}
            </p>
            <a href="#" class="inline-block bg-primary-green text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-primary-green-dark transition duration-300 ease-in-out transform hover:scale-105 animate-fade-in">
                {{ __('hero.explore_button') }}
            </a>
        </div>

        <div class="md:w-1/2 flex justify-center md:justify-end">
            {{-- Direktno korišćenje slike sa iStockphoto linka --}}
            <img src="{{ asset('images/banner/banner1.jpg') }}"
                 alt="{{ __('hero.hero_alt_text') }}"
                 class="w-full max-w-lg rounded-xl shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out animate-fade-in-right">
        </div>
    </div>

    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute -top-1/4 -left-1/4 w-1/2 h-1/2 bg-secondary-orange rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob"></div>
        <div class="absolute -bottom-1/4 -right-1/4 w-1/2 h-1/2 bg-primary-green rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-2000"></div>
    </div>
</section>

{{-- Napomena: Za animacije 'animate-fade-in', 'animate-fade-in-down', 'animate-fade-in-up', 'animate-fade-in-right' i 'animate-blob' --}}
{{-- potrebno je dodati Keyframe animacije u vaš CSS (npr. resources/css/app.css) ili direktno u tailwind.config.js plugins sekciju ako koristite @keyframes direktivu --}}
{{-- Evo primera kako biste to mogli dodati u resources/css/app.css (na sam kraj fajla): --}}

{{--
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInRight {
    from { opacity: 0; transform: translateX(20px); }
    to { opacity: 1; transform: translateX(0); }
}
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}

.animate-fade-in { animation: fadeIn 1s ease-out forwards; }
.animate-fade-in-down { animation: fadeInDown 1s ease-out forwards; }
.animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
.animate-fade-in-right { animation: fadeInRight 1s ease-out forwards; }
.animate-blob { animation: blob 7s infinite ease-in-out alternate; }
.animation-delay-2000 { animation-delay: 2s; }
--}}