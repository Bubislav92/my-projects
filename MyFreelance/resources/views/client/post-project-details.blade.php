<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Project Details</title>
    
    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/review-modal.js', 'resources/js/hire-again-modal.js'])


</head>
<body class="bg-gray-100 antialiased">

    <x-client.client-navigation/>

    <div class="container mx-auto px-4 py-10">
        <!-- Main card for past project details -->
        <div class="bg-white p-8 rounded-lg shadow-xl border-l-4 border-secondary-green">
            
            <!-- Header section: Freelancer and project info -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div class="flex items-center mb-4 md:mb-0">
                    <img src="https://via.placeholder.com/96" alt="Freelancer Avatar" class="w-24 h-24 rounded-full border-4 border-secondary-green shadow-lg mr-6">
                    <div>
                        <h1 class="text-4xl font-bold text-dark-gray">Jane Doe</h1>
                        <p class="text-xl text-primary-orange font-medium">Full-Stack Web Developer</p>
                        <p class="text-gray-600">Worked on: <span class="font-semibold text-dark-gray">E-commerce Website Development</span></p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-gray-500">Project Status</p>
                    <span class="bg-gray-400 text-white text-sm font-semibold px-4 py-1 rounded-full">Completed</span>
                </div>
            </div>

            <!-- Details and options -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Left Column: Details, Files, Review -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Project Summary -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Project Summary</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Hired a full-stack developer to build a modern e-commerce platform from scratch. The project included user authentication, a shopping cart, secure payment gateways, and product management. The final result was a fast, responsive, and user-friendly website.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="font-semibold text-gray-800">Final Budget:</p>
                                <span class="text-lg text-secondary-green font-bold">$2,500</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Skills Used:</p>
                                <div class="flex flex-wrap gap-2 mt-1">
                                    <span class="bg-secondary-green text-white text-xs font-semibold px-2.5 py-0.5 rounded-full">PHP</span>
                                    <span class="bg-secondary-green text-white text-xs font-semibold px-2.5 py-0.5 rounded-full">Laravel</span>
                                    <span class="bg-secondary-green text-white text-xs font-semibold px-2.5 py-0.5 rounded-full">Vue.js</span>
                                    <span class="bg-secondary-green text-white text-xs font-semibold px-2.5 py-0.5 rounded-full">Tailwind CSS</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Files and Documents Section (for reference) -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Files and Documents</h2>
                        <ul class="space-y-3">
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm">
                                <i class="fas fa-file-alt text-lg text-blue-500 mr-3"></i>
                                <span class="flex-1 text-gray-800">Final Project Brief.pdf</span>
                                <span class="text-gray-500 text-sm">3.4 MB</span>
                            </li>
                            <li class="flex items-center p-3 bg-white rounded-lg shadow-sm">
                                <i class="fas fa-file-archive text-lg text-orange-500 mr-3"></i>
                                <span class="flex-1 text-gray-800">Final Source Code.zip</span>
                                <span class="text-gray-500 text-sm">25.5 MB</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column: Timeline and Actions -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- Actions for Completed Projects -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Actions</h2>
                        <div class="flex flex-col gap-4 mt-6">
                            <button class="open-review-modal-btn bg-primary-orange text-white px-6 py-3 rounded-md font-semibold hover:bg-orange-700 transition duration-300 shadow-md">
                                <i class="fas fa-star mr-2"></i> Leave a Review
                            </button>                            
                            <button class="open-hire-modal-btn bg-secondary-green text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition duration-300 shadow-md" data-freelancer-name="Jane Doe">
                                <i class="fas fa-user-plus mr-2"></i> Hire Again
                            </button>                            
                        </div>
                    </div>

                    <!-- Project Timeline (shows all completed milestones) -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                        <h2 class="text-2xl font-semibold text-dark-gray mb-4">Project Timeline</h2>
                        <div class="relative pl-6">
                            <div class="timeline-line bg-secondary-green"></div>
                            
                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-secondary-green absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm border-l-2 border-secondary-green">
                                    <p class="font-semibold text-gray-800">Project Started</p>
                                    <p class="text-sm text-gray-500">20. may 2024</p>
                                </div>
                            </div>

                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-secondary-green absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm border-l-2 border-secondary-green">
                                    <p class="font-semibold text-gray-800">Frontend Development Finished</p>
                                    <p class="text-sm text-gray-500">15. june 2024</p>
                                </div>
                            </div>
                            
                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-secondary-green absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm border-l-2 border-secondary-green">
                                    <p class="font-semibold text-gray-800">Backend Development Finished</p>
                                    <p class="text-sm text-gray-500">10. july 2024</p>
                                </div>
                            </div>

                            <div class="mb-6 timeline-point">
                                <div class="w-5 h-5 rounded-full bg-secondary-green absolute -left-2.5 top-0"></div>
                                <div class="p-3 bg-white rounded-lg shadow-sm border-l-2 border-secondary-green">
                                    <p class="font-semibold text-gray-800">Project Completed</p>
                                    <p class="text-sm text-gray-500">20. july 2024</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Leave a Review Modal --}}
    <div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 transition-opacity duration-300 opacity-0 hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-lg w-full mx-auto transform transition-transform duration-300 scale-95">
            <div class="flex justify-between items-center mb-4 border-b pb-4">
                <h2 class="text-2xl font-bold text-dark-gray">Leave a Review</h2>
                <button id="closeReviewModalBtn" class="text-gray-500 hover:text-dark-gray transition-colors duration-300">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <div class="space-y-4">
                <p class="text-center text-gray-700 mb-4">Rate your experience with Jane Doe.</p>
                <div class="flex justify-center space-x-2 text-3xl text-yellow-500 mb-4">
                    <i class="far fa-star cursor-pointer hover:text-yellow-600 transition-colors"></i>
                    <i class="far fa-star cursor-pointer hover:text-yellow-600 transition-colors"></i>
                    <i class="far fa-star cursor-pointer hover:text-yellow-600 transition-colors"></i>
                    <i class="far fa-star cursor-pointer hover:text-yellow-600 transition-colors"></i>
                    <i class="far fa-star cursor-pointer hover:text-yellow-600 transition-colors"></i>
                </div>
                <textarea rows="6" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange placeholder-gray-500 transition duration-300" placeholder="Write your review here..."></textarea>
            </div>

            <div class="mt-6 flex justify-end">
                <button class="bg-primary-orange text-white px-6 py-3 rounded-md font-semibold hover:bg-orange-700 transition duration-300 shadow-md">Submit Review</button>
            </div>
        </div>
    </div>

    {{-- Hire Again Modal --}}
    <div id="hireAgainModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 transition-opacity duration-300 opacity-0 hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-lg w-full mx-auto transform transition-transform duration-300 scale-95">
            <div class="flex justify-between items-center mb-4 border-b pb-4">
                <h2 class="text-2xl font-bold text-dark-gray">Hire Again</h2>
                <button id="closeHireAgainModalBtn" class="text-gray-500 hover:text-dark-gray transition-colors duration-300">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <div class="space-y-4 text-center">
                <p class="text-gray-700 text-lg mb-4">Would you like to hire <span id="hireAgainFreelancerName" class="font-bold text-primary-orange"></span> again for a new project?</p>
                <p class="text-gray-500 text-sm">Clicking "Yes" will open a new project brief with their profile pre-selected.</p>
            </div>

            <div class="mt-6 flex justify-center gap-4">
                <button class="bg-secondary-green text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition duration-300 shadow-md">Yes</button>
                <button id="cancelHireBtn" class="border border-dark-gray text-dark-gray px-6 py-3 rounded-md font-semibold hover:bg-gray-100 transition duration-300">Cancel</button>
            </div>
        </div>
    </div>

    {{-- Footer (Footer) --}}
    <x-footer />
</body>
</html>
