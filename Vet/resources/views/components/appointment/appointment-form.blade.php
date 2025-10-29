<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white p-8 sm:p-12 rounded-xl shadow-2xl border-t-8 border-primary-500">
            
            <form action="#" method="POST" class="space-y-10">
                
                <div>
                    <h2 class="text-2xl font-bold text-primary-700 border-b pb-2 mb-6">1. Your Contact Information</h2>
                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                        
                        <div>
                            <label for="owner-name" class="block text-sm font-medium text-gray-700">Your Name</label>
                            <input type="text" name="owner-name" id="owner-name" autocomplete="name" required class="mt-1 py-3 px-4 block w-full shadow-sm focus:ring-secondary-500 focus:border-secondary-500 border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required class="mt-1 py-3 px-4 block w-full shadow-sm focus:ring-secondary-500 focus:border-secondary-500 border-gray-300 rounded-md">
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" id="phone" autocomplete="tel" required class="mt-1 py-3 px-4 block w-full shadow-sm focus:ring-secondary-500 focus:border-secondary-500 border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-2xl font-bold text-primary-700 border-b pb-2 mb-6">2. Pet Details</h2>
                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                        
                        <div>
                            <label for="pet-name" class="block text-sm font-medium text-gray-700">Pet's Name</label>
                            <input type="text" name="pet-name" id="pet-name" required class="mt-1 py-3 px-4 block w-full shadow-sm focus:ring-secondary-500 focus:border-secondary-500 border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="pet-species" class="block text-sm font-medium text-gray-700">Species</label>
                            <select id="pet-species" name="pet-species" required class="mt-1 block w-full py-3 px-4 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-secondary-500 focus:border-secondary-500">
                                <option value="">Select Species</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                                <option value="other">Other (e.g., Rabbit, Bird)</option>
                            </select>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="is-existing-client" class="block text-sm font-medium text-gray-700">Are you an existing VET client?</label>
                            <div class="mt-2 flex space-x-6">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="is-existing-client" value="yes" class="form-radio h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500">
                                    <span class="ml-2 text-gray-700">Yes</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="is-existing-client" value="no" checked class="form-radio h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500">
                                    <span class="ml-2 text-gray-700">No, this is my first visit</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-2xl font-bold text-primary-700 border-b pb-2 mb-6">3. Appointment Details</h2>
                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                        
                        <div class="sm:col-span-2">
                            <label for="service-type" class="block text-sm font-medium text-gray-700">Reason for Visit</label>
                            <select id="service-type" name="service-type" required class="mt-1 block w-full py-3 px-4 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-secondary-500 focus:border-secondary-500">
                                <option value="">Select Service Type</option>
                                <option value="wellness">Annual Wellness Exam / Vaccination</option>
                                <option value="sick-visit">Sick Pet / Health Concern</option>
                                <option value="surgery-consult">Surgical Consultation (e.g., Spay/Neuter)</option>
                                <option value="dental">Dental Check-up / Cleaning</option>
                                <option value="follow-up">Follow-up Exam</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="preferred-date" class="block text-sm font-medium text-gray-700">Preferred Date</label>
                            <input type="date" name="preferred-date" id="preferred-date" required class="mt-1 py-3 px-4 block w-full shadow-sm focus:ring-secondary-500 focus:border-secondary-500 border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="preferred-time" class="block text-sm font-medium text-gray-700">Preferred Time of Day</label>
                            <select id="preferred-time" name="preferred-time" class="mt-1 block w-full py-3 px-4 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-secondary-500 focus:border-secondary-500">
                                <option value="">Select Time Preference</option>
                                <option value="morning">Morning (8:00 AM - 12:00 PM)</option>
                                <option value="afternoon">Afternoon (12:00 PM - 4:00 PM)</option>
                                <option value="late-afternoon">Late Afternoon (4:00 PM - 7:00 PM)</option>
                            </select>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="concern-details" class="block text-sm font-medium text-gray-700">Briefly describe your pet's concern</label>
                            <textarea id="concern-details" name="concern-details" rows="4" class="mt-1 py-3 px-4 block w-full shadow-sm focus:ring-secondary-500 focus:border-secondary-500 border-gray-300 rounded-md" placeholder="e.g., 'Coughing for three days' or 'Needs annual vaccination and heartworm test'."></textarea>
                        </div>
                        
                    </div>
                </div>
                
                <div class="pt-5">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 border border-transparent rounded-md shadow-lg text-lg font-medium text-white bg-primary-500 hover:bg-primary-600 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Request Appointment
                    </button>
                </div>
            </form>
            
        </div>
        
    </div>
</section>