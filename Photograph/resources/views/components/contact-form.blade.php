<section class="bg-neutral-50 py-16 md:py-24" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white p-8 md:p-12 rounded-lg shadow-xl border border-slate-300">
            <h2 class="text-3xl font-bold text-neutral-950 mb-6 text-center">Send a Message</h2>
            
            <form action="#" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-600 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 bg-neutral-50 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-400 transition-colors duration-300">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-600 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-neutral-50 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-400 transition-colors duration-300">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="subject" class="block text-sm font-semibold text-slate-600 mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 bg-neutral-50 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-400 transition-colors duration-300">
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-sm font-semibold text-slate-600 mb-2">Message</label>
                    <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 bg-neutral-50 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-400 transition-colors duration-300"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-accent-600 text-neutral-950 py-3 px-12 rounded-full font-bold text-lg hover:bg-accent-400 transition-colors duration-300 transform hover:scale-105">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>