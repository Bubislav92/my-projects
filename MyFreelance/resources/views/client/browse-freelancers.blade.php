<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Freelancers</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app.js'])

</head>
<body class="antialiased text-gray-800">

    <x-client.client-navigation/>

    <!-- Main Content -->
    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Browse Freelancers</h1>

            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <!-- Search and Filters Section -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                    <div class="md:col-span-3">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Search by skills, title, or name..." class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange">
                        </div>
                    </div>
                    <div class="md:col-span-1">
                        <button class="w-full bg-primary-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300 shadow-md">Search</button>
                    </div>
                </div>

                <div class="flex flex-wrap items-center mt-6 space-y-4 md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-auto relative">
                        <button id="category-button" class="w-full md:w-auto flex items-center justify-between bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                            Category
                            <i class="fas fa-chevron-down text-sm ml-2"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="category-menu" class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Web Development</a>
                            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Graphic Design</a>
                            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Content Writing</a>
                        </div>
                    </div>
                    <div class="w-full md:w-auto relative">
                        <button id="rate-button" class="w-full md:w-auto flex items-center justify-between bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                            Rate
                            <i class="fas fa-chevron-down text-sm ml-2"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="rate-menu" class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Below $20/h</a>
                            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">$20 - $50/h</a>
                            <a href="#" class="block px-4 py-2 text-dark-gray hover:bg-gray-100 transition duration-200">Above $50/h</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Freelancer List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Freelancer Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mr-4 border-4 border-secondary-green">
                        <div>
                            <h3 class="text-xl font-bold text-dark-gray">Petar Petrovic</h3>
                            <p class="text-secondary-green">Senior Web Developer</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">Experienced developer with over 10 years of expertise in building modern web applications using Laravel and Vue.js.</p>
                    <div class="flex flex-wrap space-x-2 mb-4">
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">Laravel</span>
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">Vue.js</span>
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">MySQL</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-primary-orange">$65/h</span>
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300">View Profile</a>
                    </div>
                </div>

                <!-- Freelancer Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mr-4 border-4 border-secondary-green">
                        <div>
                            <h3 class="text-xl font-bold text-dark-gray">Jana Jovanovic</h3>
                            <p class="text-secondary-green">Graphic Designer</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">I create visually stunning designs for brands, from logos to complete corporate graphics. Adobe Creative Suite expert.</p>
                    <div class="flex flex-wrap space-x-2 mb-4">
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">Photoshop</span>
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">Illustrator</span>
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">UI/UX</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-primary-orange">$40/h</span>
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300">View Profile</a>
                    </div>
                </div>

                <!-- Freelancer Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mr-4 border-4 border-secondary-green">
                        <div>
                            <h3 class="text-xl font-bold text-dark-gray">Marko Maric</h3>
                            <p class="text-secondary-green">Content Writer</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">I write compelling and SEO-optimized content for websites, blogs, and marketing materials.</p>
                    <div class="flex flex-wrap space-x-2 mb-4">
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">SEO</span>
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">Blog</span>
                        <span class="bg-gray-200 text-gray-700 text-sm font-medium px-2.5 py-0.5 rounded-full">Copywriting</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-primary-orange">$30/h</span>
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />

</body>
</html>
