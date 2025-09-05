<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security & Privacy</title>

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
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Account Security</h1>

            <div class="space-y-8">
                <!-- Password Management Card -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-l-4 border-primary-orange">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-lock text-2xl text-primary-orange mr-3"></i>
                        <h2 class="text-2xl font-bold text-dark-gray">Password Management</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Update your password regularly to keep your account secure.</p>
                    <form>
                        <div class="mb-4">
                            <label for="current_password" class="block text-gray-700 font-semibold mb-2">Current Password</label>
                            <input type="password" id="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange transition duration-300">
                        </div>
                        <div class="mb-4">
                            <label for="new_password" class="block text-gray-700 font-semibold mb-2">New Password</label>
                            <input type="password" id="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange transition duration-300">
                        </div>
                        <div class="mb-6">
                            <label for="confirm_password" class="block text-gray-700 font-semibold mb-2">Confirm New Password</label>
                            <input type="password" id="confirm_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange transition duration-300">
                        </div>
                        <button type="submit" class="bg-primary-orange text-white px-6 py-3 rounded-md font-semibold hover:bg-orange-700 transition duration-300">Change Password</button>
                    </form>
                </div>

                <!-- Two-Factor Authentication Card -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-l-4 border-secondary-green">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-shield-alt text-2xl text-secondary-green mr-3"></i>
                        <h2 class="text-2xl font-bold text-dark-gray">Two-Factor Authentication (2FA)</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Add an extra layer of security to your account. You will be asked for a code from your phone in addition to your password to log in.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700 font-semibold">Status: <span class="text-secondary-green">Enabled</span></span>
                        <button class="bg-secondary-green text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition duration-300">Disable 2FA</button>
                    </div>
                </div>

                <!-- Login History Card -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-l-4 border-dark-gray">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-history text-2xl text-dark-gray mr-3"></i>
                        <h2 class="text-2xl font-bold text-dark-gray">Login History</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Review recent login activity on your account.</p>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Device
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Oct 25, 2024
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        Chrome on Windows
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        Belgrade, Serbia
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-secondary-green font-semibold">Success</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Oct 24, 2024
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        Safari on iOS
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        Belgrade, Serbia
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-secondary-green font-semibold">Success</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Footer (Footer) --}}
    <x-footer />
    
</body>
</html>
