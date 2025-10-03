<section class="py-20 lg:py-32 bg-primary-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white p-6 md:p-12 rounded-xl shadow-2xl border-t-8 border-accent-500">
            
            {{-- Индикатор Корака (Визуелни приказ напретка) --}}
            <div class="flex justify-between items-center mb-10 relative">
                <div class="absolute top-1/2 left-0 w-full h-1 bg-primary-900/10 -translate-y-1/2 z-0"></div>
                
                {{-- Корак 1 --}}
                <div class="relative z-10 text-center">
                    <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center bg-accent-500 text-primary-900 font-bold shadow-md">1</div>
                    <p class="mt-2 text-sm text-primary-900 font-semibold">Датум & Тип</p>
                </div>
                
                {{-- Корак 2 --}}
                <div class="relative z-10 text-center">
                    <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center bg-primary-900/20 text-primary-900 font-bold shadow-md">2</div>
                    <p class="mt-2 text-sm text-primary-900/70">Подаци</p>
                </div>
                
                {{-- Корак 3 --}}
                <div class="relative z-10 text-center">
                    <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center bg-primary-900/20 text-primary-900 font-bold shadow-md">3</div>
                    <p class="mt-2 text-sm text-primary-900/70">Потврда</p>
                </div>
            </div>
            
            {{-- Формулар: Корак 1 (Датум и Тип Смештаја) --}}
            <div id="step-1" class="space-y-6">
                <h3 class="text-2xl font-serif font-bold text-primary-900 border-b pb-3 mb-6">1. Изаберите Термин и Смештај</h3>
                
                <form action="/reservation-step-1" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- Датум Доласка --}}
                    <div>
                        <label for="check_in" class="block text-sm font-medium text-primary-900 mb-1">Датум Доласка</label>
                        <input type="date" id="check_in" name="check_in" required
                               class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300">
                    </div>

                    {{-- Датум Одласка --}}
                    <div>
                        <label for="check_out" class="block text-sm font-medium text-primary-900 mb-1">Датум Одласка</label>
                        <input type="date" id="check_out" name="check_out" required
                               class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300">
                    </div>
                    
                    {{-- Тип Смештаја --}}
                    <div>
                        <label for="accommodation_type" class="block text-sm font-medium text-primary-900 mb-1">Тип Смештаја</label>
                        <select id="accommodation_type" name="accommodation_type" required
                                class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300 bg-white">
                            <option value="">-- Изаберите Апартман --</option>
                            <option value="presidential">Председнички Апартман</option>
                            <option value="deluxe">Делукс Апартман</option>
                            {{-- ... остали типови --}}
                        </select>
                    </div>

                    {{-- Број Гостију --}}
                    <div>
                        <label for="guests" class="block text-sm font-medium text-primary-900 mb-1">Број Гостију</label>
                        <input type="number" id="guests" name="guests" min="1" max="6" required
                               class="w-full px-4 py-3 border border-primary-900/20 rounded-lg focus:border-accent-500 focus:ring-accent-500 transition duration-300">
                    </div>
                    
                    {{-- Дугме за Напред (Ово би у реалном пројекту водило на други корак) --}}
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center 
                                       px-6 py-3 border border-transparent text-base font-bold rounded-full 
                                       text-primary-900 bg-accent-500 hover:bg-accent-700 transition duration-300 shadow-lg">
                            Настави на Податке Госта
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Напомена о Ценама (Флексибилније) --}}
            <p class="mt-8 text-sm text-primary-900/70 text-center">
                * Цена ће бити аутоматски израчуната на следећем кораку након провере доступности.
            </p>

        </div>
    </div>
</section>