<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Dynamic page title --}}
    <title>{{ $post->title }} - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12 max-w-4xl">
        {{-- Link to go back to the blog index --}}
        <div class="mb-6">
            <a href="{{ route('blog') }}" class="flex items-center text-primary-green hover:underline font-semibold">
                <i class="fa-solid fa-arrow-left mr-2"></i> {{ __('blog_store.back_to_blog') }}
            </a>
        </div>
        
        {{-- Main article container --}}
        <article class="bg-white rounded-xl shadow-lg p-6 md:p-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-dark-gray mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center text-sm text-gray-500 mb-6">
                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $post->published_at->format('F d, Y') }}</span>
            </div>

            <img src="{{ asset('images/blog/' . $post->image) }}" 
                 alt="{{ $post->title }}"
                 class="w-full rounded-xl object-cover object-center mb-8">
            
            <div class="prose max-w-none text-gray-800 leading-relaxed">
                {{-- This is where the main content of the article will be placed --}}
                {{-- Pretpostavljamo da sadrzaj sadrzi HTML tagove. Ako ne, koristite {{ $post->content }} --}}
                {!! $post->content !!}
            </div>
        </article>
    </main>

    <x-footer />
</body>
</html>