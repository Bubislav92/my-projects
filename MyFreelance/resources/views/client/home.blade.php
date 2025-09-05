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
    @vite(['resources/css/app.css', 
    'resources/js/app.js', 
    'resources/js/find-freelancer.js', 
    'resources/js/post-project-modal.js',
    'resources/js/read-article-modal.js',
    'resources/js/second-read-article-modal.js',
    'resources/js/message-modal.js'])

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
                    <a href="#" id="open-project-modal-button" class="bg-primary-orange text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-orange-700 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 inline-flex items-center">
                        Post a New Project <i class="fas fa-plus ml-3"></i>
                    </a>
                    <a href="#" id="open-find-modal-button" class="border-2 border-secondary-green text-secondary-green px-8 py-4 rounded-lg text-xl font-semibold hover:bg-secondary-green hover:text-white transition duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center">
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
                        <a href="{{ route('client.view-project') }}" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                        <a href="{{ route('client.menage-freelancer') }}" class="text-secondary-green hover:underline transition duration-300">Manage Freelancer <i class="fas fa-user-check ml-1"></i></a>
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
                        <a href="{{ route('client.view-project') }}" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                        <a href="{{ route('client.review-bid') }}" class="text-secondary-green hover:underline transition duration-300">Review Bids <i class="fas fa-gavel ml-1"></i></a>
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
                        <a href="{{ route('client.view-project') }}" class="bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">View Project</a>
                        <a href="{{ route('client.edit-project') }}" class="text-red-600 hover:underline transition duration-300">Edit Project <i class="fas fa-edit ml-1"></i></a>
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
                        <a href="{{ route('client.about-freelancer') }}" class="bg-secondary-green text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">View Profile</a>
                        <a href="#" class="open-message-modal-btn border border-primary-orange text-primary-orange px-4 py-2 rounded-md hover:bg-primary-orange hover:text-white transition duration-300">
                            Message
                        </a>
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
                    <a href="#" id="openModalLink" class="text-primary-orange hover:underline transition duration-300">
                        Read Article <i class="fas fa-arrow-right ml-1"></i>
                    </a>                    
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 border-l-4 border-secondary-green">
                    <h3 class="text-xl font-semibold text-dark-gray mb-2">How to Choose the Right Freelancer</h3>
                    <p class="text-gray-700 mb-4">Discover key factors and strategies for selecting the perfect freelancer for your project.</p>
                    <a href="#" id="openSecondModalLink" class="text-primary-orange hover:underline transition duration-300">
                        Read Article <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pop-up prozor (Modal) za kreiranje novog projekta -->
        <div id="create-project-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <!-- Pozadina zatamnjenja -->
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity duration-300"></div>

            <!-- Sadržaj modala -->
            <div class="flex items-center justify-center min-h-screen">
                <div id="modal-content" class="bg-white rounded-lg shadow-xl transform transition-all ease-out duration-300 sm:max-w-xl w-full mx-4 my-8 scale-95 opacity-0">
                    <!-- Zaglavlje modala -->
                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                        <h3 class="text-2xl font-semibold text-gray-900">
                            Create New Project
                        </h3>
                        <button type="button" id="close-modal-button" class="text-gray-400 hover:text-gray-600 transition duration-300 focus:outline-none">
                            <span class="sr-only">Close modal</span>
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- Telo modala (Forma za projekat) -->
                    <div class="p-6">
                        <form action="#" method="POST">
                            <!-- Polje za naziv projekta -->
                            <div class="mb-4">
                                <label for="project-title" class="block text-sm font-medium text-gray-700">Project Title</label>
                                <input type="text" id="project-title" name="project-title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <!-- Polje za opis projekta -->
                            <div class="mb-4">
                                <label for="project-description" class="block text-sm font-medium text-gray-700">Project Description</label>
                                <textarea id="project-description" name="project-description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <!-- Polja za budžet i rok -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="project-budget" class="block text-sm font-medium text-gray-700">Budget ($)</label>
                                    <input type="number" id="project-budget" name="project-budget" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="project-deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                                    <input type="date" id="project-deadline" name="project-deadline" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <!-- Dodaj tagove (skills) -->
                            <div class="mb-4">
                                <label for="project-tags" class="block text-sm font-medium text-gray-700">Required Skills</label>
                                <input type="text" id="project-tags" name="project-tags" placeholder="e.g. PHP, Laravel, Tailwind CSS" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <!-- Dugme za slanje forme -->
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-orange hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange transition duration-300">
                                    Post Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal za pretragu frilensera (Sakriven po defaultu) -->
        <div id="find-freelancer-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-75 flex justify-center items-center p-4 transition-opacity duration-300">
            <div class="bg-white rounded-lg p-6 w-full max-w-xl mx-auto shadow-xl transform transition-transform duration-300 scale-95">
                
                <!-- Zaglavlje modala -->
                <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800">Find a Freelancer</h3>
                    <button id="close-find-modal-button" class="text-gray-400 hover:text-gray-600 transition">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Telo modala (Forma za pretragu) -->
                <div class="mt-4">
                    <form action="#" method="GET">
                        <div class="mb-4">
                            <label for="search-query" class="block text-sm font-medium text-gray-700">Search by name or keyword</label>
                            <input type="text" id="search-query" name="search-query" placeholder="e.g., PHP Developer, Graphic Designer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" id="location" name="location" placeholder="e.g., Belgrade, Serbia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                            <input type="text" id="skills" name="skills" placeholder="e.g., Laravel, Tailwind CSS" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="w-full inline-flex justify-center py-3 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-secondary-green hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-green transition duration-300">
                                Search Freelancers
                            </button>
                        </div>
                    </form>
                </div>
        
            </div>
        </div>

        <!-- Message Modal -->
        <div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 transition-opacity duration-300 opacity-0 hidden">
            <div class="bg-white p-8 rounded-lg shadow-xl max-w-lg w-full mx-auto transform transition-transform duration-300 scale-95">
                <div class="flex justify-between items-center mb-4 border-b pb-4">
                    <h2 id="modalTitle" class="text-2xl font-bold text-dark-gray">Message Freelancer</h2>
                    <button id="messageCloseBtn" class="text-gray-500 hover:text-dark-gray transition-colors duration-300">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <div class="space-y-4">
                    <textarea id="messageTextarea" rows="6" class="w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring-secondary-green placeholder-gray-500 transition duration-300" placeholder="Type your message here..."></textarea>
                </div>

                <div class="mt-6 flex justify-end">
                    <button id="messageSendBtn" class="bg-secondary-green text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition duration-300 shadow-md">Send</button>
                </div>
            </div>
        </div>        

        <!-- The Modal -->
        <div id="tipsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 transition-opacity duration-300 opacity-0 hidden">
            <div class="bg-white p-8 rounded-lg shadow-xl max-w-2xl w-full mx-auto transform transition-transform duration-300 scale-95">
                <div class="flex justify-between items-center mb-4 border-b pb-4">
                    <h2 class="text-2xl font-bold text-dark-gray">Tips for Writing a Great Project Brief</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-dark-gray transition-colors duration-300">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <div class="prose max-w-none text-gray-700">
                    <p>A well-written project brief is essential for attracting skilled freelancers and ensuring a successful collaboration. Follow these key tips to get the best results:</p>
                    <ul class="list-disc list-inside space-y-2 mt-4">
                        <li><strong>Be Specific and Clear:</strong> Clearly state the project's goals, deliverables, and expectations. Avoid vague terms and provide concrete examples.</li>
                        <li><strong>Define the Scope:</strong> Outline the project's boundaries, what is included, and what is not. This prevents scope creep and misunderstandings.</li>
                        <li><strong>Set a Realistic Budget:</strong> Provide a clear budget range to filter for freelancers who align with your financial expectations.</li>
                        <li><strong>Detail Required Skills:</strong> List the specific technologies, tools, and expertise needed. This helps freelancers quickly determine if they are a good fit.</li>
                        <li><strong>Provide Examples:</strong> Include links to websites, apps, or designs that you like. Visual references can communicate your vision more effectively than words alone.</li>
                        <li><strong>Include a Timeline:</strong> State your preferred start date and any key milestones or deadlines.</li>
                    </ul>
                    <p class="mt-4">By following these tips, you'll create a brief that stands out and attracts top-tier talent for your project.</p>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div id="secondTipsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 transition-opacity duration-300 opacity-0 hidden">
            <div class="bg-white p-8 rounded-lg shadow-xl max-w-2xl w-full mx-auto transform transition-transform duration-300 scale-95">
                <div class="flex justify-between items-center mb-4 border-b pb-4">
                    <h2 class="text-2xl font-bold text-dark-gray">How to Choose the Right Freelancer</h2>
                    <button id="closeSecondModalBtn" class="text-gray-500 hover:text-dark-gray transition-colors duration-300">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <div class="prose max-w-none text-gray-700">
                    <p>Selecting a freelancer is a crucial step for the success of your project. Here are some key factors to consider during the selection process:</p>
                    <ul class="list-disc list-inside space-y-2 mt-4">
                        <li><strong>Review Their Portfolio:</strong> Look for past projects that are similar in scope to yours. A strong portfolio demonstrates their skill and experience.</li>
                        <li><strong>Check Reviews and Ratings:</strong> Read feedback from previous clients. High ratings and positive reviews are a good indicator of reliability and quality.</li>
                        <li><strong>Assess Communication Skills:</strong> Timely and clear communication is vital. Pay attention to how they respond to your initial messages and questions.</li>
                        <li><strong>Ask for a Detailed Proposal:</strong> A good freelancer will provide a clear proposal that outlines the scope of work, timeline, and cost.</li>
                        <li><strong>Trust Your Gut:</strong> Ultimately, choose someone you feel comfortable working with. A positive working relationship can make a significant difference.</li>
                    </ul>
                    <p class="mt-4">By taking the time to carefully evaluate these factors, you can find a freelancer who is not only talented but also a great partner for your project.</p>
                </div>
            </div>
        </div>

    </main>

    {{-- Футер (Footer) --}}
    <x-footer />


</body>
</html>