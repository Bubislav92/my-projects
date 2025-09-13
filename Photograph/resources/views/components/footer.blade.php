<footer class="bg-gray-50 py-12 px-4 md:px-8 text-gray-700"
        data-aos="fade-up" data-aos-duration="1000">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 items-start justify-items-center md:justify-items-start text-center md:text-left">

            {{-- Kolona 1: Logo i opis --}}
            <div class="flex flex-col items-center md:items-start space-y-4">
                <a href="{{ route('home') }}" class="group flex items-center space-x-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="h-8 w-8 text-amber-500 transition-colors duration-300 group-hover:text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.218A2 2 0 0110.19 4h3.62a2 2 0 011.664.89l.812 1.218A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-2xl font-bold tracking-tight text-stone-950 transition-colors duration-300 group-hover:text-amber-600">Alex Reed</span>
                </a>
                <p class="text-sm text-gray-600 max-w-xs">
                    Capturing moments that last a lifetime.
                </p>
            </div>

            {{-- Kolona 2: Navigacija --}}
            <div class="flex flex-col items-center md:items-start space-y-4">
                <h4 class="text-lg font-bold text-gray-900">Quick Links</h4>
                <nav class="flex flex-col space-y-2 text-gray-700">
                    <a href="{{ route('home') }}" class="hover:text-amber-500 transition-colors duration-300">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-amber-500 transition-colors duration-300">About</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Services</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Portfolio</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Contact</a>
                </nav>
            </div>

            {{-- Kolona 3: Social linkovi --}}
            <div class="flex flex-col items-center md:items-start space-y-4">
                <h4 class="text-lg font-bold text-gray-900">Connect With Me</h4>
                <div class="flex space-x-4">
                    {{-- Ikone su iste kao u vašem kodu --}}
                    <a href="#" class="text-gray-700 hover:text-amber-500 transition-colors duration-300">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-2c-.552 0-1 .448-1 1v2h3l-.422 3h-2.578v8h-3v-8h-2v-3h2v-2c0-2.209 1.791-4 4-4h2v3z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-amber-500 transition-colors duration-300">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 2.163c3.204 0 3.584.012 4.851.07 1.17.055 1.805.249 2.227.425.432.181.802.404 1.13.732.327.327.55.698.732 1.13.176.422.37 1.057.425 2.227.058 1.267.07 1.647.07 4.851s-.012 3.584-.07 4.851c-.055 1.17-.249 1.805-.425 2.227-.181.432-.404.802-.732 1.13-.327.327-.698.55-1.13.732-.422.176-1.057.37-2.227.425-1.267.058-1.647.07-4.851.07s-.014-.072-4.947-.072c-1.28-.058-2.164-.281-2.923-.633-.76-.352-1.378-.854-1.996-1.472-.618-.618-1.12-1.236-1.472-1.996-.352-.76-.575-1.643-.633-2.923-.058-1.28-.072-1.688-.072-4.947s.014-3.667.072-4.947c.058-1.28.281-2.164.633-2.923.352-.76.854-1.378 1.472-1.996.618-.618 1.236-1.12 1.996-1.472.76-.352 1.643-.575 2.923-.633 1.28-.058 1.688-.072 4.947-.072zm0 8.019c-2.247 0-4.076-1.829-4.076-4.076s1.829-4.076 4.076-4.076 4.076 1.829 4.076 4.076-1.829 4.076-4.076 4.076zm0-6.019c-1.077 0-1.956.88-1.956 1.956s.88 1.956 1.956 1.956 1.956-.88 1.956-1.956-.88-1.956-1.956-1.956zm6.398-1.402c.814-.047 1.32-.236 1.61-.368.324-.148.56-.341.765-.546.205-.205.398-.44.546-.765.132-.29.321-.796.368-1.61.047-1.121.058-1.503.058-3.085h-1.076c.002.584 0 1.258-.027 1.921-.044.978-.178 1.636-.379 2.05-.201.414-.492.684-.88.88-.414.201-1.072.335-2.05.379-1.026.046-1.52.053-3.083.053s-2.057-.007-3.083-.053c-.978-.044-1.636-.178-2.05-.379-.414-.201-.684-.492-.88-.88-.201-.414-.335-1.072-.379-2.05-.046-1.026-.053-1.52-.053-3.083s.007-2.057.053-3.083c.044-.978.178-1.636.379-2.05.201-.414.492-.684.88-.88.414-.201.492.684.88-.201-.414.335-1.072-.379-2.05.046-1.026.053-1.52.053-3.083z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-amber-500 transition-colors duration-300">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.795-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.571 0-6.47 2.9-6.47 6.47 0 .506.056.999.167 1.474-5.385-.275-10.14-2.868-13.33-6.425-.556.958-.876 2.07-.876 3.256 0 2.247 1.144 4.223 2.88 5.372-.67-.022-1.294-.206-1.84-.509v.083c0 3.13 2.22 5.74 5.166 6.324-.54.148-1.115.226-1.69.226-.414 0-.814-.04-1.205-.114.821 2.564 3.208 4.437 6.045 4.48-2.204 1.724-4.99 2.756-8.01 2.756-1.554 0-3.07-.09-4.554-.266 2.867 1.834 6.262 2.895 9.89 2.895 11.895 0 18.364-9.838 18.364-18.364 0-.281-.006-.562-.019-.843.957-.694 1.79-1.562 2.455-2.553z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500 space-y-4 md:space-y-0">
            <p>&copy; {{ date('Y') }} Alex Reed. All Rights Reserved.</p>
            <p>Designed and developed by: <a href="http://www.digitalytycoon.com" class="hover:text-amber-500 transition-colors">Digitaly Tycoon</a></p>
        </div>
    </div>
</footer>