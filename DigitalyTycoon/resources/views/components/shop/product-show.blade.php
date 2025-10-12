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

    <title>Портфолио - DigitalyTycoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Definise stil za nevidljive kartice */
        .project-card:not(.visible) {
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
        }

        /* Definise stil za vidljive kartice */
        .project-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Dodaje glatku tranziciju za animaciju */
        .project-card {
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-primary-dark text-text-light antialiased">

    <x-header />

    <main class="py-16 md:py-20 bg-primary-dark">
        <div class="container mx-auto px-6 max-w-7xl">
    
            {{-- 1. Glavni Prikaz Proizvoda (Levi/Desni Raspored) --}}
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 mb-20">
                
                {{-- Leva strana: Veliki Prikaz/Screenshotovi --}}
                <div data-aos="fade-right">
                    <div class="h-96 bg-secondary-dark rounded-xl flex items-center justify-center mb-4 border border-accent/30">
                        <i class="fas fa-desktop text-accent text-8xl opacity-30"></i>
                    </div>
                    
                    {{-- Thumbnails (Mali pregledi) --}}
                    <div class="flex space-x-3 overflow-x-auto p-1">
                        <div class="w-20 h-16 bg-secondary-dark rounded-md border-2 border-accent/70 cursor-pointer"></div>
                        <div class="w-20 h-16 bg-secondary-dark rounded-md border-2 border-transparent hover:border-accent/70 cursor-pointer transition"></div>
                        <div class="w-20 h-16 bg-secondary-dark rounded-md border-2 border-transparent hover:border-accent/70 cursor-pointer transition"></div>
                        {{-- I tako dalje za ostale snimke ekrana --}}
                    </div>
                </div>
    
                {{-- Desna strana: Detalji i Akcija --}}
                <div data-aos="fade-left">
                    <span class="text-sm uppercase tracking-wider text-accent font-semibold">Laravel & Tailwind Template</span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-text-light mt-2 mb-4">
                        DigitalyShop E-commerce Template
                    </h1>
                    
                    <p class="text-text-light/80 text-lg mb-6">
                        Potpuno funkcionalan e-commerce template, spreman za Stripe integraciju. Čist kod, optimizovan za SEO i brzinu.
                    </p>
    
                    <div class="flex items-center space-x-4 mb-8">
                        <span class="text-5xl font-extrabold text-accent">
                            $79.99
                        </span>
                        <span class="text-lg text-text-light/60 line-through">$120.00</span>
                    </div>
                    
                    {{-- Dugmad za Akciju --}}
                    <div class="space-y-4">
                        <a href="{{ route('checkout') }}" class="w-full inline-block text-center py-4 bg-accent text-primary-dark font-bold text-xl rounded-lg hover:bg-opacity-90 transition-colors shadow-lg">
                            Kupi Template <i class="fas fa-bolt ml-2"></i>
                        </a>
                        <a href="**#link_za_demo**" target="_blank" class="w-full inline-block text-center py-3 border border-secondary-dark text-text-light font-semibold rounded-lg hover:border-accent transition-colors">
                            <i class="fas fa-eye mr-2"></i> Pogledaj Probnu Verziju
                        </a>
                    </div>
    
                    <div class="mt-8 p-4 bg-secondary-dark rounded-lg text-sm text-text-light/80">
                        <p class="flex items-center mb-1"><i class="fas fa-lock text-accent mr-3"></i> Sigurno plaćanje putem Stripe-a i PayPala.</p>
                        <p class="flex items-center"><i class="fas fa-download text-accent mr-3"></i> Trenutno preuzimanje nakon kupovine.</p>
                    </div>
    
                </div>
            </section>
            
            <hr class="border-accent/30 my-10">
    
            {{-- 2. Detalji, Opis i Karakteristike --}}
            <section class="py-10">
                <h2 class="text-3xl font-bold text-text-light mb-6 border-b border-accent/50 pb-2">Detaljan Opis i Karakteristike</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-text-light/80">
                    <div class="md:col-span-2">
                        <p class="mb-4">Ovaj template predstavlja savršenu polaznu tačku za vaš digitalni biznis. Dizajniran je s mišlju o brzini i SEO optimizaciji, koristeći najnovije verzije **Laravel frameworka i Tailwind CSS-a**.</p>
                        <p class="mb-4">Uključuje sve neophodne stranice: Home, Shop, Product, Checkout, Contact. Arhitektura je čista i modularna, što čini prilagođavanje izuzetno jednostavnim.</p>
                        
                        <h3 class="text-2xl font-semibold text-accent mt-6 mb-3">Ključne Prednosti:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4 mb-6">
                            <li>Kompletni *Blade* komponente i Vue/React integracija.</li>
                            <li>Potpuna responsivnost i mobilna optimizacija.</li>
                            <li>Uključena dokumentacija za brzi *setup*.</li>
                            <li>Podrška za više jezika (i18n).</li>
                        </ul>

                        {{-- **NOVI BLOK TEKSTA SA FOKUSOM NA RAZVOJ** --}}
                        <div class="p-4 bg-secondary-dark rounded-lg border-l-4 border-accent shadow-md mt-6">
                            <p class="font-bold text-text-light mb-2">Spreman za Dalji Razvoj.</p>
                            <p class="text-sm">
                                Ovaj templejt je razvijen na stabilnim temeljima **Laravel 11 i Tailwind CSS 3**. Kod je **čist, dokumentovan i modularan**, što omogućava vama, drugom developeru, ili nama, **DigitalyTycoon** timu, lako i brzo prilagođavanje i implementaciju novih funkcionalnosti. 
                                <a href="{{ route('contact') }}" class="text-accent font-semibold hover:underline block mt-2">
                                    Imate specifične zahteve? Kontaktirajte nas za usluge prilagođavanja!
                                </a>
                            </p>
                        </div>
                        {{-- KRAJ NOVOG BLOKA --}}

                    </div>
                    
                    {{-- 3. Specifikacije (Sidebar - ostaje nepromenjen) --}}
                    <div class="bg-secondary-dark p-6 rounded-xl h-fit" data-aos="fade-up">
                        <h3 class="text-2xl font-bold text-accent mb-4">Specifikacije</h3>
                        <ul class="space-y-3 text-text-light/90">
                            <li class="flex justify-between">
                                <span class="font-semibold">Tehnologije:</span>
                                <span>Laravel 11, Tailwind CSS 3</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="font-semibold">Kompatibilnost:</span>
                                <span>PHP 8.2+</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="font-semibold">Licenca:</span>
                                <span>Standardna (1 projekat)</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="font-semibold">Datum izlaska:</span>
                                <span>05. Oktobar 2025.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <hr class="border-accent/30 my-10">
    
            {{-- 4. Srodni Proizvodi --}}
            <section class="py-10">
                <h2 class="text-3xl font-bold text-text-light mb-8">Više iz naše ponude</h2>
                
                {{-- Ovde možete ponovo koristiti vašu karticu proizvoda iz shop.blade.php --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Primer Kartice Proizvoda 1 --}}
                    @for ($i = 1; $i <= 6; $i++)
                    <div class="p-4 bg-secondary-dark rounded-xl shadow-lg transform hover:scale-[1.02] transition duration-300 group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
    
                        {{-- Slika Proizvoda (Placeholder) - DOPUNA JE OVDE --}}
                        <div class="relative overflow-hidden rounded-lg mb-4 h-48 bg-primary-dark border border-accent/20 flex items-center justify-center">
    
                            <i class="fas fa-desktop text-accent text-6xl opacity-40"></i>
                            {{-- Originalni crni hover overlay (sada nepotreban, zamenjen je sledećim linkom) --}}
                            {{-- <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition duration-300"></div> --}}
    
                            {{-- **DOPUNJENI OVERLAY/LINK ZA PROBNU VERZIJU** --}}
                            {{-- Koristite ovde Laravel varijablu za URL demo verzije: {{ $product->demo_url }} --}}
                            <a href="**#"** target="_blank" class="absolute inset-0 bg-primary-dark/90 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <i class="fas fa-eye text-accent text-3xl mb-2"></i>
                                <span class="text-text-light font-semibold text-lg">
                                    Pogledaj Probnu Verziju
                                </span>
                                <span class="text-xs text-text-light/70 mt-1">(Otvara se u novom tabu)</span>
                            </a>
                            {{-- KRAJ DOPUNE --}}
    
                        </div>
    
                        {{-- Naslov i Opis --}}
                        <h3 class="text-xl font-bold text-text-light mb-1 truncate">
                            E-commerce Template V{{ $i }}
                        </h3>
                        <p class="text-sm text-text-light/70 mb-4 h-10 overflow-hidden">
                            Kompletan Laravel/Tailwind E-commerce sajt sa čistim dizajnom.
                        </p>
    
                        {{-- Cena i Dugme --}}
                        <div class="flex justify-between items-center pt-2 border-t border-primary-dark/50">
                            <span class="text-2xl font-extrabold text-accent">
                                ${{ 39.99 + $i }}
                            </span>
                            <a href="#" class="px-4 py-2 bg-accent text-primary-dark font-semibold rounded-lg text-sm hover:bg-opacity-90 transition-colors shadow-md">
                                Kupi <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>
    
        </div>
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const projectGrid = document.getElementById('project-grid');
            const projectCards = document.querySelectorAll('.project-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Uklanja aktivni stil sa svih dugmadi
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-accent', 'text-primary-dark');
                        btn.classList.add('bg-secondary-dark', 'text-text-light');
                    });

                    // Dodaje aktivni stil kliknutom dugmetu
                    button.classList.remove('bg-secondary-dark', 'text-text-light');
                    button.classList.add('bg-accent', 'text-primary-dark');

                    const filter = button.dataset.filter;
                    let delay = 0;

                    // Privremeno skrivanje svih kartica pre ponovnog prikaza
                    projectCards.forEach(card => {
                        card.classList.remove('visible');
                    });

                    // Koristi setTimeout za glatku animaciju, ali na nivou grupe
                    setTimeout(() => {
                        projectCards.forEach(card => {
                            const category = card.dataset.category;

                            // Prikazuje kartice koje se podudaraju
                            if (filter === 'all' || category === filter) {
                                card.classList.add('visible');
                            }
                        });
                    }, 500); // Kratko kašnjenje pre prikaza nove grupe

                });
            });
        });
    </script>
</body>
</html>


