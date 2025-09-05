<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices & Payments</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 text-gray-800">

    <!-- Navigation (using the component) -->
    <x-client.client-navigation/>

    <!-- Main content -->
    <main class="min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Invoices & Payments</h1>

            <!-- Financial Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Paid -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-secondary-green">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-gray-500 uppercase">Total Paid</span>
                        <i class="fas fa-dollar-sign text-2xl text-secondary-green"></i>
                    </div>
                    <div class="text-3xl font-bold text-dark-gray">$10,250</div>
                    <p class="text-sm text-gray-500">Total since the start of cooperation</p>
                </div>
                <!-- Pending Payments -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-primary-orange">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-gray-500 uppercase">Pending Payments</span>
                        <i class="fas fa-clock text-2xl text-primary-orange"></i>
                    </div>
                    <div class="text-3xl font-bold text-dark-gray">$1,500</div>
                    <p class="text-sm text-gray-500">Expected payments this month</p>
                </div>
                <!-- Number of Projects -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-dark-gray">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-gray-500 uppercase">Number of Completed Projects</span>
                        <i class="fas fa-project-diagram text-2xl text-dark-gray"></i>
                    </div>
                    <div class="text-3xl font-bold text-dark-gray">5</div>
                    <p class="text-sm text-gray-500">Total projects with freelancers</p>
                </div>
            </div>

            <!-- Invoices and Payments Table -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-dark-gray mb-6">Payment History</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Freelancer Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Example 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    October 25, 2024
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">
                                    Jelena Petrović
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Logo Design
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">
                                    $500
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span class="bg-secondary-green text-white px-2 py-1 rounded-full text-xs font-semibold">Paid</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-primary-orange hover:underline">Download</a>
                                </td>
                            </tr>
                            <!-- Example 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    October 10, 2024
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">
                                    Marko Jovanović
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Marketing Campaign
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark-gray">
                                    $1,000
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span class="bg-secondary-green text-white px-2 py-1 rounded-full text-xs font-semibold">Paid</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-primary-orange hover:underline">Download</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    {{-- Footer (Footer) --}}
    <x-footer />
    
</body>
</html>
