{{-- auth-session-status.blade.php --}}
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-secondary-green']) }}> {{-- Зелена боја за успех поруке --}}
        {{ $status }}
    </div>
@endif
