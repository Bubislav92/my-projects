<x-header />

<main class="py-16 md:py-24 bg-primary-dark">
    <div class="container mx-auto px-6 max-w-4xl text-center">

        <h1 class="text-4xl font-bold text-accent mb-6">Plaćanje otkazano</h1>
        <p class="text-lg text-text-light/80 mb-8">{{ $message }}</p>

        <a href="{{ route('shop') }}" 
           class="px-6 py-3 bg-accent text-primary-dark font-semibold rounded-lg hover:bg-opacity-90 transition">
           Povratak na Shop
        </a>

    </div>
</main>

<x-footer />
