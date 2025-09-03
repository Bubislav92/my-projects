<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Settings</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/app.js'])
</head>
<body class="antialiased text-gray-800">

    <!-- Navigation (using the component) -->
    <x-client.navigation/>

    <!-- Main content -->
    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Settings</h1>

            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6 md:p-10">
                <form>
                    <!-- General Settings Section -->
                    <h2 class="text-2xl font-bold text-dark-gray mb-6">General Settings</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                            <select id="language" name="language" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm">
                                <option>English</option>
                                <option>Serbian</option>
                            </select>
                        </div>
                        <div>
                            <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                            <select id="timezone" name="timezone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm">
                                <option>Central European Time (CET)</option>
                                <option>Eastern Time (ET)</option>
                                <option>Pacific Time (PT)</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-8 border-gray-200">

                    <!-- Password Security Section -->
                    <h2 class="text-2xl font-bold text-dark-gray mb-6">Password Security</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm">
                        </div>
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm">
                        </div>
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm">
                        </div>
                    </div>

                    <hr class="my-8 border-gray-200">

                    <!-- Notification Settings Section -->
                    <h2 class="text-2xl font-bold text-dark-gray mb-6">Notification Settings</h2>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input id="email_notifications" name="email_notifications" type="checkbox" class="h-4 w-4 text-primary-orange border-gray-300 rounded focus:ring-primary-orange">
                            <label for="email_notifications" class="ml-3 block text-sm font-medium text-gray-700">
                                Email Notifications
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="push_notifications" name="push_notifications" type="checkbox" class="h-4 w-4 text-primary-orange border-gray-300 rounded focus:ring-primary-orange">
                            <label for="push_notifications" class="ml-3 block text-sm font-medium text-gray-700">
                                Push Notifications
                            </label>
                        </div>
                    </div>

                    <div class="mt-8 text-right">
                        <button type="submit" class="bg-primary-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300 shadow-md">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />
    
</body>
</html>
