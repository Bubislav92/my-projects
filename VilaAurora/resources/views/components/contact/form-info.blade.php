<section class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid lg:grid-cols-3 gap-12 lg:gap-16">

            {{-- Лева колона: Контакт Формулар --}}
            <div class="lg:col-span-2 p-8 bg-primary-50 rounded-xl shadow-2xl">
                <h2 class="text-3xl font-serif font-bold text-primary-900 mb-8 border-b pb-4 border-accent-500/50">
                    Пошаљите Упит
                </h2>
                
                {{-- Почетак Форме (Замените action и method према Laravel рутама) --}}
                <form action="/contact" method="POST" class="space-y-6">
                    @csrf {{-- Laravel CSRF Токен --}}

                    {{-- Име и Презиме --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-primary-900 mb-1">Име и Презиме</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300 bg-white placeholder-primary-900/50">
                    </div>

                    {{-- И-мејл --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-primary-900 mb-1">И-мејл Адреса</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300 bg-white placeholder-primary-900/50">
                    </div>

                    {{-- Порука --}}
                    <div>
                        <label for="message" class="block text-sm font-medium text-primary-900 mb-1">Порука</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300 bg-white placeholder-primary-900/50"></textarea>
                    </div>

                    {{-- Дугме за слање --}}
                    <div>
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center 
                                       px-6 py-3 border border-transparent text-base font-bold rounded-full 
                                       text-primary-900 bg-accent-500 hover:bg-accent-700 transition duration-300 shadow-lg">
                            Пошаљите Поруку
                        </button>
                    </div>
                </form>
            </div>

            {{-- Десна колона: Контакт Информације --}}
            <div class="lg:col-span-1 p-8 bg-primary-900 rounded-xl shadow-2xl space-y-8">
                <h2 class="text-3xl font-serif font-bold text-accent-500 mb-6">
                    Директни Контакт
                </h2>
                
                {{-- Телефон --}}
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-primary-50">Телефон</h3>
                    <a href="tel:+38111222333" class="text-xl text-primary-50/90 hover:text-accent-500 transition duration-300 font-mono">
                        +381 11 222 333
                    </a>
                </div>

                {{-- И-мејл --}}
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-primary-50">И-мејл</h3>
                    <a href="mailto:info@vilaaurora.rs" class="text-xl text-primary-50/90 hover:text-accent-500 transition duration-300">
                        info@vilaaurora.rs
                    </a>
                </div>

                {{-- Адреса --}}
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-primary-50">Адреса</h3>
                    <p class="text-primary-50/90 text-lg">
                        Улица Луксуза бр. 1,<br>
                        11000 Београд, Србија
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>