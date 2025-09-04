<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Project Bids</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts (Tailwind CSS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-light-gray antialiased">

    <x-client.client-navigation/>

    <div class="container mx-auto px-4 py-10">

        <!-- Main section for reviewing bids -->
        <div class="bg-white p-8 rounded-lg shadow-xl mb-10 border-l-4 border-secondary-green">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-dark-gray mb-2">Review Bids for E-commerce Website Build</h1>
                    <p class="text-xl text-primary-orange font-medium">Project Status: <span class="bg-blue-200 text-blue-800 text-sm font-semibold px-2 py-1 rounded-full">In Progress</span></p>
                </div>
                <div class="mt-4 md:mt-0">
                    <button class="bg-primary-orange text-white px-6 py-3 rounded-md font-semibold hover:bg-orange-700 transition duration-300 shadow-md">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Project
                    </button>
                </div>
            </div>

            <!-- Bids list section -->
            <div class="bg-light-gray p-6 rounded-lg shadow-inner">
                <h2 class="text-2xl font-semibold text-dark-gray mb-4">Total Bids: <span class="text-secondary-green font-bold">3</span></h2>
                <ul class="space-y-4">
                    <!-- Bid item 1 -->
                    <li class="bg-white p-4 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between">
                        <div class="flex items-center mb-3 sm:mb-0">
                            <img src="https://via.placeholder.com/64" alt="Freelancer avatar" class="w-16 h-16 rounded-full border-2 border-secondary-green mr-4">
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800">Marko Marković</h3>
                                <p class="text-sm text-gray-600">Full-Stack Developer</p>
                                <div class="text-yellow-500 text-sm mt-1">
                                    <i class="fas fa-star"></i> 4.9 (15 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-right">
                            <p class="font-bold text-lg text-secondary-green mb-1">$7,500</p>
                            <p class="text-gray-500">Timeline: 2 months</p>
                        </div>
                        <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-2">
                            <button class="bg-secondary-green text-white px-4 py-2 rounded-md font-semibold hover:bg-green-700 transition duration-300">
                                Accept Bid
                            </button>
                            <button class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md font-semibold hover:bg-primary-orange hover:text-white transition duration-300">
                                Message
                            </button>
                        </div>
                    </li>
                    <!-- Bid item 2 -->
                    <li class="bg-white p-4 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between">
                        <div class="flex items-center mb-3 sm:mb-0">
                            <img src="https://via.placeholder.com/64" alt="Freelancer avatar" class="w-16 h-16 rounded-full border-2 border-primary-orange mr-4">
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800">Ana Anić</h3>
                                <p class="text-sm text-gray-600">Frontend Specialist</p>
                                <div class="text-yellow-500 text-sm mt-1">
                                    <i class="fas fa-star"></i> 5.0 (21 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-right">
                            <p class="font-bold text-lg text-secondary-green mb-1">$6,800</p>
                            <p class="text-gray-500">Timeline: 3 months</p>
                        </div>
                        <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-2">
                            <button class="bg-secondary-green text-white px-4 py-2 rounded-md font-semibold hover:bg-green-700 transition duration-300">
                                Accept Bid
                            </button>
                            <button class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md font-semibold hover:bg-primary-orange hover:text-white transition duration-300">
                                Message
                            </button>
                        </div>
                    </li>
                    <!-- Bid item 3 -->
                    <li class="bg-white p-4 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between">
                        <div class="flex items-center mb-3 sm:mb-0">
                            <img src="https://via.placeholder.com/64" alt="Freelancer avatar" class="w-16 h-16 rounded-full border-2 border-primary-orange mr-4">
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800">Petar Petrović</h3>
                                <p class="text-sm text-gray-600">Laravel Developer</p>
                                <div class="text-yellow-500 text-sm mt-1">
                                    <i class="fas fa-star"></i> 4.5 (8 reviews)
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-right">
                            <p class="font-bold text-lg text-secondary-green mb-1">$8,000</p>
                            <p class="text-gray-500">Timeline: 2.5 months</p>
                        </div>
                        <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-2">
                            <button class="bg-secondary-green text-white px-4 py-2 rounded-md font-semibold hover:bg-green-700 transition duration-300">
                                Accept Bid
                            </button>
                            <button class="border border-primary-orange text-primary-orange px-4 py-2 rounded-md font-semibold hover:bg-primary-orange hover:text-white transition duration-300">
                                Message
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

</body>
</html>
