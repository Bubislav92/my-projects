<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Услуге - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    <main>
        <section class="bg-secondary-dark text-text-light text-center py-20">
            <div class="container mx-auto px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold text-accent mb-4">
                    Наше Услуге
                </h1>
                <p class="text-lg md:text-xl max-w-3xl mx-auto">
                    Пружамо широк спектар услуга за развој и унапређење вашег дигиталног пословања.
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-laptop-code text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">Развој веб сајтова</h3>
                        <p class="text-text-light/80">
                            Креирамо модеран, функционалан и оптимизован веб сајт прилагођен вашим потребама. Од једноставних портфолија до комплексних презентационих сајтова.
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-shopping-cart text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">Е-комерц решења</h3>
                        <p class="text-text-light/80">
                            Израђујемо сигурне и интуитивне онлајн продавнице које ће повећати вашу продају и поједноставити управљање.
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-drafting-compass text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">UI/UX Дизајн</h3>
                        <p class="text-text-light/80">
                            Фокусирамо се на стварање визуелно привлачног и лаког за коришћење дизајна који гарантује најбоље корисничко искуство.
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="fas fa-chart-line text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">SEO и маркетинг</h3>
                        <p class="text-text-light/80">
                            Помажемо вам да повећате видљивост на интернету, привучете нове клијенте и остварите већи повраћај инвестиције.
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="500">
                        <i class="fas fa-headset text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">Одржавање и подршка</h3>
                        <p class="text-text-light/80">
                            Пружамо континуирану подршку, ажурирања и одржавање како би ваш сајт увек био сигуран и функционалан.
                        </p>
                    </div>

                    <div class="bg-secondary-dark rounded-lg p-8 shadow-xl text-center" data-aos="fade-up" data-aos-delay="600">
                        <i class="fas fa-server text-accent text-5xl mb-6"></i>
                        <h3 class="text-2xl font-semibold mb-2">Домен и Хостинг</h3>
                        <p class="text-text-light/80">
                            Обезбеђујемо поуздан хостинг и регистрацију домена како би ваш веб сајт био брз, сигуран и увек доступан.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-20 bg-secondary-dark">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold text-accent mb-12" data-aos="fade-up">Зашто нас одабрати?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="p-6 rounded-lg" data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-check-circle text-accent text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Стручност и искуство</h4>
                        <p class="text-text-light/80">
                            Наш тим чине искусни професионалци са дугогодишњим искуством у дигиталној индустрији.
                        </p>
                    </div>
                    <div class="p-6 rounded-lg" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fas fa-handshake text-accent text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Партнерски приступ</h4>
                        <p class="text-text-light/80">
                            Не третирамо вас само као клијента, већ као партнера. Заједно радимо на постизању најбољих резултата.
                        </p>
                    </div>
                    <div class="p-6 rounded-lg" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-star text-accent text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Квалитет без компромиса</h4>
                        <p class="text-text-light/80">
                            Посвећени смо пружању решења највишег квалитета, од дизајна до имплементације.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <x-cta />
    </main>

    <x-footer />

</body>
</html>
