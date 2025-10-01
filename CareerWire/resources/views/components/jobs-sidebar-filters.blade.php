<div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 p-5 space-y-6">
    
    <h3 class="text-xl font-bold text-gray-800 border-b border-gray-200 pb-3">Филтери за претрагу</h3>
    
    {{-- Филтер 1: Локација --}}
    <div>
        <h4 class="text-lg font-semibold text-gray-700 mb-2">Локација</h4>
        <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-carrerwire-green focus:ring-carrerwire-green-light text-gray-700">
            <option>Београд</option>
            <option>Нови Сад</option>
            <option>Удаљени (Remote)</option>
            <option>Сви градови</option>
        </select>
    </div>
    
    {{-- Филтер 2: Ниво Искуства --}}
    <div>
        <h4 class="text-lg font-semibold text-gray-700 mb-2">Ниво Искуства</h4>
        <div class="space-y-2">
            <label class="flex items-center text-gray-600 text-sm">
                <input type="checkbox" class="rounded text-carrerwire-green focus:ring-carrerwire-green-dark border-gray-300">
                <span class="ml-2">Јуниор (0-2 год)</span>
            </label>
            <label class="flex items-center text-gray-600 text-sm">
                <input type="checkbox" class="rounded text-carrerwire-green focus:ring-carrerwire-green-dark border-gray-300">
                <span class="ml-2">Мид (2-5 год)</span>
            </label>
            <label class="flex items-center text-gray-600 text-sm">
                <input type="checkbox" class="rounded text-carrerwire-green focus:ring-carrerwire-green-dark border-gray-300">
                <span class="ml-2">Сениор (5+ год)</span>
            </label>
        </div>
    </div>
    
    {{-- Филтер 3: Тип Посла --}}
    <div>
        <h4 class="text-lg font-semibold text-gray-700 mb-2">Тип Посла</h4>
        <div class="space-y-2">
             <label class="flex items-center text-gray-600 text-sm">
                <input type="radio" name="job_type" class="text-carrerwire-green focus:ring-carrerwire-green-dark border-gray-300">
                <span class="ml-2">Пуно радно време</span>
            </label>
            <label class="flex items-center text-gray-600 text-sm">
                <input type="radio" name="job_type" class="text-carrerwire-green focus:ring-carrerwire-green-dark border-gray-300">
                <span class="ml-2">Хонорарни</span>
            </label>
            <label class="flex items-center text-gray-600 text-sm">
                <input type="radio" name="job_type" class="text-carrerwire-green focus:ring-carrerwire-green-dark border-gray-300">
                <span class="ml-2">Уговорни</span>
            </label>
        </div>
    </div>
    
    {{-- Дугме за примену филтера --}}
    <div class="pt-3 border-t border-gray-200">
        <button class="w-full py-2 text-sm font-semibold rounded-md text-white bg-carrerwire-green hover:bg-carrerwire-green-dark transition duration-150">
            Примени филтере
        </button>
    </div>
</div>