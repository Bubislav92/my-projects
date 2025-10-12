<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Standardni SEO Meta Tagovi --}}
    <meta name="description" content="**DigitalyTycoon nudi vrhunske usluge web razvoja, izrade sajtova, e-commerce rešenja i digitalnog marketinga. Pretvorite svoju ideju u moćno online prisustvo.**">
    <meta name="keywords" content="web razvoj, izrada sajtova, e-commerce, digitalni marketing, frontend, backend, prilagođena rešenja, DigitalyTycoon">
    <link rel="canonical" href="**https://www.digitalytycoon.com/**"> {{-- Zameniti sa stvarnim URL-om vaše glavne stranice --}}
    <meta name="author" content="DigitalyTycoon">

    {{-- Open Graph (OG) Meta Tagovi - Za Facebook, LinkedIn, i većinu drugih mreža --}}
    <meta property="og:title" content="DigitalyTycoon - Vrhunski web razvoj i digitalna rešenja">
    <meta property="og:description" content="**DigitalyTycoon nudi vrhunske usluge web razvoja, izrade sajtova, e-commerce rešenja i digitalnog marketinga. Pretvorite svoju ideju u moćno online prisustvo.**">
    <meta property="og:url" content="**https://www.digitalytycoon.com/**"> {{-- Zameniti sa stvarnim URL-om --}}
    <meta property="og:site_name" content="DigitalyTycoon">
    <meta property="og:type" content="website"> {{-- Ako je ovo blog post, koristite "article" --}}
    <meta property="og:image" content="**https://www.digitalytycoon.com/images/share-slika.jpg**"> {{-- Zameniti sa URL-om slike (preporučeno 1200x630 piksela) --}}
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="sr_RS"> {{-- Ili sr_SR, en_US, itd. --}}

    {{-- Twitter Card Meta Tagovi - Specijalno za X (Twitter) --}}
    <meta name="twitter:card" content="summary_large_image"> {{-- Preporučuje se 'summary_large_image' --}}
    <meta name="twitter:site" content="@**DigitalyTycoon**"> {{-- Zameniti sa vašim Twitter handle-om (sa @) --}}
    <meta name="twitter:creator" content="@**DigitalyTycoon**"> {{-- Ako je isti kao site --}}
    <meta name="twitter:title" content="DigitalyTycoon - Vrhunski web razvoj">
    <meta name="twitter:description" content="**Pretvorite svoju ideju u moćno online prisustvo uz DigitalyTycoon. Web razvoj, e-commerce i digitalni marketing.**">
    <meta name="twitter:image" content="**https://www.digitalytycoon.com/images/share-slika.jpg**"> {{-- URL iste OG slike --}}

    <title>Контакт - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    @if(session('success'))
        <div id="success-notification" class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 p-4 rounded-lg shadow-lg text-white"
             style="background-color: #4CAF50;">
            {{ session('success') }}
        </div>
    @endif

    <main>
        {{-- Sekcija 1: Hero Banner za Shop --}}
        <section class="py-16 md:py-24 bg-secondary-dark border-b border-accent/20">
            <div class="container mx-auto px-6 max-w-7xl text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-accent mb-4" data-aos="fade-down">
                    Digitalni Projekti & Templati
                </h1>
                <p class="text-xl text-text-light/80 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Preuzmite gotove, visokokvalitetne web projekte i Tailwind/Laravel templejte. Optimizovani za performanse i lako prilagodljivi vašim potrebama.
                </p>
            </div>
        </section>
    
        {{-- Sekcija 2 & 3: Glavni Sadržaj (Sidebar & Proizvodi) --}}
        <section class="py-12 md:py-20 bg-primary-dark">
            <div class="container mx-auto px-6 max-w-7xl flex flex-col md:flex-row gap-10">
    
                {{-- Sidebar (Filteri i Kategorije) - Širok samo na desktopu --}}
                <aside class="w-full md:w-1/4 p-6 bg-secondary-dark rounded-xl h-fit sticky top-6" data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-text-light mb-6 border-b border-accent/50 pb-3">Filteri</h2>
    
                    {{-- Kategorije --}}
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-accent mb-3">Kategorije</h3>
                        <ul class="space-y-2 text-text-light/90">
                            <li class="hover:text-accent transition duration-200 cursor-pointer">Svi projekti (8)</li>
                            <li class="hover:text-accent transition duration-200 cursor-pointer">Laravel / Tailwind Templati (4)</li>
                            <li class="hover:text-accent transition duration-200 cursor-pointer">E-commerce Rešenja (2)</li>
                            <li class="hover:text-accent transition duration-200 cursor-pointer">Portfolio Dizajni (2)</li>
                        </ul>
                    </div>
    
                    {{-- Filtriranje po Ceni --}}
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-accent mb-3">Cena</h3>
                        <input type="range" min="0" max="100" value="50" class="w-full h-2 bg-primary-dark rounded-lg appearance-none cursor-pointer range-xl">
                        <div class="flex justify-between text-sm mt-1 text-text-light/70">
                            <span>$0</span>
                            <span>$100+</span>
                        </div>
                    </div>
    
                    {{-- Tip Licence --}}
                    <div>
                        <h3 class="text-xl font-semibold text-accent mb-3">Licenca</h3>
                        <div class="space-y-2">
                            <label class="flex items-center text-text-light/90">
                                <input type="checkbox" class="form-checkbox text-accent bg-primary-dark border-secondary-dark rounded" checked>
                                <span class="ml-2">Standardna</span>
                            </label>
                            <label class="flex items-center text-text-light/90">
                                <input type="checkbox" class="form-checkbox text-accent bg-primary-dark border-secondary-dark rounded">
                                <span class="ml-2">Proširena</span>
                            </label>
                        </div>
                    </div>
                </aside>
    
                {{-- Glavni Sadržaj (Grid Proizvoda) --}}
                <div class="w-full md:w-3/4">
    
                    {{-- Sortiranje --}}
                    <div class="mb-6 flex justify-between items-center text-text-light/80">
                        <p class="text-lg">Prikazano 1 - 8 od 8 proizvoda</p>
                        <select class="p-2 rounded-lg bg-secondary-dark border border-accent/30 focus:ring-accent focus:border-accent">
                            <option>Sortiraj: Najnovije</option>
                            <option>Sortiraj: Cena (rastuća)</option>
                            <option>Sortiraj: Cena (opadajuća)</option>
                            <option>Sortiraj: Popularnost</option>
                        </select>
                    </div>
    
                    {{-- Grid Proizvoda --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                        @forelse ($products as $product)
                            <div class="p-4 bg-secondary-dark rounded-xl shadow-lg transform hover:scale-[1.02] transition duration-300 group" data-aos="fade-up">

                                {{-- Slika Proizvoda --}}
                                <div class="relative overflow-hidden rounded-lg mb-4 h-48 bg-primary-dark border border-accent/20 flex items-center justify-center">
                                    @if ($product->image_url)
                                        <img src="{{ asset($product->image_url) }}" alt="{{ $product->getTranslation('name', app()->getLocale()) }}" class="object-cover w-full h-full">
                                    @else
                                        <i class="fas fa-desktop text-accent text-6xl opacity-40"></i>
                                    @endif

                                    {{-- Overlay link za demo verziju --}}
                                    @if ($product->demo_url)
                                        <a href="{{ $product->demo_url }}" target="_blank" class="absolute inset-0 bg-primary-dark/90 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <i class="fas fa-eye text-accent text-3xl mb-2"></i>
                                            <span class="text-text-light font-semibold text-lg">Pogledaj Probnu Verziju</span>
                                            <span class="text-xs text-text-light/70 mt-1">(Otvara se u novom tabu)</span>
                                        </a>
                                    @endif
                                </div>

                                {{-- Naslov i Opis --}}
                                <a href="{{ route('product.show', $product->slug) }}" class="block group-hover:text-accent transition duration-200">
                                    <h3 class="text-xl font-bold text-text-light mb-1 truncate">
                                        {{ $product->getTranslation('name', app()->getLocale()) }}
                                    </h3>
                                </a>

                                <p class="text-sm text-text-light/70 mb-4 h-10 overflow-hidden">
                                    {{ $product->getTranslation('short_description', app()->getLocale()) }}
                                </p>

                                {{-- Cena i Dugme --}}
                                <div class="flex justify-between items-center pt-2 border-t border-primary-dark/50">
                                    <span class="text-2xl font-extrabold text-accent">
                                        ${{ $product->discount_price ?? $product->price }}
                                    </span>
                                    <a href="{{ route('checkout', ['product' => $product->slug]) }}" class="px-4 py-2 bg-accent text-primary-dark font-semibold rounded-lg text-sm hover:bg-opacity-90 transition-colors shadow-md">
                                        Kupi <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                    </a>
                                </div>

                            </div>
                        @empty
                            <p class="col-span-3 text-center text-text-light/70">Trenutno nema dostupnih proizvoda.</p>
                        @endforelse

                    </div>

                    
                    {{-- Paginacija --}}
                    <div class="mt-12 flex justify-center" data-aos="fade-up">
                        <nav class="flex items-center space-x-2">
                            <a href="#" class="px-4 py-2 bg-secondary-dark text-text-light/70 rounded-lg hover:bg-accent hover:text-primary-dark transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="#" class="px-4 py-2 bg-accent text-primary-dark font-bold rounded-lg transition-colors">1</a>
                            <a href="#" class="px-4 py-2 bg-secondary-dark text-text-light/70 rounded-lg hover:bg-accent hover:text-primary-dark transition-colors">2</a>
                            <a href="#" class="px-4 py-2 bg-secondary-dark text-text-light/70 rounded-lg hover:bg-accent hover:text-primary-dark transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
    
                </div>
            </div>
        </section>
    
    </main>

    <x-footer />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('success-notification');
            if (notification) {
                setTimeout(() => {
                    notification.style.opacity = '0';
                    // Уклоните елемент након што транзиција заврши
                    setTimeout(() => notification.remove(), 500);
                }, 3000); // Обавештење ће бити видљиво 3 секунде
            }
        });
    </script>
</body>
</html>
