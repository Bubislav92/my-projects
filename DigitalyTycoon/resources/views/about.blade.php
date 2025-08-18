<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нама - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    <main>
        <section class="bg-secondary-dark text-text-light text-center py-20">
            <div class="container mx-auto px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold text-accent mb-4">
                    Упознајте DigitalyTycoon
                </h1>
                <p class="text-xl md:text-2xl max-w-3xl mx-auto">
                    Ми смо тим страствених стручњака посвећених стварању изузетних дигиталних искустава.
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold text-accent mb-6">
                        Наша прича и мисија
                    </h2>
                    <p class="mb-4 text-lg leading-relaxed">
                        **DigitalyTycoon** је основан са једноставном, али снажном идејом: да се технологија и креативност споје у јединствена веб решења. Почели смо као мали тим са великим сновима, верујући да сваки бизнис заслужује да има снажно дигитално присуство. Наша мисија је да нашим клијентима омогућимо раст и успех кроз иновативна и квалитетна решења.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Кроз сваки пројекат, настојимо да превазиђемо очекивања, не само кроз техничку изврсност, већ и кроз разумевање ваших пословних циљева. Верујемо у партнерство, транспарентност и посвећеност, и то је темељ нашег пословања.
                    </p>
                </div>
                <div data-aos="fade-left">
                    <img src="https://via.placeholder.com/600x450.png?text=Tim+u+akciji" alt="Тим у акцији" class="rounded-lg shadow-xl w-full h-auto">
                </div>
            </div>
        </section>

        <section class="bg-secondary-dark py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-accent mb-12" data-aos="fade-up">
                    Упознајте наш тим
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                        <img src="https://via.placeholder.com/200x200.png?text=Иван" alt="Иван Петровић" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-semibold">Иван Петровић</h3>
                        <p class="text-sm text-text-light/70">Оснивач и главни архитекта</p>
                    </div>
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                        <img src="https://via.placeholder.com/200x200.png?text=Ана" alt="Ана Јовановић" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-semibold">Ана Јовановић</h3>
                        <p class="text-sm text-text-light/70">Вођа пројеката</p>
                    </div>
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                        <img src="https://via.placeholder.com/200x200.png?text=Марко" alt="Марко Костић" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-semibold">Марко Костић</h3>
                        <p class="text-sm text-text-light/70">Веб дизајнер</p>
                    </div>
                    <div class="text-center" data-aos="zoom-in" data-aos-delay="400">
                        <img src="https://via.placeholder.com/200x200.png?text=Милена" alt="Милена Павловић" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-semibold">Милена Павловић</h3>
                        <p class="text-sm text-text-light/70">SEO и маркетинг</p>
                    </div>
                </div>
            </div>
        </section>

        <x-cta />
    </main>

    <x-footer />

</body>
</html>
