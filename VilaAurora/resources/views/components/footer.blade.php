<footer class="bg-primary-900 text-primary-50 pt-16 pb-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 border-b border-accent-500/20 pb-10">

            {{-- 1. Секција: Логотип и Опис --}}
            <div class="col-span-2 md:col-span-1 space-y-4">
                <h3 class="text-3xl font-serif font-bold text-accent-500 tracking-wider mb-3">
                    Вила „Аурора”
                </h3>
                <p class="text-sm leading-relaxed text-primary-50/80">
                    Место где се луксуз сусреће са миром. Идеално одредиште за незабораван преноћиште у префињеном амбијенту.
                </p>
                <p class="text-xs mt-4">
                    <span class="text-accent-500 font-semibold">Радно време:</span> 00:00 - 24:00 (Доступан за резервације)
                </p>
            </div>

            {{-- 2. Секција: Корисни линкови --}}
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-accent-500 mb-4">Корисни линкови</h4>
                <ul class="space-y-2 text-primary-50/80">
                    <li>
                        <a href="#o-nama" class="hover:text-accent-500 transition duration-300">О вили</a>
                    </li>
                    <li>
                        <a href="#smestaj" class="hover:text-accent-500 transition duration-300">Типови смештаја</a>
                    </li>
                    <li>
                        <a href="#uslovi" class="hover:text-accent-500 transition duration-300">Услови коришћења</a>
                    </li>
                    <li>
                        <a href="#politika" class="hover:text-accent-500 transition duration-300">Политика приватности</a>
                    </li>
                </ul>
            </div>

            {{-- 3. Секција: Контакт информације --}}
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-accent-500 mb-4">Контакт</h4>
                <ul class="space-y-3 text-primary-50/80">
                    <li class="flex items-start">
                        {{-- Иконица: Локација --}}
                        <svg class="flex-shrink-0 w-5 h-5 mr-3 text-accent-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Улица Луксуза бр. 1, <br> 11000 Београд, Србија</span>
                    </li>
                    <li class="flex items-center">
                        {{-- Иконица: Телефон --}}
                        <svg class="flex-shrink-0 w-5 h-5 mr-3 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.128a11.042 11.042 0 005.516 5.516l1.128-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <a href="tel:+38111222333" class="hover:text-accent-500">+381 11 222 333</a>
                    </li>
                    <li class="flex items-center">
                        {{-- Иконица: И-мејл --}}
                        <svg class="flex-shrink-0 w-5 h-5 mr-3 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-1 10H4a2 2 0 01-2-2V6a2 2 0 012-2h16a2 2 0 012 2v10a2 2 0 01-2 2z"></path></svg>
                        <a href="mailto:info@vilaaurora.rs" class="hover:text-accent-500">info@vilaaurora.rs</a>
                    </li>
                </ul>
            </div>
            
            {{-- 4. Секција: Друштвене мреже --}}
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-accent-500 mb-4">Пратите нас</h4>
                <div class="flex space-x-4">
                    {{-- Инстаграм --}}
                    <a href="#" target="_blank" aria-label="Инстаграм" class="text-primary-50/80 hover:text-accent-500 transition duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm6.368 1.446c1.682 0 2.834 1.152 2.834 2.834v13.44c0 1.682-1.152 2.834-2.834 2.834H5.632c-1.682 0-2.834-1.152-2.834-2.834V5.28c0-1.682 1.152-2.834 2.834-2.834h12.736zm-6.368 4.674a5.834 5.834 0 100 11.668 5.834 5.834 0 000-11.668zm0 2.215a3.619 3.619 0 110 7.238 3.619 3.619 0 010-7.238zm6.54-3.094a1.442 1.442 0 100 2.884 1.442 1.442 0 000-2.884z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    {{-- Фејсбук --}}
                    <a href="#" target="_blank" aria-label="Фејсбук" class="text-primary-50/80 hover:text-accent-500 transition duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.091 2H1.909A1.909 1.909 0 000 3.909v16.182A1.909 1.909 0 001.909 22h10.364v-7.909H9.091v-3.091h3.182V8.909c0-3.182 1.909-4.909 4.727-4.909 1.364 0 2.545.091 2.864.136v2.545h-1.545c-1.545 0-1.818.727-1.818 1.773v2.318h3.455l-.455 3.091h-3v7.909h5.455A1.909 1.909 0 0024 20.091V3.909A1.909 1.909 0 0022.091 2z"/>
                        </svg>
                    </a>

                    {{-- Твитер/X --}}
                    <a href="#" target="_blank" aria-label="Твитер/X" class="text-primary-50/80 hover:text-accent-500 transition duration-300">
                         <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.901 1.054h3.639L14.076 9.87 23.992 23h-9.873L7.756 13.91 1.76 23H.12L10.742 8.78.36 1.054h10.08L16.29 7.784l2.61-6.73zM15.228 20.973h2.645L5.787 3.03H3.04L15.228 20.973z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Под-футер (Копирајт) --}}
        <div class="mt-8 pt-4 flex flex-col md:flex-row justify-between items-center text-sm text-primary-50/60">
            <p>&copy; {{ date('Y') }} Вила „Аурора”. Сва права задржана.</p>
            <p class="mt-2 md:mt-0">
                Развио и дизајнирао: 
                <a href="https://www.digitalytycoon.com" target="_blank" class="font-semibold text-accent-500 hover:text-primary-50 transition duration-300">
                    Digitaly Tycoon
                </a>
            </p>        
        </div>
    </div>
</footer>