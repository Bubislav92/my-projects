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
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">Discover the Wonders of Nature</h1>

        {{-- Sekcija sa istaknutim člancima (Featured Posts) --}}
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-dark-gray mb-6 text-center">Featured Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $featuredPosts = [
                        (object)[
                            'title' => 'The Secret Life of Bees',
                            'excerpt' => 'Dive into the fascinating world of bees, their vital role in our ecosystem, and how we can protect them.',
                            'image' => 'blog-bees.jpg',
                            'slug' => 'secret-life-of-bees',
                            'date' => 'July 5, 2025'
                        ],
                        (object)[
                            'title' => 'Majestic Birds of Prey',
                            'excerpt' => 'Explore the habits and habitats of eagles, hawks, and owls, apex predators of the sky.',
                            'image' => 'blog-birds.jpg',
                            'slug' => 'majestic-birds-of-prey',
                            'date' => 'June 28, 2025'
                        ],
                        (object)[
                            'title' => 'Forest Guardians: The Role of Deer',
                            'excerpt' => 'Learn how deer contribute to forest health and their surprising impact on biodiversity.',
                            'image' => 'blog-deer.jpg',
                            'slug' => 'forest-guardians-deer',
                            'date' => 'June 20, 2025'
                        ],
                    ];
                @endphp

                @foreach ($featuredPosts as $post)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out flex flex-col">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="block relative overflow-hidden">
                            <img src="{{ asset('images/blog/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-56 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">
                        </a>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-dark-gray mb-2">
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-700 text-base mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500 mt-4">
                                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $post->date }}</span>
                                <a href="{{ url('/blog/' . $post->slug) }}" class="text-primary-green hover:underline font-semibold">Read More <i class="fa-solid fa-arrow-right ml-1 text-xs"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Sekcija sa svim člancima (All Posts) --}}
        <section>
            <h2 class="text-3xl font-bold text-dark-gray mb-6 text-center">All Articles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $allPosts = [
                        (object)[
                            'title' => 'Butterflies: Nature\'s Delicate Dancers',
                            'excerpt' => 'Discover the incredible metamorphosis of butterflies and their essential role as pollinators.',
                            'image' => 'blog-butterflies.jpg',
                            'slug' => 'butterflies-delicate-dancers',
                            'date' => 'July 1, 2025'
                        ],
                        (object)[
                            'title' => 'The Hidden World of Fungi',
                            'excerpt' => 'Beyond mushrooms: explore the mysterious and crucial underground networks of fungi.',
                            'image' => 'blog-fungi.jpg',
                            'slug' => 'hidden-world-of-fungi',
                            'date' => 'June 25, 2025'
                        ],
                        (object)[
                            'title' => 'The Intelligence of Crows',
                            'excerpt' => 'Learn about the remarkable problem-solving abilities and social structures of crows.',
                            'image' => 'blog-crows.jpg',
                            'slug' => 'intelligence-of-crows',
                            'date' => 'June 18, 2025'
                        ],
                        (object)[
                            'title' => 'Underwater Gardens: Coral Reefs',
                            'excerpt' => 'A look into the vibrant ecosystems of coral reefs and the threats they face.',
                            'image' => 'blog-coral.jpg',
                            'slug' => 'underwater-gardens-coral-reefs',
                            'date' => 'June 10, 2025'
                        ],
                        (object)[
                            'title' => 'The Mighty Oak: A Symbol of Strength',
                            'excerpt' => 'Uncover the ecological importance and cultural significance of oak trees.',
                            'image' => 'blog-oak.jpg',
                            'slug' => 'mighty-oak-strength',
                            'date' => 'June 3, 2025'
                        ],
                        (object)[
                            'title' => 'Nocturnal Hunters: Owls in the Wild',
                            'excerpt' => 'A deep dive into the unique adaptations that make owls silent and deadly predators of the night.',
                            'image' => 'blog-owls.jpg',
                            'slug' => 'nocturnal-hunters-owls',
                            'date' => 'May 28, 2025'
                        ],
                    ];
                @endphp

                @foreach ($allPosts as $post)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out flex flex-col">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="block relative overflow-hidden">
                            <img src="{{ asset('images/blog/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-48 object-cover object-center transform group-hover:scale-110 transition duration-500 ease-in-out">
                        </a>
                        <div class="p-5 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-dark-gray mb-2">
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="hover:text-primary-green transition duration-300 ease-in-out">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                            </div>
                            <div class="flex justify-between items-center text-xs text-gray-500 mt-auto">
                                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $post->date }}</span>
                                <a href="{{ url('/blog/' . $post->slug) }}" class="text-primary-green hover:underline font-semibold">Read More <i class="fa-solid fa-arrow-right ml-1 text-xs"></i></a>
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