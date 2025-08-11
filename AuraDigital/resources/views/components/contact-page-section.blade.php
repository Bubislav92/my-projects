<section id="contact-page-section" class="py-20">
  <div class="container mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-start">

      {{-- Део са контакт детаљима --}}
      <div class="space-y-8 p-8 rounded-xl shadow-lg bg-light-bg" data-aos="fade-right">
        <h2 class="text-3xl font-extrabold text-primary-blue">Дођите или пошаљите поруку</h2>
        <p class="text-lg text-medium-gray">
          Наш тим је увек доступан да разговара о вашем следећем пројекту.
        </p>
        <div class="space-y-4">

          <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 text-accent-yellow">
              <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"></path></svg>
            </div>
            <div>
              <h4 class="font-bold text-primary-blue">E-mail</h4>
              <a href="mailto:kontakt@auradigital.com" class="text-medium-gray hover:text-primary-blue transition duration-300">kontakt@auradigital.com</a>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 text-accent-yellow">
              <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm0-4h-2V7h2v8z"></path></svg>
            </div>
            <div>
              <h4 class="font-bold text-primary-blue">Телефон</h4>
              <a href="tel:+38111123456" class="text-medium-gray hover:text-primary-blue transition duration-300">+381 11 123 456</a>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div class="flex-shrink-0 text-accent-yellow">
              <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c-4.41 0-8 3.59-8 8 0 4.42 8 12 8 12s8-7.58 8-12c0-4.41-3.59-8-8-8zm0 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"></path></svg>
            </div>
            <div>
              <h4 class="font-bold text-primary-blue">Адреса</h4>
              <p class="text-medium-gray">Београд, Србија</p>
            </div>
          </div>

        </div>
      </div>

      {{-- Део са контакт формом --}}
      <div class="p-8 rounded-xl shadow-lg bg-white" data-aos="fade-left">
        <form action="#" method="POST" class="space-y-4">
          <h3 class="text-3xl font-extrabold text-primary-blue mb-4">Пошаљите нам поруку</h3>
          <div>
            <label for="name" class="block text-left text-medium-gray">Име и Презиме</label>
            <input type="text" id="name" name="name" class="w-full border-2 border-gray-200 rounded-md p-3 focus:border-primary-blue transition duration-300" required>
          </div>
          <div>
            <label for="email" class="block text-left text-medium-gray">E-mail Адреса</label>
            <input type="email" id="email" name="email" class="w-full border-2 border-gray-200 rounded-md p-3 focus:border-primary-blue transition duration-300" required>
          </div>
          <div>
            <label for="message" class="block text-left text-medium-gray">Порука</label>
            <textarea id="message" name="message" rows="6" class="w-full border-2 border-gray-200 rounded-md p-3 focus:border-primary-blue transition duration-300" required></textarea>
          </div>
          <button type="submit" class="w-full px-6 py-3 bg-primary-blue text-white rounded-full font-bold hover:bg-blue-800 transition duration-300">Пошаљи поруку</button>
        </form>
      </div>

    </div>
  </div>
</section>
