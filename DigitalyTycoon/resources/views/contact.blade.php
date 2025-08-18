<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакт - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    <main>
        <section class="bg-secondary-dark text-text-light text-center py-20">
            <div class="container mx-auto px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold text-accent mb-4">
                    Контактирајте нас
                </h1>
                <p class="text-lg md:text-xl max-w-3xl mx-auto">
                    Спремни сте да започнете свој пројекат? Пошаљите нам поруку и ми ћемо вам се јавити у најкраћем року.
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-start">
                <div data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-accent mb-6">Опишите нам свој пројекат</h2>
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="full_name" class="block text-sm font-semibold mb-2">Име и презиме</label>
                            <input type="text" id="full_name" name="full_name" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required>
                        </div>
                        <div>
                            <label for="company_name" class="block text-sm font-semibold mb-2">Назив ваше фирме (опционо)</label>
                            <input type="text" id="company_name" name="company_name" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold mb-2">Ваша е-пошта</label>
                            <input type="email" id="email" name="email" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold mb-2">Телефон (опционо)</label>
                            <input type="tel" id="phone" name="phone" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent">
                        </div>
                        <div>
                            <label for="project_type" class="block text-sm font-semibold mb-2">Тип пројекта</label>
                            <select id="project_type" name="project_type" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required>
                                <option value="">Изаберите опцију</option>
                                <option value="website">Нови веб сајт</option>
                                <option value="ecommerce">Е-продавница</option>
                                <option value="redesign">Ре-дизајн постојећег сајта</option>
                                <option value="maintenance">Одржавање и подршка</option>
                                <option value="custom_app">Израда custom апликације</option>
                                <option value="other">Друго</option>
                            </select>
                        </div>
                        <div>
                            <label for="budget" class="block text-sm font-semibold mb-2">Процењени буџет (опционо)</label>
                            <select id="budget" name="budget" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent">
                                <option value="">Изаберите опцију</option>
                                <option value="<5000">Мање од 5.000 €</option>
                                <option value="5000-10000">5.000 € - 10.000 €</option>
                                <option value="10000-20000">10.000 € - 20.000 €</option>
                                <option value=">20000">Више од 20.000 €</option>
                                <option value="unknown">Нисам сигуран/на</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold mb-2">Детаљан опис пројекта</label>
                            <textarea id="message" name="message" rows="6" class="w-full p-3 rounded-md bg-primary-dark border border-gray-600 text-text-light focus:outline-none focus:ring-2 focus:ring-accent" required></textarea>
                        </div>

                        <div>
                            <button type="submit" class="w-full bg-accent text-primary-dark font-bold py-3 px-6 rounded-md shadow-lg hover:bg-opacity-80 transition-colors duration-300">
                                Пошаљи поруку
                            </button>
                        </div>
                    </form>
                </div>

                <div data-aos="fade-left" class="space-y-12">
                    <div class="space-y-6 text-lg">
                        <h2 class="text-3xl font-bold text-accent mb-6">Информације за контакт</h2>
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-accent text-2xl mr-4 mt-1"></i>
                            <div>
                                <h3 class="font-semibold">Адреса</h3>
                                <p>Улица Дигиталног Тигра 10, Нови Београд, Србија</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-accent text-2xl mr-4 mt-1"></i>
                            <div>
                                <h3 class="font-semibold">Е-пошта</h3>
                                <p>info@digitalytycoon.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone-alt text-accent text-2xl mr-4 mt-1"></i>
                            <div>
                                <h3 class="font-semibold">Телефон</h3>
                                <p>+381 11 123 4567</p>
                            </div>
                        </div>
                    </div>

                    <div data-aos="zoom-in">
                        <h3 class="text-2xl font-bold text-accent mb-4">Наша локација</h3>
                        <div class="w-full h-80 rounded-lg overflow-hidden shadow-xl">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.400262635999!2d20.446864076394595!3d44.81423877107386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a709b4d89e4ad%3A0xc3f34f3d2f9d519d!2z0J3QvtCy0L3QsNC60YPQvdCw0Y8g0JHQtdC70LDRgNC-0LIsINCd0L7Rj9C00LAsINCb0L7QstC-0YAg0JHQtdC70LDRgNC-0LAsINC_0YDQvtCz0YDQsNGB0LDQu9C10L3QuNC1INGA0YPRgdGD!5e0!3m2!1ssr!2srs!4v1724009786481!5m2!1ssr!2srs"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />

</body>
</html>
