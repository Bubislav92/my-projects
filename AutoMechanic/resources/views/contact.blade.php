<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контактирајте нас - Аутосервис</title>

    {{-- Увоз Таилвинд CSS-а --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Увоз Font Awesome икона --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/20zG1zJ/1xJ/jR/h/yB1T8zG1Bw1uLpGvD+C8Q8pQ6/vE1F0e2fQ2p9/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- CSS за Flatpickr календар --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>

    @include('components.navigation')

    <section class="bg-primary py-20 text-center text-white">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                Контактирајте нас
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-light-gray">
                Ту смо за све ваше потребе везане за аутомобил.
            </p>
        </div>
    </section>

    <section class="bg-light-gray py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-dark-gray mb-6">Закажите термин</h2>
                    <form action="#" method="POST">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Име и презиме</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Ваше име" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold mb-2">Е-пошта</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Ваша е-пошта" required>
                        </div>
                        <div class="mb-4">
                            <label for="datum" class="block text-gray-700 font-semibold mb-2">Захтевани датум</label>
                            <input type="text" id="datum" name="datum" class="datepicker w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Изаберите датум" required>
                        </div>
                        <div class="mb-4">
                            <label for="vozilo" class="block text-gray-700 font-semibold mb-2">Произвођач возила</label>
                            <input type="text" id="vozilo" name="vozilo" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Нпр. Audi, BMW" required>
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-gray-700 font-semibold mb-2">Модел возила</label>
                            <input type="text" id="model" name="model" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Нпр. A4, X5" required>
                        </div>
                        <div class="mb-4">
                            <label for="godina" class="block text-gray-700 font-semibold mb-2">Година производње</label>
                            <input type="number" id="godina" name="godina" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Нпр. 2015" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-semibold mb-2">Опис проблема</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Детаљно опишите проблем са возилом."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-secondary text-primary font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:bg-accent transition duration-300 transform hover:scale-105">
                            Пошаљи захтев
                        </button>
                    </form>
                </div>

                <div class="flex flex-col gap-8" data-aos="fade-left">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-dark-gray mb-4">Наши подаци</h3>
                        <ul class="space-y-4 text-lg text-gray-700">
                            <li>
                                <i class="fas fa-map-marker-alt text-secondary mr-2"></i>
                                Адреса: <span class="font-semibold">Улица слободе 123, Београд</span>
                            </li>
                            <li>
                                <i class="fas fa-phone-alt text-secondary mr-2"></i>
                                Телефон: <a href="tel:+381641234567" class="hover:text-secondary transition-colors">+381 64 123 4567</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope text-secondary mr-2"></i>
                                Е-пошта: <a href="mailto:info@automehanika.rs" class="hover:text-secondary transition-colors">info@automehanika.rs</a>
                            </li>
                            <li>
                                <i class="far fa-clock text-secondary mr-2"></i>
                                Радно време: <span class="font-semibold">Пон - Пет: 08:00 - 17:00</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-lg">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.598585648795!2d20.45785021571431!3d44.81232827909873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a726b2b79a5%3A0x63a3d2424b9a5c48!2sBelgrade!5e0!3m2!1sen!2srs!4v1655850022067!5m2!1sen!2srs"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

    {{-- JS за Flatpickr календар --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d", // Формат датума
            minDate: "today" // Минимални датум је данашњи дан
        });
    </script>

    
</body>
</html>