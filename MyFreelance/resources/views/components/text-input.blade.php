{{-- text-input.blade.php --}}
@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-primary-orange focus:ring-primary-orange rounded-md shadow-sm transition duration-200 ease-in-out']) !!}>
