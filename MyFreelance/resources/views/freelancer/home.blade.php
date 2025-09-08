<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }} - Freelancer Home</title>

    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 
        'resources/js/app.js', 
        'resources/js/freelancer/notification.js',
        'resources/js/freelancer/user-menu.js',
        'resources/js/freelancer/message-modal.js'])
</head>
<body class="font-sans antialiased bg-light-gray">

    <x-freelancer.freelancer-navigation/>

    <main class="py-10">
        <div class="container mx-auto px-4">
            {{-- Херо секција / Преглед --}}
            <div class="bg-white p-8 rounded-lg shadow-xl mb-10 text-center md:text-left border-l-4 border-primary-orange">
                <h1 class="text-4xl font-bold text-dark-gray mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-xl text-gray-700 mb-6">Ready to find your next great project?</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-dark-gray font-semibold mb-6">
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-handshake text-secondary-green text-3xl mr-3"></i>
                        <span>Active Proposals: <span class="text-primary-orange">5</span></span>
                    </div>
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-bookmark text-primary-orange text-3xl mr-3"></i>
                        <span>Saved Projects: <span class="text-secondary-green">3</span></span>
                    </div>
                    <div class="p-4 bg-light-gray rounded-lg shadow-inner flex items-center justify-center">
                        <i class="fas fa-star text-yellow-500 text-3xl mr-3"></i>
                        <span>New Projects Today: <span class="text-primary-orange">12</span></span>
                    </div>
                </div>
                <a href="#" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 inline-flex items-center">
                    Browse All Projects <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>

            {{-- Истакнути / Препоручени пројекти --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Recommended Projects for You</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                {{-- Пример картице пројекта --}}
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Web Development for Startup</h3>
                    <p class="text-gray-600 text-sm mb-4">Budget: <span class="font-medium text-secondary-green">$2,500 - $4,000</span></p>
                    <p class="text-gray-700 mb-4 truncate">We are a new startup looking for a full-stack web developer to build our MVP.</p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="mr-2"><i class="fas fa-code"></i> Skills: PHP, Laravel, Vue.js</span>
                        <span><i class="fas fa-calendar-alt"></i> Posted: 1 day ago</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Details</a>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Submit Proposal <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
                {{-- Још примера картица пројеката --}}
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Graphic Designer for Branding</h3>
                    <p class="text-gray-600 text-sm mb-4">Budget: <span class="font-medium text-secondary-green">$800 - $1,500</span></p>
                    <p class="text-gray-700 mb-4 truncate">Seeking a talented graphic designer for a new brand identity, including logo and style guide.</p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="mr-2"><i class="fas fa-palette"></i> Skills: Adobe Illustrator, Photoshop, Branding</span>
                        <span><i class="fas fa-calendar-alt"></i> Posted: 3 hours ago</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Details</a>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Submit Proposal <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-t-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Content Writer for Tech Blog</h3>
                    <p class="text-gray-600 text-sm mb-4">Budget: <span class="font-medium text-secondary-green">$500 - $1,000</span></p>
                    <p class="text-gray-700 mb-4 truncate">Looking for a skilled content writer to create engaging articles for our tech blog.</p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="mr-2"><i class="fas fa-pen"></i> Skills: Content Writing, SEO, Tech</span>
                        <span><i class="fas fa-calendar-alt"></i> Posted: 5 days ago</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Details</a>
                        <a href="#" class="text-primary-orange hover:underline transition duration-300">Submit Proposal <i class="fas fa-chevron-right ml-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- Категорије пројеката --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Explore Projects by Category</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-10">
                {{-- Пример картице категорије --}}
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-primary-orange">
                    <i class="fas fa-laptop-code text-primary-orange text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Web Development</h3>
                    <p class="text-gray-600 text-sm">150+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-secondary-green">
                    <i class="fas fa-paint-brush text-secondary-green text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Graphic Design</h3>
                    <p class="text-gray-600 text-sm">80+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-primary-orange">
                    <i class="fas fa-pen-nib text-primary-orange text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Content Writing</h3>
                    <p class="text-gray-600 text-sm">60+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-secondary-green">
                    <i class="fas fa-chart-line text-secondary-green text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Marketing</h3>
                    <p class="text-gray-600 text-sm">90+ Projects</p>
                </a>
                <a href="#" class="block bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 border-b-4 border-primary-orange">
                    <i class="fas fa-mobile-alt text-primary-orange text-4xl mb-3"></i>
                    <h3 class="text-lg font-semibold text-dark-gray">Mobile Apps</h3>
                    <p class="text-gray-600 text-sm">45+ Projects</p>
                </a>
                {{-- Додај још категорија... --}}
            </div>

            {{-- Савети за фриленсере --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Freelancer Resources</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">How to Create a Standout Profile</h3>
                    <p class="text-gray-700 mb-4">Learn tips and tricks to optimize your freelancer profile and attract more clients.</p>
                    <a href="#" class="text-secondary-green hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-primary-orange">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">Mastering Your Proposals: A Guide</h3>
                    <p class="text-gray-700 mb-4">Improve your success rate by crafting compelling and effective project proposals.</p>
                    <a href="#" class="text-primary-orange hover:underline transition duration-300">Read Article <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />

</body>
</html>
