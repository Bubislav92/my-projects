<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-800">

    <!-- Navigation (using the component) -->
    <x-client.navigation/>

    <!-- Main content -->
    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">My Profile</h1>

            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6 md:p-10">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                    <!-- Profile Picture Section -->
                    <div class="flex-shrink-0 relative">
                        <img class="w-32 h-32 rounded-full border-4 border-primary-orange" src="https://via.placeholder.com/150" alt="Profile picture">
                        <button class="absolute bottom-0 right-0 p-2 bg-primary-orange text-white rounded-full hover:bg-orange-600 transition duration-300">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <!-- User Details -->
                    <div class="flex-1 text-center md:text-left">
                        <h2 class="text-2xl font-bold text-dark-gray">ClientName</h2>
                        <p class="text-gray-600 mt-1">Client since: <span class="font-medium">January 2024</span></p>
                        <p class="text-gray-600 mt-1">Location: <span class="font-medium">Belgrade, Serbia</span></p>
                        <p class="text-gray-600 mt-1">Active Projects: <span class="font-medium">2</span></p>
                        <p class="text-gray-600 mt-1">Completed Projects: <span class="font-medium">5</span></p>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <!-- Profile Information Form -->
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm" value="ClientName">
                        </div>
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm" value="client@example.com">
                        </div>
                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm" placeholder="e.g., Belgrade, Serbia">
                        </div>
                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm" placeholder="e.g., +381 60 123 4567">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange sm:text-sm" placeholder="Tell us a little about yourself and your company."></textarea>
                    </div>

                    <div class="mt-6 text-right">
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
