<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Freelancer and Project</title>
    
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

        <!-- Main management card -->
        <div class="bg-white p-8 rounded-lg shadow-xl border-l-4 border-secondary-green">
            
            <!-- Header section: Freelancer and project information -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div class="flex items-center mb-4 md:mb-0">
                    <img src="https://via.placeholder.com/96" alt="Freelancer's avatar image" class="w-24 h-24 rounded-full border-4 border-secondary-green shadow-lg mr-6">
                    <div>
                        <h1 class="text-4xl font-bold text-dark-gray">Jane Doe</h1>
                        <p class="text-xl text-primary-orange font-medium">Full-Stack Web Developer</p>
                        <p class="text-gray-600">Working on project: <span class="font-semibold text-dark-gray">E-commerce Website Build</span></p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-gray-500">Project Status</p>
                    <span class="bg-blue-200 text-blue-800 text-sm font-semibold px-4 py-1 rounded-full">In Progress</span>
                </div>
            </div>

            <!-- Details and options -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Left column: Communication, Files, Tasks -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Communication section -->
                    <div class="bg-light-gray p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Communication</h2>
                        <div class="border border-gray-300 p-4 rounded-lg h-64 overflow-y-auto mb-4 bg-white">
                            <p class="text-sm text-gray-800 mb-2"><span class="font-bold">You:</span> Hi, I've uploaded a new design brief. Let me know what you think.</p>
                            <p class="text-sm text-gray-600 text-right mb-2"><span class="font-bold">Freelancer:</span> Okay! I'll take a look and get back to you by the end of the day.</p>
                            <p class="text-sm text-gray-800 mb-2"><span class="font-bold">You:</span> Great. Also, please send me all graphics in .svg format.</p>
                        </div>
                        <div class="flex">
                            <input type="text" placeholder="Type your message..." class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <button class="bg-secondary-green text-white px-6 py-2 rounded-r-md hover:bg-green-700 transition duration-300">Send</button>
                        </div>
                    </div>

                    <!-- Files and documents section -->
                    <div class="bg-light-gray p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Files and Documents</h2>
                        <ul class="space-y-3 mb-4">
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition duration-300 cursor-pointer">
                                <i class="fas fa-file-alt text-lg text-blue-500 mr-3"></i>
                                <span class="flex-1 text-gray-800">Project_brief (v2.1).pdf</span>
                                <span class="text-gray-500 text-sm">3.4 MB</span>
                            </li>
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition duration-300 cursor-pointer">
                                <i class="fas fa-image text-lg text-purple-500 mr-3"></i>
                                <span class="flex-1 text-gray-800">Logo_final.png</span>
                                <span class="text-gray-500 text-sm">1.1 MB</span>
                            </li>
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition duration-300 cursor-pointer">
                                <i class="fas fa-file-archive text-lg text-orange-500 mr-3"></i>
                                <span class="flex-1 text-gray-800">Homepage_designs.zip</span>
                                <span class="text-gray-500 text-sm">12.8 MB</span>
                            </li>
                        </ul>
                        <button class="w-full bg-primary-orange text-white px-6 py-3 rounded-md font-semibold hover:bg-orange-700 transition duration-300 shadow-md">
                            <i class="fas fa-upload mr-2"></i> Upload new file
                        </button>
                    </div>

                    <!-- Task list section -->
                    <div class="bg-light-gray p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Task List</h2>
                        <ul class="space-y-3">
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm">
                                <input type="checkbox" class="form-checkbox text-secondary-green w-5 h-5 rounded-sm mr-4" checked disabled>
                                <span class="text-gray-800 line-through">Finalize main page design</span>
                            </li>
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm">
                                <input type="checkbox" class="form-checkbox text-secondary-green w-5 h-5 rounded-sm mr-4">
                                <span class="text-gray-800">Database integration</span>
                            </li>
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm">
                                <input type="checkbox" class="form-checkbox text-secondary-green w-5 h-5 rounded-sm mr-4">
                                <span class="text-gray-800">Payment system implementation</span>
                            </li>
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm">
                                <input type="checkbox" class="form-checkbox text-secondary-green w-5 h-5 rounded-sm mr-4">
                                <span class="text-gray-800">User experience testing</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right column: Milestones and Timeline -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- Milestones and payments section -->
                    <div class="bg-light-gray p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Payments & Actions</h2>
                        <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <p class="font-semibold text-gray-800">Total Budget:</p>
                                <span class="font-bold text-lg text-secondary-green">$5,000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="font-semibold text-gray-800">Milestone Payment:</p>
                                <span class="font-bold text-lg text-primary-orange">$2,500</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 mt-6">
                            <button class="bg-secondary-green text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition duration-300 shadow-md">Mark Milestone as Paid</button>
                            <button class="bg-primary-orange text-white px-6 py-3 rounded-md font-semibold hover:bg-orange-700 transition duration-300 shadow-md">Complete Project</button>
                            <button class="border border-red-500 text-red-500 px-6 py-3 rounded-md font-semibold hover:bg-red-50 hover:text-red-700 transition duration-300">Report an Issue</button>
                        </div>
                    </div>

                    <!-- Project timeline section -->
                    <div class="bg-light-gray p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Project Timeline</h2>
                        <div class="relative pl-6">
                            <div class="timeline-line"></div>
                            
                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-secondary-green absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm">
                                    <p class="font-semibold text-gray-800">Project Start</p>
                                    <p class="text-sm text-gray-500">20. maj 2024</p>
                                </div>
                            </div>

                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-secondary-green absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm">
                                    <p class="font-semibold text-gray-800">Design Prototype Completed</p>
                                    <p class="text-sm text-gray-500">5. jun 2024</p>
                                </div>
                            </div>
                            
                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-primary-orange absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm border-l-2 border-primary-orange">
                                    <p class="font-semibold text-gray-800">Frontend Development</p>
                                    <p class="text-sm text-gray-500">In Progress</p>
                                </div>
                            </div>

                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-gray-400 absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm">
                                    <p class="font-semibold text-gray-800">Testing and Revision</p>
                                    <p class="text-sm text-gray-500">Planned</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <x-footer />

</body>
</html>
