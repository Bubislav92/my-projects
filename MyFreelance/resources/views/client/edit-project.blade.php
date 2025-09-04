<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    
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

        <!-- Main section for editing the project -->
        <div class="bg-white p-8 rounded-lg shadow-xl border-l-4 border-primary-orange">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-dark-gray mb-2">Edit Project Details</h1>
                    <p class="text-xl text-primary-orange font-medium">Project: E-commerce Website Build</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <button onclick="window.history.back()" class="bg-dark-gray text-white px-6 py-3 rounded-md font-semibold hover:bg-gray-700 transition duration-300 shadow-md">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Project
                    </button>
                </div>
            </div>

            <!-- Edit form -->
            <form class="space-y-6">
                <!-- Project Title -->
                <div>
                    <label for="title" class="block text-lg font-semibold text-dark-gray mb-2">Project Title</label>
                    <input type="text" id="title" name="title" value="E-commerce Website Build"
                           class="w-full p-3 rounded-lg border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange transition duration-300">
                </div>

                <!-- Project Description -->
                <div>
                    <label for="description" class="block text-lg font-semibold text-dark-gray mb-2">Project Description</label>
                    <textarea id="description" name="description" rows="6"
                              class="w-full p-3 rounded-lg border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange transition duration-300">
We are looking for an experienced web developer to build a complete e-commerce platform from scratch. The project includes developing functionalities for user accounts, shopping carts, secure payment, and product management. We want a modern interface and fast, reliable performance on all devices.
                    </textarea>
                </div>

                <!-- Budget and Skills -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="budget" class="block text-lg font-semibold text-dark-gray mb-2">Budget Range</label>
                        <input type="text" id="budget" name="budget" value="$5,000 - $8,000"
                               class="w-full p-3 rounded-lg border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange transition duration-300">
                    </div>
                    <div>
                        <label for="skills" class="block text-lg font-semibold text-dark-gray mb-2">Required Skills (Comma-separated)</label>
                        <input type="text" id="skills" name="skills" value="PHP, Laravel, Vue.js, Tailwind CSS"
                               class="w-full p-3 rounded-lg border-gray-300 shadow-sm focus:border-primary-orange focus:ring-primary-orange transition duration-300">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-4 pt-4">
                    <button type="button" class="border border-red-500 text-red-500 px-6 py-3 rounded-md font-semibold hover:bg-red-50 hover:text-red-700 transition duration-300">
                        Cancel
                    </button>
                    <button type="submit" class="bg-secondary-green text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition duration-300 shadow-md">
                        <i class="fas fa-save mr-2"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

</body>
</html>
