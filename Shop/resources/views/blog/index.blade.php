<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>Our Nature Blog - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        {{-- Главни наслов странице --}}
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('blog_store.blog_title') }}</h1>

        {{-- Sekcija sa istaknutim člancima (Featured Posts) --}}
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-dark-gray mb-6 text-center">{{ __('blog_store.featured_articles') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Уклоњена су фиксна @php polja i zamenjena su pravim podacima --}}
                @foreach ($featuredPosts as $post)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out flex flex-col">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="block relative overflow-hidden" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/blog/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-56 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">
                        </a>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-dark-gray mb-2">
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out" target="_blank" rel="noopener noreferrer">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-700 text-base mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500 mt-4">
                                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $post->published_at->format('F d, Y') }}</span>
                                <a href="{{ url('/blog/' . $post->slug) }}" class="text-primary-green hover:underline font-semibold" target="_blank" rel="noopener noreferrer">{{ __('blog_store.read_more') }} <i class="fa-solid fa-arrow-right ml-1 text-xs"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Sekcija sa svim člancima (All Posts) --}}
        <section>
            <h2 class="text-3xl font-bold text-dark-gray mb-6 text-center">{{ __('blog_store.all_articles') }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Уклоњена су фиксна @php polja i zamenjena su pravim podacima --}}
                @foreach ($allPosts as $post)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out flex flex-col">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="block relative overflow-hidden" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/blog/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-48 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">
                        </a>
                        <div class="p-5 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-dark-gray mb-2">
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out" target="_blank" rel="noopener noreferrer">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                            </div>
                            <div class="flex justify-between items-center text-xs text-gray-500 mt-auto">
                                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $post->published_at->format('F d, Y') }}</span>
                                <a href="{{ url('/blog/' . $post->slug) }}" class="text-primary-green hover:underline font-semibold" target="_blank" rel="noopener noreferrer">Read More <i class="fa-solid fa-arrow-right ml-1 text-xs"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <x-footer />
</body>
</html>