@props(['user'])

<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex flex-col items-center text-center">
    
    {{-- Аватар --}}
    <a href="#" class="block w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-xl text-gray-600 font-bold overflow-hidden">
        {{-- Замените са стварном сликом --}}
        {{ strtoupper(substr($user->name ?? 'М', 0, 1)) }}
    </a>

    {{-- Име и Позиција --}}
    <a href="#" class="mt-3 text-lg font-semibold text-gray-800 hover:text-carrerwire-green-dark transition duration-150 leading-tight">
        {{ $user->name ?? 'Мила Милановић' }}
    </a>
    <p class="text-sm text-gray-500 mt-1">
        {{ $user->headline ?? 'Маркетинг Менаџер' }}
    </p>

    {{-- Међусобне везе (опционо) --}}
    <p class="text-xs text-gray-400 mt-2">
        <span class="font-medium text-carrerwire-orange">10</span> заједничких веза
    </p>

    {{-- Дугме за Акцију --}}
    <div class="mt-4 w-full">
        <button class="w-full py-2 text-sm font-semibold rounded-full border border-carrerwire-green text-carrerwire-green hover:bg-carrerwire-green hover:text-white transition duration-150">
            + Повежи се
        </button>
    </div>

</div>