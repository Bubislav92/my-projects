<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Projects</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/app.js'])
</head>
<body class="antialiased text-gray-800">

    <x-client.client-navigation/>

    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">My Projects</h1>

            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-8">
                    <button id="active-projects-tab" class="px-6 py-3 rounded-lg font-semibold transition duration-300 shadow-sm">
                        Active Projects
                    </button>
                    <button id="completed-projects-tab" class="px-6 py-3 rounded-lg font-semibold transition duration-300 shadow-sm">
                        Completed Projects
                    </button>
                </div>
            </div>

            <div id="projects-container">
                <div id="active-projects-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-dark-gray mb-2">E-commerce Website Development</h3>
                        <p class="text-sm text-gray-500 mb-4">Status: <span class="font-medium text-secondary-green">In Progress</span></p>
                        <ul class="space-y-2 text-gray-700 mb-4">
                            <li><i class="fas fa-user-circle text-primary-orange mr-2"></i>Assigned Freelancer: <span class="font-semibold">Petar Petrović</span></li>
                            <li><i class="fas fa-calendar-alt text-primary-orange mr-2"></i>Deadline: <span class="font-semibold">December 20, 2024</span></li>
                            <li><i class="fas fa-dollar-sign text-primary-orange mr-2"></i>Budget: <span class="font-semibold">$2,500</span></li>
                        </ul>
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 block text-center">
                            View Details
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-dark-gray mb-2">Logo Design for a Startup</h3>
                        <p class="text-sm text-gray-500 mb-4">Status: <span class="font-medium text-secondary-green">In Progress</span></p>
                        <ul class="space-y-2 text-gray-700 mb-4">
                            <li><i class="fas fa-user-circle text-primary-orange mr-2"></i>Assigned Freelancer: <span class="font-semibold">Jana Jovanović</span></li>
                            <li><i class="fas fa-calendar-alt text-primary-orange mr-2"></i>Deadline: <span class="font-semibold">November 15, 2024</span></li>
                            <li><i class="fas fa-dollar-sign text-primary-orange mr-2"></i>Budget: <span class="font-semibold">$500</span></li>
                        </ul>
                        <a href="#" class="bg-secondary-green text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 block text-center">
                            View Details
                        </a>
                    </div>
                </div>

                <div id="completed-projects-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-dark-gray mb-2">Marketing Strategy Development</h3>
                        <p class="text-sm text-gray-500 mb-4">Status: <span class="font-medium text-gray-500">Completed</span></p>
                        <ul class="space-y-2 text-gray-700 mb-4">
                            <li><i class="fas fa-user-circle text-primary-orange mr-2"></i>Assigned Freelancer: <span class="font-semibold">Marko Marić</span></li>
                            <li><i class="fas fa-calendar-alt text-primary-orange mr-2"></i>Completed: <span class="font-semibold">September 10, 2024</span></li>
                            <li><i class="fas fa-dollar-sign text-primary-orange mr-2"></i>Budget: <span class="font-semibold">$1,200</span></li>
                        </ul>
                        <a href="#" class="bg-gray-400 text-white px-4 py-2 rounded-lg font-semibold transition duration-300 block text-center">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />

</body>
</html>