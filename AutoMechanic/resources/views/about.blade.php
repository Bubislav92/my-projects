<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нама - Аутосервис</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/20zG1zJ/1xJ/jR/h/yB1T8zG1Bw1uLpGvD+C8Q8pQ6/vE1F0e2fQ2p9/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    @include('components.navigation')

    <section class="bg-primary py-20 text-center text-white">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                Наша прича
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-light-gray">
                Више од две деценије посвећености квалитету и поузданости.
            </p>
        </div>
    </section>

    <section class="bg-light-gray py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-dark-gray text-center mb-12" data-aos="fade-up">
                Ко смо ми
            </h2>
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="w-full md:w-1/2" data-aos="fade-right">
                    <img src="{{ asset('images/image8.jpg') }}" alt="Аутосервис - Историја" class="rounded-lg shadow-lg">
                </div>
                <div class="w-full md:w-1/2" data-aos="fade-left">
                    <p class="text-lg text-gray-700 leading-relaxed mb-4">
                        Основани смо 2002. године са циљем да пружимо професионалне аутомеханичарске услуге. Започели смо као мала породична радионица и током година смо израсли у препознатљиво име у индустрији, захваљујући посвећености нашим клијентима и непрестаном усавршавању.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Користимо најновије технологије и дијагностичке алате како бисмо осигурали прецизност и ефикасност у сваком раду. Наш тим чине искусни и сертификовани механичари који су страствени према свом послу.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-dark-gray text-center mb-12" data-aos="fade-up">
                Упознајте наш тим
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center text-center p-6" data-aos="zoom-in" data-aos-delay="100">
                    <img src="https://via.placeholder.com/150" alt="Вођа тима" class="w-32 h-32 rounded-full mb-4 object-cover">
                    <h3 class="text-xl font-semibold text-dark-gray">Петар Петровић</h3>
                    <p class="text-secondary font-medium">Главни механичар</p>
                    <p class="mt-2 text-gray-600">Специјализован за дијагностику и поправку мотора са 15 година искуства.</p>
                </div>
                <div class="flex flex-col items-center text-center p-6" data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://via.placeholder.com/150" alt="Механичар" class="w-32 h-32 rounded-full mb-4 object-cover">
                    <h3 class="text-xl font-semibold text-dark-gray">Марко Марковић</h3>
                    <p class="text-secondary font-medium">Техничар за кочнице</p>
                    <p class="mt-2 text-gray-600">Експерт за безбедносне системе возила и сервис кочница.</p>
                </div>
                <div class="flex flex-col items-center text-center p-6" data-aos="zoom-in" data-aos-delay="500">
                    <img src="https://via.placeholder.com/150" alt="Менаџер" class="w-32 h-32 rounded-full mb-4 object-cover">
                    <h3 class="text-xl font-semibold text-dark-gray">Иван Ивановић</h3>
                    <p class="text-secondary font-medium">Менаџер радионице</p>
                    <p class="mt-2 text-gray-600">Води рачуна о логистици и комуникацији са клијентима.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-white text-center mb-12" data-aos="fade-up">
                Наше вредности
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center text-white">
                <div class="p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-secondary text-5xl mb-4">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2">Поузданост</h3>
                    <p class="text-light-gray">Грађење односа базираних на поверењу и искрености.</p>
                </div>
                <div class="p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-secondary text-5xl mb-4">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2">Квалитет</h3>
                    <p class="text-light-gray">Гарантујемо врхунске услуге и делове за ваш аутомобил.</p>
                </div>
                <div class="p-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-secondary text-5xl mb-4">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2">Транспарентност</h3>
                    <p class="text-light-gray">Јасна комуникација и детаљан извештај о свакој поправци.</p>
                </div>
            </div>
        </div>
    </section>
    
    @include('components.footer')

</body>
</html>