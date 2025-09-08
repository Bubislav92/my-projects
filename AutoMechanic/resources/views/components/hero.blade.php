<section class="bg-primary py-20 text-center relative overflow-hidden">
    {{-- Позадинска слика --}}
    <div class="absolute inset-0 bg-cover bg-center" 
         style="background-image: url('/images/image1.jpg');" 
         data-aos="fade" data-aos-duration="1500">
        {{-- Прекривач за тамнији ефекат и бољи контраст текста --}}
        <div class="absolute inset-0 bg-primary opacity-70"></div> 
    </div>

    <div class="container mx-auto px-6 relative z-10"> {{-- z-10 осигурава да текст буде изнад слике --}}
        <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-white mb-4" data-aos="fade-up" data-aos-delay="200">
            Ваш аутомобил у сигурним рукама
        </h1>
        <p class="text-xl md:text-2xl text-light-gray mb-8" data-aos="fade-up" data-aos-delay="400">
            Пружамо комплетан сервис и дијагностику за све врсте возила.
        </p>
        <a href="{{ route('services') }}" class="bg-secondary text-primary font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:bg-accent transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="600">
            Истражите наше услуге
        </a>
    </div>
</section>