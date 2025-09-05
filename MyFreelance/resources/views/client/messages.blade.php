<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Messages</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts (Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/app.js'])
</head>
<body class="antialiased text-gray-800">

    <!-- Navigation (using the component) -->
    <x-client.client-navigation/>

    <!-- Main content -->
    <main class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4 md:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray text-center mb-12">My Messages</h1>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row h-[75vh]">
                <!-- Conversations List -->
                <div class="w-full md:w-1/3 border-r border-gray-200 overflow-y-auto">
                    <!-- Example of a conversation item -->
                    <div class="p-4 border-b border-gray-200 hover:bg-gray-50 cursor-pointer transition duration-200 flex items-center space-x-4 conversation-item active-conversation bg-gray-100 border-l-4 border-primary-orange" data-conversation-id="1">
                        <div class="relative">
                            <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-full w-12 h-12">
                            <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-green-500"></span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-dark-gray">Marko Marić</h4>
                            <p class="text-sm text-gray-500 truncate">Hello, I have a question about...</p>
                        </div>
                    </div>
                    <!-- Another example -->
                    <div class="p-4 border-b border-gray-200 hover:bg-gray-50 cursor-pointer transition duration-200 flex items-center space-x-4 conversation-item" data-conversation-id="2">
                        <div class="relative">
                            <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-full w-12 h-12">
                            <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-gray-400"></span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-dark-gray">Jana Jovanović</h4>
                            <p class="text-sm text-gray-500 truncate">I'll send you the files today...</p>
                        </div>
                    </div>
                    <!-- Another example -->
                    <div class="p-4 border-b border-gray-200 hover:bg-gray-50 cursor-pointer transition duration-200 flex items-center space-x-4 conversation-item" data-conversation-id="3">
                        <div class="relative">
                            <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-full w-12 h-12">
                            <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-green-500"></span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-dark-gray">Petar Petrović</h4>
                            <p class="text-sm text-gray-500 truncate">Let's talk about the new project phase...</p>
                        </div>
                    </div>
                </div>

                <!-- Chat Area -->
                <div class="w-full md:w-2/3 flex flex-col">
                    <!-- Chat Header -->
                    <div class="p-4 border-b border-gray-200 flex items-center space-x-4">
                        <img src="https://via.placeholder.com/50" alt="Recipient Avatar" class="rounded-full w-12 h-12">
                        <div class="flex-1">
                            <h3 class="font-semibold text-lg text-dark-gray">Marko Marić</h3>
                            <p class="text-sm text-gray-500">Online</p>
                        </div>
                    </div>

                    <div class="flex-1 p-6 overflow-y-auto chat-container flex flex-col space-y-4">
                        <!-- Received Message -->
                        <div class="flex items-end space-x-2">
                            <img src="https://via.placeholder.com/40" alt="Recipient Avatar" class="rounded-full w-10 h-10">
                            <div class="bg-gray-200 p-3 rounded-xl max-w-sm">
                                <p class="text-sm">Hello, I have a question about the project scope. Can we discuss this?</p>
                                <span class="text-xs text-gray-500 block text-right mt-1">10:30 AM</span>
                            </div>
                        </div>

                        <!-- Sent Message -->
                        <div class="flex justify-end items-end space-x-2">
                            <div class="bg-primary-orange text-white p-3 rounded-xl max-w-sm">
                                <p class="text-sm">Hi Marko, of course! What's on your mind?</p>
                                <span class="text-xs text-orange-200 block text-right mt-1">10:32 AM</span>
                            </div>
                            <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10">
                        </div>

                        <!-- Received Message -->
                        <div class="flex items-end space-x-2">
                            <img src="https://via.placeholder.com/40" alt="Recipient Avatar" class="rounded-full w-10 h-10">
                            <div class="bg-gray-200 p-3 rounded-xl max-w-sm">
                                <p class="text-sm">I've attached a document with a few questions regarding the wireframes.</p>
                                <span class="text-xs text-gray-500 block text-right mt-1">10:35 AM</span>
                            </div>
                        </div>
                    </div>
                    <!-- Message input form -->
                    <form class="p-4 border-t border-gray-200">
                        <div class="flex items-center space-x-4">
                            <input type="text" placeholder="Write a message..." class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-orange">
                            <button type="submit" class="bg-primary-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300 shadow-md">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    {{-- Футер (Footer) --}}
    <x-footer />
    
</body>
</html>
