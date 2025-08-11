{{-- input-label.blade.php --}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-dark-gray']) }}> {{-- Користи dark-gray за текст --}}
    {{ $value ?? $slot }}
</label>
