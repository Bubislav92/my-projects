<section id="reservations-form" class="py-24 px-6 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1552528156-3b10c9213197?q=80&w=2670&auto=format&fit=crop');">
    <div class="container mx-auto relative z-10">
        <h2 class="text-5xl font-extrabold text-white text-center mb-16 animate-fade-in-up drop-shadow-lg">Make a Reservation</h2>
        <div class="max-w-4xl mx-auto p-12 bg-white rounded-xl shadow-2xl animate-fade-in-up-200">
            <form action="#" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <div class="lg:col-span-1 space-y-10">
                    <div>
                        <h3 class="text-3xl font-bold text-highlight mb-6">Personal Details</h3>
                        <div class="space-y-6">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-primary">Full Name</label>
                                <input type="text" id="full_name" name="full_name" required class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-primary">Email Address</label>
                                <input type="email" id="email" name="email" required class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-primary">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold text-highlight mb-6">Reservation Details</h3>
                        <div class="space-y-6">
                            <div>
                                <label for="date" class="block text-sm font-medium text-primary">Date</label>
                                <input type="date" id="date" name="date" required class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3">
                            </div>
                            <div>
                                <label for="time" class="block text-sm font-medium text-primary">Time</label>
                                <input type="time" id="time" name="time" required class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3">
                            </div>
                            <div>
                                <label for="guests" class="block text-sm font-medium text-primary">Number of Guests</label>
                                <input type="number" id="guests" name="guests" min="1" max="10" required class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-10">
                    <div>
                        <h3 class="text-3xl font-bold text-highlight mb-6">Special Requests</h3>
                        <div class="space-y-6">
                            <div>
                                <label for="requests" class="block text-sm font-medium text-primary">Requests (optional)</label>
                                <textarea id="requests" name="requests" rows="8" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent bg-gray-50 text-primary p-3"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-auto">
                        <button type="submit" class="w-full bg-accent text-white py-4 px-8 rounded-lg font-semibold text-xl hover:bg-highlight hover:text-primary transition-all duration-300 transform hover:scale-105">
                            Submit Reservation
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>