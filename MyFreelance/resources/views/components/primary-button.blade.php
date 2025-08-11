{{-- primary-button.blade.php --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-primary-orange border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2 transition duration-300 ease-in-out shadow-lg hover:shadow-xl hover:-translate-y-0.5 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
