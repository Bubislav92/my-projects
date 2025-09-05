<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Freelance - Notifications</title>
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/user-menu.js', 'resources/js/notification.js', 'resources/js/notification-page.js'])
    
</head>
<body class="antialiased text-gray-800 bg-gray-100">

    <!-- Navigation -->
    <x-client.client-navigation/>

    <!-- Main Content for Notifications -->
    <main class="container mx-auto px-4 md:px-8 py-10 min-h-screen">
        <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">Notifications</h1>

        <!-- 'Mark all as read' button -->
        <div class="flex justify-end mb-6">
            <button class="text-primary-orange hover:text-orange-700 transition duration-300">
                Mark all as read
            </button>
        </div>

        <div class="space-y-4">
            <!-- Example Notification Item -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 hover:shadow-lg transition duration-300 cursor-pointer">
                <i class="fas fa-envelope text-2xl text-primary-orange mt-1"></i>
                <div class="flex-1">
                    <h2 class="font-semibold text-lg text-dark-gray">New Message</h2>
                    <p class="text-gray-600">You have received a new message from freelancer <span class="font-medium text-dark-gray">Marko Petrović</span> regarding the project <span class="font-medium text-dark-gray">"Website Redesign".</span></p>
                    <p class="text-xs text-gray-400 mt-2">10 minutes ago</p>
                </div>
            </div>

            <!-- Example Notification Item (Read) -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 opacity-70 hover:shadow-lg transition duration-300 cursor-pointer">
                <i class="fas fa-check-circle text-2xl text-secondary-green mt-1"></i>
                <div class="flex-1">
                    <h2 class="font-semibold text-lg text-dark-gray">Project Completed</h2>
                    <p class="text-gray-600">Freelancer <span class="font-medium text-dark-gray">Ana Lazić</span> has marked the project <span class="font-medium text-dark-gray">"Logo Design"</span> as completed.</p>
                    <p class="text-xs text-gray-400 mt-2">2 hours ago</p>
                </div>
            </div>

            <!-- Example Notification Item -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 hover:shadow-lg transition duration-300 cursor-pointer">
                <i class="fas fa-file-invoice-dollar text-2xl text-blue-500 mt-1"></i>
                <div class="flex-1">
                    <h2 class="font-semibold text-lg text-dark-gray">Invoice Received</h2>
                    <p class="text-gray-600">A new invoice has been received for the project <span class="font-medium text-dark-gray">"Mobile App Development".</span> Please review it and make the payment.</p>
                    <p class="text-xs text-gray-400 mt-2">Yesterday</p>
                </div>
            </div>

            <!-- Example Notification Item -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 hover:shadow-lg transition duration-300 cursor-pointer">
                <i class="fas fa-comment-dots text-2xl text-purple-500 mt-1"></i>
                <div class="flex-1">
                    <h2 class="font-semibold text-lg text-dark-gray">New Comment</h2>
                    <p class="text-gray-600">Freelancer <span class="font-medium text-dark-gray">Ivan Kovačević</span> left a comment on your project <span class="font-medium text-dark-gray">"Marketing Campaign".</span></p>
                    <p class="text-xs text-gray-400 mt-2">2 days ago</p>
                </div>
            </div>

        </div>
    </main>

    {{-- Footer --}}
    <x-footer />

</body>
</html>
