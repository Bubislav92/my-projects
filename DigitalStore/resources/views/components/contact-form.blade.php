<section class="py-16 md:py-24 bg-surface-light">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-24">

            {{-- Contact Information --}}
            <div class="space-y-8">
                <div>
                    <h3 class="font-bold text-2xl text-text-primary mb-2">General Inquiries</h3>
                    <p class="text-text-secondary">
                        For any general questions about our store or products, please reach out to us.
                    </p>
                    <p class="text-accent-green font-medium mt-2">
                        contact@yourstore.com
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-2xl text-text-primary mb-2">Technical Support</h3>
                    <p class="text-text-secondary">
                        If you need help with a purchase or have a technical issue, our support team is ready to assist.
                    </p>
                    <p class="text-accent-green font-medium mt-2">
                        support@yourstore.com
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-2xl text-text-primary mb-2">Address</h3>
                    <p class="text-text-secondary">
                        123 Digital Street, Suite 456<br>
                        Creative City, DC 78901
                    </p>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h3 class="font-bold text-2xl text-text-primary mb-6">Send Us a Message</h3>
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-text-secondary">Full Name</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-text-secondary">Email Address</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green" required>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-text-secondary">Subject</label>
                        <input type="text" id="subject" name="subject" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-text-secondary">Message</label>
                        <textarea id="message" name="message" rows="5" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-green" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-accent-orange text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-80 transition-colors duration-300">
                        Send Message
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>