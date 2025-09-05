<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Freelance') }} - Client Dashboard</title>

    {{-- Фонтови --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Скрипте (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-light-gray">

    <!-- Navigation (using the component) -->
    <x-client.client-navigation />

    <main class="py-10">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-dark-gray mb-8">Client Dashboard</h1>

            {{-- Преглед надзорне табле / Кључне метрике --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                {{-- Активни пројекти --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-secondary-green">
                    <div>
                        <p class="text-gray-600">Active Projects</p>
                        <h3 class="text-3xl font-bold text-secondary-green">3</h3>
                    </div>
                    <i class="fas fa-tasks text-4xl text-gray-300"></i>
                </div>
                {{-- Чекајуће понуде --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-primary-orange">
                    <div>
                        <p class="text-gray-600">Pending Bids</p>
                        <h3 class="text-3xl font-bold text-primary-orange">7</h3>
                    </div>
                    <i class="fas fa-gavel text-4xl text-gray-300"></i>
                </div>
                {{-- Укупна потрошња --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-secondary-green">
                    <div>
                        <p class="text-gray-600">Total Spent</p>
                        <h3 class="text-3xl font-bold text-secondary-green">$5,800</h3>
                    </div>
                    <i class="fas fa-wallet text-4xl text-gray-300"></i>
                </div>
                {{-- Завршени пројекти --}}
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-primary-orange">
                    <div>
                        <p class="text-gray-600">Completed Projects</p>
                        <h3 class="text-3xl font-bold text-primary-orange">10</h3>
                    </div>
                    <i class="fas fa-check-double text-4xl text-gray-300"></i>
                </div>
            </div>

            {{-- Ажурирања / Обавештења --}}
            <div class="bg-white p-8 rounded-lg shadow-md mb-10 border-l-4 border-dark-gray">
                <h2 class="text-2xl font-bold text-dark-gray mb-6">Recent Activity</h2>
                <ul class="space-y-4">
                    <li class="flex items-start text-gray-700">
                        <i class="fas fa-envelope text-primary-orange mt-1 mr-3"></i>
                        <div>
                            <span class="font-semibold">New message</span> from Freelancer Name regarding "Mobile App Redesign".
                            <span class="text-sm text-gray-500 block">10 minutes ago</span>
                        </div>
                        <a href="#" class="ml-auto text-primary-orange hover:underline transition duration-300">View</a>
                    </li>
                    <li class="flex items-start text-gray-700">
                        <i class="fas fa-file-invoice-dollar text-secondary-green mt-1 mr-3"></i>
                        <div>
                            New proposal received for project "<span class="font-semibold">E-commerce Website Build</span>".
                            <span class="text-sm text-gray-500 block">30 minutes ago</span>
                        </div>
                        <a href="#" class="ml-auto text-primary-orange hover:underline transition duration-300">Review Bids</a>
                    </li>
                    <li class="flex items-start text-gray-700">
                        <i class="fas fa-check-circle text-primary-orange mt-1 mr-3"></i>
                        <div>
                            Project "<span class="font-semibold">Content Marketing Strategy</span>" marked as <span class="font-semibold text-primary-orange">complete</span> by Freelancer.
                            <span class="text-sm text-gray-500 block">2 hours ago</span>
                        </div>
                        <a href="#" class="ml-auto text-primary-orange hover:underline transition duration-300">Review & Pay</a>
                    </li>
                </ul>
            </div>

            {{-- Активни пројекти --}}
            <h2 class="text-3xl font-bold text-dark-gray mb-6">Your Active Projects</h2>
            <div class="bg-white p-8 rounded-lg shadow-md mb-10 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Freelancer</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Budget</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">Mobile App Development</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Jane Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-green font-semibold">$4,000 - $6,000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary-orange hover:text-orange-700 mr-4">View</a>
                                <a href="#" class="text-secondary-green hover:text-green-700">Message</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">Marketing Campaign Strategy</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Awaiting Deliverables</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-green font-semibold">$1,800 - $2,500</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary-orange hover:text-orange-700 mr-4">View</a>
                                <a href="#" class="text-secondary-green hover:text-green-700">Message</a>
                            </td>
                        </tr>
                        {{-- Додај још редова за активне пројекте --}}
                    </tbody>
                </table>
            </div>

            {{-- Понуде на чекању --}}
            <div class="bg-orange-100 border-l-4 border-primary-orange text-orange-700 p-4 rounded-lg mb-8" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-gavel mr-3 text-2xl"></i>
                    <div>
                        <p class="font-bold">You have new bids to review!</p>
                        <p class="text-sm">There are <span class="font-bold">3 new proposals</span> on your "UI/UX Redesign" project.</p>
                    </div>
                    <a href="#" class="ml-auto bg-primary-orange text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-300">Review Bids</a>
                </div>
            </div>

        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />

</body>
</html>
