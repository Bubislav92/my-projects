@props(['isSender' => false, 'time' => '10:30', 'content' => 'Ово је тест порука.'])

@if ($isSender)
    {{-- Порука коју је послао пријављени корисник (Десно) --}}
    <div class="flex justify-end mb-4">
        <div class="max-w-xs md:max-w-md lg:max-w-lg">
            <div class="bg-carrerwire-green-light text-white rounded-t-xl rounded-bl-xl p-3 shadow-sm">
                <p class="text-sm">{{ $content }}</p>
            </div>
            <p class="text-xs text-gray-400 mt-1 text-right">{{ $time }}</p>
        </div>
    </div>
@else
    {{-- Порука коју је примио корисник (Лево) --}}
    <div class="flex justify-start mb-4">
        {{-- Аватар (Опционо) --}}
        <div class="w-8 h-8 rounded-full bg-carrerwire-orange flex items-center justify-center text-white text-sm flex-shrink-0 mr-3">
             {{ strtoupper(substr($name ?? 'Р', 0, 1)) }}
        </div>
        
        <div class="max-w-xs md:max-w-md lg:max-w-lg">
            <div class="bg-gray-200 text-gray-800 rounded-t-xl rounded-br-xl p-3 shadow-sm">
                <p class="text-sm">{{ $content }}</p>
            </div>
            <p class="text-xs text-gray-400 mt-1 text-left">{{ $time }}</p>
        </div>
    </div>
@endif