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
    <body class="font-sans antialiased bg-light-gray">

        <x-client.client-navigation/>

        <main class="py-10">
            <div class="container mx-auto px-4">
                {{-- Херо секција / Преглед --}}
                <div class="bg-white p-8 rounded-lg shadow-xl mb-10 text-center md:text-left border-l-4 border-secondary-green">
                    <h1 class="text-4xl font-bold text-dark-gray mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                    <p class="text-xl text-gray-700 mb-6">Let's get your project done with the best talent.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-dark-gray font-semibold mb-6">
                        <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                            <i class="fas fa-tasks text-primary-orange text-3xl mr-3"></i>
                            <span>Active Projects: <span class="text-secondary-green">3</span></span>
                        </div>
                        <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                            <i class="fas fa-gavel text-secondary-green text-3xl mr-3"></i>
                            <span>Pending Bids: <span class="text-primary-orange">7</span></span>
                        </div>
                        <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                            <i class="fas fa-heart text-red-500 text-3xl mr-3"></i>
                            <span>Favorite Freelancers: <span class="text-secondary-green">5</span></span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 inline-flex items-center">
                            Post a New Project <i class="fas fa-plus ml-3"></i>
                        </a>
                        <a href="#" class="border-2 border-secondary-green text-secondary-green px-8 py-4 rounded-lg text-xl font-semibold hover:bg-secondary-green hover:text-white transition duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center">
                            Find a Freelancer <i class="fas fa-search ml-3"></i>
                        </a>
                    </div>
                </div>

                {{-- Преглед активних пројеката --}}
                <h2 class="text-3xl font-bold text-dark-gray mb-6">Your Active Projects</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    {{-- Пример картице пројекта --}}
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-primary-orange">
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">E-commerce Website Build</h3>
                        <p class="text-gray-600 text-sm mb-4">Status: <span class="font-medium text-blue-600">In Progress</span></p>
                        <p class="text-gray-700 mb-4 truncate">Building a new e-commerce platform from scratch with custom features...</p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                            <span>Bids: 12</span>
                            <span>Budget: $5,000 - $8,000</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                            <a href="#" class="text-secondary-green hover:underline transition duration-300">Manage Freelancer <i class="fas fa-user-check ml-1"></i></a>
                        </div>
                    </div>
                    {{-- Још примера картица пројеката --}}
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-primary-orange">
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">Mobile App UX Redesign</h3>
                        <p class="text-gray-600 text-sm mb-4">Status: <span class="font-medium text-orange-600">Waiting for Bids</span></p>
                        <p class="text-gray-700 mb-4 truncate">Seeking a UX/UI designer to overhaul our existing mobile application...</p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                            <span>Bids: 5</span>
                            <span>Budget: $2,000 - $3,500</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                            <a href="#" class="text-secondary-green hover:underline transition duration-300">Review Bids <i class="fas fa-gavel ml-1"></i></a>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-primary-orange">
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">Content Marketing Strategy</h3>
                        <p class="text-gray-600 text-sm mb-4">Status: <span class="font-medium text-red-600">Needs Attention</span></p>
                        <p class="text-gray-700 mb-4 truncate">Develop a comprehensive content marketing strategy for a B2B SaaS company...</p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                            <span>Bids: 0</span>
                            <span>Budget: $1,500 - $2,500</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="#" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                            <a href="#" class="text-red-600 hover:underline transition duration-300">Edit Project <i class="fas fa-edit ml-1"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Препоручени фриленсери --}}
                <h2 class="text-3xl font-bold text-dark-gray mb-6">Recommended Freelancers for You</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    {{-- Пример картице фриленсера --}}
                    <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                        <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mx-auto mb-4 border-2 border-secondary-green">
                        <h3 class="text-xl font-semibold text-dark-gray mb-1">Emily Clarke</h3>
                        <p class="text-primary-orange font-medium mb-2">Full-Stack Web Developer</p>
                        <p class="text-gray-600 text-sm mb-4">Rating: <span class="text-yellow-500"><i class="fas fa-star"></i> 4.9 (25 reviews)</span></p>
                        <div class="flex flex-col gap-2">
                            <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                            <a href="#" class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">Message</a>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                        <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mx-auto mb-4 border-2 border-secondary-green">
                        <h3 class="text-xl font-semibold text-dark-gray mb-1">David Lee</h3>
                        <p class="text-primary-orange font-medium mb-2">UX/UI Designer</p>
                        <p class="text-gray-600 text-sm mb-4">Rating: <span class="text-yellow-500"><i class="fas fa-star"></i> 4.8 (18 reviews)</span></p>
                        <div class="flex flex-col gap-2">
                            <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                            <a href="#" class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">Message</a>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                        <img src="https://via.placeholder.com/80" alt="Freelancer Avatar" class="rounded-full w-20 h-20 mx-auto mb-4 border-2 border-secondary-green">
                        <h3 class="text-xl font-semibold text-dark-gray mb-1">Sarah Chen</h3>
                        <p class="text-primary-orange font-medium mb-2">Content Strategist</p>
                        <p class="text-gray-600 text-sm mb-4">Rating: <span class="text-yellow-500"><i class="fas fa-star"></i> 5.0 (10 reviews)</span></p>
                        <div class="flex flex-col gap-2">
                            <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                            <a href="#" class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">Message</a>
                        </div>
                    </div>
                    {{-- Додај још фриленсера... --}}
                </div>

                {{-- Савети за клијенте --}}
                <h2 class="text-3xl font-bold text-dark-gray mb-6 mt-10">Client Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-primary-orange">
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">Tips for Writing a Great Project Brief</h3>
                        <p class="text-gray-700 mb-4">Learn how to create clear and concise project descriptions to attract the best talent.</p>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-secondary-green">
                        <h3 class="text-xl font-semibold text-dark-gray mb-2">How to Choose the Right Freelancer</h3>
                        <p class="text-gray-700 mb-4">Discover key factors and strategies for selecting the perfect freelancer for your project.</p>
                        <a href="#" class="text-secondary-green hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

            </div>
        </main>

        {{-- Футер (Footer) --}}
        <x-footer />

    </body>
    </html>
