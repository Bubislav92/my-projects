@props(['isUnread' => false, 'icon' => 'user', 'time' => 'Пре 5 мин', 'user' => 'Ана Николић', 'action' => 'је прихватила ваш захтев за повезивање.'])

@php
    $bgColor = $isUnread ? 'bg-white shadow-sm' : 'bg-gray-50';
    $dotColor = $isUnread ? 'bg-carrerwire-orange' : 'bg-transparent';
@endphp

<div {{ $attributes->merge(['class' => 'p-4 rounded-lg border border-gray-200 flex items-start space-x-4 transition duration-150 hover:shadow-md ' . $bgColor]) }}>
    
    {{-- Статус и Икона --}}
    <div class="flex-shrink-0 pt-1">
        <div class="relative">
            {{-- Црвена тачка за непрочитано --}}
            <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full {{ $dotColor }}"></span>
            
            {{-- Икона (Пример: user/like/comment) --}}
            <div class="w-10 h-10 rounded-full bg-carrerwire-green-light flex items-center justify-center text-white">
                @if ($icon == 'user')
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                @elseif ($icon == 'like')
                     <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h-2m2 0h2m-2 0V8a2 2 0 10-4 0v2m4 0h2m-2 0v2a2 2 0 11-4 0v-2m4 0h2m-2 0V8a2 2 0 10-4 0v2m4 0h2m-2 0v2a2 2 0 11-4 0v-2" /></svg>
                @elseif ($icon == 'comment')
                     <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                @endif
            </div>
        </div>
    </div>

    {{-- Садржај Обавештења --}}
    <div class="flex-1 min-w-0">
        <p class="text-sm text-gray-700 leading-relaxed">
            <a href="#" class="font-bold text-gray-900 hover:text-carrerwire-green">{{ $user }}</a> {{ $action }}
        </p>
        <p class="text-xs text-gray-400 mt-1">{{ $time }}</p>
    </div>
    
    {{-- Дугме за Акцију (нпр. "Погледај профил") --}}
    <div class="flex-shrink-0 mt-1">
        <a href="#" class="text-sm font-semibold text-carrerwire-orange hover:text-carrerwire-orange-dark transition duration-150">
            Погледај
        </a>
    </div>
</div>