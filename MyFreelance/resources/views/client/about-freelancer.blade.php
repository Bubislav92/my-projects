<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }} - Client Home</title>

    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">

    <x-client.client-navigation/>

    <!-- Glavni sadržaj profila -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 md:p-12 rounded-lg shadow-md max-w-4xl mx-auto">
            
            <!-- Osnovne informacije o frilenseru -->
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                <img src="https://via.placeholder.com/150" alt="Freelancer Avatar" class="rounded-full w-36 h-36 md:w-48 md:h-48 border-4 border-emerald-500 shadow-lg">
                <div class="text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-1">Sarah Chen</h1>
                    <p class="text-xl md:text-2xl text-orange-500 font-medium mb-2">Content Strategist</p>
                    <p class="text-gray-600 text-base md:text-lg mb-4">
                        <span class="font-bold">Rating:</span>
                        <span class="text-yellow-500">
                            <i class="fas fa-star"></i> 5.0 (10 reviews)
                        </span>
                    </p>
                    <button class="bg-emerald-500 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-emerald-600 transition duration-300 transform hover:-translate-y-0.5">
                        Contact Me
                    </button>
                </div>
            </div>

            <!-- Odeljci sa informacijama (About, Skills, Portfolio) -->
            <div class="mt-12 space-y-12">
                <!-- About Me -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">About Me</h2>
                    <p class="text-gray-700 leading-relaxed">
                        I am a highly skilled content strategist with over 8 years of experience in creating compelling and effective digital content. I specialize in developing comprehensive content plans, managing editorial calendars, and producing engaging blog posts, articles, and social media content that drives audience growth and brand loyalty. My goal is to help businesses tell their story and connect with their target audience in a meaningful way.
                    </p>
                </div>

                <!-- Skills -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Skills</h2>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Content Strategy</span>
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">SEO Writing</span>
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Social Media Management</span>
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Copywriting</span>
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Blogging</span>
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Editorial Planning</span>
                    </div>
                </div>

                <!-- Portfolio -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Portfolio</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text=Project+1" alt="Project 1" class="w-full h-auto object-cover">
                            <div class="p-4 bg-white">
                                <p class="text-gray-800 font-semibold">Web Content Redesign</p>
                                <p class="text-gray-500 text-sm mt-1">A complete overhaul of website content to improve engagement.</p>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text=Project+2" alt="Project 2" class="w-full h-auto object-cover">
                            <div class="p-4 bg-white">
                                <p class="text-gray-800 font-semibold">Social Media Campaign</p>
                                <p class="text-gray-500 text-sm mt-1">Developed a viral campaign for a new startup.</p>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text=Project+3" alt="Project 3" class="w-full h-auto object-cover">
                            <div class="p-4 bg-white">
                                <p class="text-gray-800 font-semibold">Blog Content Series</p>
                                <p class="text-gray-500 text-sm mt-1">Authored a series of articles for an industry-leading blog.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Футер (Footer) --}}
    <x-footer />

</body>
</html>