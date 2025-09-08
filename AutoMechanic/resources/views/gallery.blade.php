<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерија - Аутосервис</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/20zG1zJ/1xJ/jR/h/yB1T8zG1Bw1uLpGvD+C8Q8pQ6/vE1F0e2fQ2p9/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    @include('components.navigation')

    <section class="bg-primary py-20 text-center text-white">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                Галерија наших радова
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-light-gray">
                Визуелни доказ нашег квалитета и посвећености.
            </p>
        </div>
    </section>

    <section class="bg-light-gray py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-dark-gray text-center mb-12" data-aos="fade-up">
                Погледајте наше најновије пројекте
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div class="rounded-lg overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/image6.jpg') }}" alt="Поправка мотора" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/image3.jpg') }}" alt="Сервис кочница" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('images/image5.jpg') }}" alt="Дијагностика" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                    <img src="{{ asset('images/image7.jpg') }}" alt="Мењање гума" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                </div>
                </div>
        </div>
    </section>
    
    @include('components.contact')

    @include('components.footer')

    
</body>
</html>