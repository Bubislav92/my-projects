<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background-light antialiased">

    <div class="h-screen flex">
        <div class="w-1/4 bg-background-dark border-r border-border flex flex-col">
            <div class="p-4 border-b border-border">
                <h2 class="text-xl font-semibold text-text-dark">Messages</h2>
            </div>
            
            <div class="flex-1 overflow-y-auto">
                <a href="#" class="flex items-center p-4 hover:bg-background-light border-b border-border">
                    <img src="https://via.placeholder.com/50" alt="User Avatar" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <p class="font-medium text-text-dark">User Name 1</p>
                        <p class="text-sm text-text-light truncate">Last message here...</p>
                    </div>
                </a>
                
                </div>
        </div>
        
        <div class="flex-1 flex flex-col bg-white">
            <div class="p-4 border-b border-border flex items-center bg-background-dark">
                <img src="https://via.placeholder.com/50" alt="Chat Avatar" class="w-10 h-10 rounded-full mr-3">
                <h2 class="text-xl font-semibold text-text-dark">User Name 1</h2>
            </div>
            
            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <div class="flex justify-end">
                    <div class="bg-secondary text-text-dark p-3 rounded-lg max-w-xs">
                        <p>This is a sent message.</p>
                        <p class="text-xs text-text-light mt-1 text-right">10:30 AM</p>
                    </div>
                </div>
                
                <div class="flex justify-start">
                    <div class="bg-background-dark text-text-dark p-3 rounded-lg max-w-xs">
                        <p>This is a received message. Great design!</p>
                        <p class="text-xs text-text-light mt-1 text-left">10:31 AM</p>
                    </div>
                </div>
                
                </div>
            
            <div class="p-4 border-t border-border bg-background-light flex items-center">
                <input type="text" placeholder="Write a message..." class="flex-1 rounded-full px-4 py-2 border border-border focus:outline-none focus:ring-2 focus:ring-primary text-text-dark">
                <button class="ml-4 p-3 rounded-full bg-primary text-white hover:bg-secondary transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

</body>
</html>