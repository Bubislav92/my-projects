<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наше услуге - Аутосервис</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/20zG1zJ/1xJ/jR/h/yB1T8zG1Bw1uLpGvD+C8Q8pQ6/vE1F0e2fQ2p9/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    @include('components.navigation')

    <section class="bg-primary py-20 text-center text-white">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                Комплетне услуге за ваше возило
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-light-gray">
                Од дијагностике до комплетних поправки, ми смо ваш партнер на путу.
            </p>
        </div>
    </section>

    <section class="bg-light-gray py-20">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="w-full md:w-1/2" data-aos="fade-right">
                <h2 class="text-4xl font-bold text-dark-gray mb-4">Компјутерска дијагностика</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    Користећи најновију дијагностичку опрему, прецизно и брзо утврђујемо све кварове на електронским системима вашег возила. Ова услуга је кључна за тачно лоцирање проблема и избегавање непотребних трошкова.
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li><span class="font-semibold text-secondary">Прецизно откривање кварова:</span> Читање и анализа грешака у меморији возила.</li>
                    <li><span class="font-semibold text-secondary">Системи мотора:</span> Провера рада мотора, сензора и електронских контролних јединица.</li>
                    <li><span class="font-semibold text-secondary">Провера АБС-а и ваздушних јастука:</span> Сигурносна дијагностика.</li>
                </ul>
            </div>
            <div class="w-full md:w-1/2" data-aos="fade-left">
                <img src="{{ asset('images/image5.jpg') }}" alt="Наш тим" class="rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center justify-between gap-12">
            <div class="w-full md:w-1/2" data-aos="fade-right">
                <img src="{{ asset('images/image3.jpg') }}" alt="Наш тим" class="rounded-lg shadow-lg">
            </div>
            <div class="w-full md:w-1/2" data-aos="fade-left">
                <h2 class="text-4xl font-bold text-dark-gray mb-4">Сервис кочница</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    Ваша безбедност је наш приоритет. Вршимо детаљну проверу, одржавање и замену кочионих система. Редовни сервис кочница осигурава да ваше возило увек реагује брзо и ефикасно у свакој ситуацији.
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li><span class="font-semibold text-secondary">Замена дискова и плочица:</span> Користимо само делове највишег квалитета.</li>
                    <li><span class="font-semibold text-secondary">Провера кочионе течности:</span> Утврђивање нивоа и квалитета течности.</li>
                    <li><span class="font-semibold text-secondary">Комплетан преглед система:</span> Од цилиндара до хидрауличних линија.</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-light-gray py-20">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="w-full md:w-1/2" data-aos="fade-right">
                <h2 class="text-4xl font-bold text-dark-gray mb-4">Замена уља и филтера</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    Редовна замена уља је срце одржавања мотора. Вршимо брзу и ефикасну замену уља и свих филтера (уља, ваздуха, горива) како би ваш мотор радио глатко и економично.
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li><span class="font-semibold text-secondary">Квалитетна уља:</span> Користимо уља која одговарају спецификацијама вашег возила.</li>
                    <li><span class="font-semibold text-secondary">Замена свих филтера:</span> Филтери за уље, ваздух и гориво.</li>
                    <li><span class="font-semibold text-secondary">Провера нивоа течности:</span> Допуна течности за хлађење и прање стакла.</li>
                </ul>
            </div>
            <div class="w-full md:w-1/2" data-aos="fade-left">
                <img src="{{ asset('images/image4.jpg') }}" alt="Наш тим" class="rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <section class="bg-secondary py-16 text-center text-primary">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4">Закажите свој термин већ данас!</h2>
            <a href="#" class="bg-primary text-secondary font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:bg-dark-gray transition duration-300 transform hover:scale-105">
                Контактирајте нас
            </a>
        </div>
    </section>

    @include('components.footer')

    
</body>
</html>