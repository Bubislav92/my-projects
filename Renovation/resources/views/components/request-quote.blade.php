<section class="py-20 bg-light">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold font-serif text-center text-dark mb-16">
            Затражите понуду
        </h2>

        <div class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-xl">
            <h3 class="text-2xl font-semibold font-serif text-dark mb-4">
                Реците нам више о свом пројекту
            </h3>
            <p class="text-gray-600 mb-8">
                Попуните форму испод и ми ћемо вам се јавити са детаљном, бесплатном понудом, прилагођеном вашим потребама.
            </p>

            <form action="#" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-gray-700 font-bold mb-2">Име и презиме</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-bold mb-2">Е-пошта</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent" required>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="phone" class="block text-gray-700 font-bold mb-2">Број телефона</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent" required>
                </div>

                <hr class="my-8 border-gray-200">

                <h4 class="text-xl font-semibold text-dark mb-4">Детаљи пројекта</h4>
                <div class="mb-6">
                    <label for="project_type" class="block text-gray-700 font-bold mb-2">Врста реновирања</label>
                    <select id="project_type" name="project_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent">
                        <option value="">Изаберите...</option>
                        <option value="kuhinja">Реновирање кухиње</option>
                        <option value="kupatilo">Реновирање купатила</option>
                        <option value="ceo_stan">Комплетно реновирање стана/куће</option>
                        <option value="ostalo">Остало</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="surface" class="block text-gray-700 font-bold mb-2">Приближна површина (у м²)</label>
                    <input type="number" id="surface" name="surface" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent" min="1" required>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Опис пројекта</label>
                    <textarea id="description" name="description" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent" placeholder="Опишите детаљније шта је потребно да се уради..." required></textarea>
                </div>

                <div class="mb-6">
                    <label for="budget" class="block text-gray-700 font-bold mb-2">Предвиђени буџет</label>
                    <input type="text" id="budget" name="budget" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent" placeholder="нпр. 5.000€ - 10.000€">
                </div>

                <button type="submit" class="w-full bg-secondary text-primary font-bold py-3 rounded-full hover:bg-yellow-400 transition-colors duration-300">
                    Пошаљи захтев за понуду
                </button>
            </form>
        </div>
    </div>
</section>
