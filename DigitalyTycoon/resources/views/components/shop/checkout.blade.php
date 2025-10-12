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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/modal.js', 'resources/js/spinner.js'])
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

    <main class="py-16 md:py-24 bg-primary-dark">
        <div class="container mx-auto px-6 max-w-6xl">
    
            <h1 class="text-4xl ...">Završi Kupovinu: {{ $product->getTranslation('name', app()->getLocale()) }}</h1>

            <span class="text-3xl font-extrabold text-accent">
                ${{ $product->discount_price ?? $product->price }}
            </span>

    
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
    
                {{-- Leva Kolona: Forma za Plaćanje (Glavna sekcija) --}}
                <div class="lg:col-span-2 p-8 bg-secondary-dark rounded-xl shadow-2xl" data-aos="fade-right">
                    
                    {{-- Korak 1: Podaci za Izdavanje Računa / Email --}}
                    <h2 class="text-2xl font-bold text-accent mb-6 border-b border-accent/30 pb-3">1. Vaši Podaci</h2>
                    <form action="{{ route('checkout.store', $product) }}" method="POST">
                        @csrf
                        {{-- Hidden input za product_id --}}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="customer_name" class="block text-text-light/80 mb-2">Ime i Prezime</label>
                                <input type="text" name="customer_name" id="customer_name" class="w-full p-3 rounded-lg bg-primary-dark text-text-light border border-primary-dark focus:border-accent focus:ring focus:ring-accent/50 transition" required>
                            </div>
                            <div>
                                <label for="customer_email" class="block text-text-light/80 mb-2">Email Adresa (Za isporuku)</label>
                                <input type="email" name="customer_email" id="customer_email" class="w-full p-3 rounded-lg bg-primary-dark text-text-light border border-primary-dark focus:border-accent focus:ring focus:ring-accent/50 transition" required>
                            </div>
                        </div>
    
                        {{-- Korak 2: Izbor Načina Plaćanja i Sigurnost --}}
                        <h2 class="text-2xl font-bold text-accent mb-6 border-b border-accent/30 pb-3 mt-10">2. Plaćanje</h2>

                        <div class="mb-6 p-4 bg-primary-dark rounded-lg border border-accent/50">
                            <p class="text-sm text-text-light/80">
                                Plaćanje se vrši preko dva najsigurnija svetska servisa: **Stripe** (za kartice) ili **PayPal**. 
                                
                                <span class="font-bold text-accent">Vaša sigurnost je zagarantovana:</span> Naš sajt **ne čuva, niti obrađuje** bilo kakve podatke o Vašoj kreditnoj kartici. Sve transakcije se obavljaju direktno na serverima Stripe-a ili PayPal-a.
                            </p>
                        </div>
                        {{-- Simulacija Stripe Kartice/Elementa (Ovo ostaje jer je to deo forme) --}}
                        <div class="p-5 bg-primary-dark rounded-lg border border-accent/30">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-text-light font-semibold">Plaćanje Karticom</span>
                                <div class="flex space-x-2 text-xl text-text-light/70">
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                    <i class="fab fa-cc-amex"></i>
                                </div>
                            </div>
                            
                            {{-- OVO BI BILA STVARNA LOKACIJA STRIPE ELEMENTA --}}
                            <div id="card-element" class="p-4 h-24 bg-secondary-dark rounded-lg flex items-center justify-center border border-secondary-dark/50">
                                <p class="text-text-light/60 italic">
                                    [Ovaj prostor popunjava Stripe Checkout element]
                                </p>
                            </div>
                            {{-- KRAJ SIMULACIJE --}}
                        </div>
    
                        {{-- Ispod "Uslovi Korišćenja" --}}
                        <div class="mt-8">
                            <label class="flex items-start text-text-light/80 text-sm">
                                <input type="checkbox" id="terms_accept" class="form-checkbox text-accent bg-primary-dark border-secondary-dark rounded mt-1" required>
                                <span class="ml-3">
                                    Slažem se sa <a href="#" class="text-accent hover:underline">Uslovima korišćenja</a> i <a href="#" class="text-accent hover:underline">Politikom privatnosti</a>.
                                </span>
                            </label>
                        </div>
    
                        {{-- Dugme za submit --}}
                        <button  id="open-payment-modal" type="submit" class="w-full mt-8 py-4 bg-accent text-primary-dark font-bold text-xl rounded-lg hover:bg-opacity-90 transition-colors shadow-xl"> 
                            <i class="fas fa-lock ml-2"></i>
                            <span id="btn-text">Plati i Preuzmi (${{ $product->discount_price ?? $product->price }})</span>
                            <svg id="btn-spinner" class="hidden animate-spin h-5 w-5 text-white ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>
                        </button>

    
                    </form>
    
                </div>
    
                {{-- Desna Kolona: Pregled Narudžbine (Sidebar) --}}
                <aside class="p-6 bg-secondary-dark rounded-xl h-fit border border-accent/30" data-aos="fade-left" data-aos-delay="200">
                    <h2 class="text-2xl font-bold text-text-light mb-6 border-b border-primary-dark/50 pb-3">Pregled Narudžbine</h2>

                    {{-- Proizvod u Korpi --}}
                    <div class="flex items-start justify-between pb-4 border-b border-primary-dark/50 mb-4">
                        <div class="flex-1 mr-4">
                            <p class="text-lg font-semibold text-text-light">
                                {{ $product->getTranslation('name', app()->getLocale()) }}
                            </p>
                            <p class="text-sm text-text-light/70">
                                Licenca: Standardna
                            </p>
                        </div>
                        <span class="text-lg font-bold text-text-light">
                            ${{ number_format($product->discount_price ?? $product->price, 2) }}
                        </span>
                    </div>

                    {{-- Ukupno --}}
                    <div class="space-y-3 pt-2">
                        <div class="flex justify-between text-text-light/90">
                            <span>Cena proizvoda:</span>
                            <span>${{ number_format($product->price, 2) }}</span>
                        </div>

                        @if($product->discount_price)
                            <div class="flex justify-between text-text-light/90">
                                <span>Popust:</span>
                                <span class="text-green-400">- ${{ number_format($product->price - $product->discount_price, 2) }}</span>
                            </div>
                        @endif

                        <div class="flex justify-between text-text-light/90">
                            <span>Porez (0%):</span>
                            <span>$0.00</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center pt-4 mt-4 border-t border-accent/50">
                        <span class="text-xl font-bold text-accent">Ukupno za Plaćanje:</span>
                        <span class="text-3xl font-extrabold text-accent">
                            ${{ number_format($product->discount_price ?? $product->price, 2) }}
                        </span>
                    </div>
                </aside>

    
            </div>
        </div>
    </main>

    <x-footer />

    
    <!-- Modal background -->
    <div id="payment-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div id="modal-content" class="bg-secondary-dark rounded-xl shadow-2xl w-full max-w-sm border border-accent/30 transform scale-90 opacity-0 transition-all duration-300">
            
            <div class="p-5 border-b border-primary-dark flex items-center justify-between">
                <h2 id="modal-title" class="text-xl font-bold text-accent">
                    Izaberite način plaćanja
                </h2>
                <button 
                    id="close-modal-x" 
                    aria-label="Zatvori"
                    class="text-text-light/70 hover:text-accent transition-colors text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="p-6 space-y-4">
                
                {{-- Stripe Forma --}}
                <form action="{{ route('stripe.process') }}" method="POST">
                    @csrf
                    {{-- Opciono: Dodavanje polja za ime i email ovde kao skrivena polja, 
                        AKO se popunjavaju JavaScriptom pre nego što se modal otvori. --}}
                    
                    <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold text-lg rounded-lg transition-colors shadow-lg flex items-center justify-center border-b-4 border-indigo-800">
                        <i class="fab fa-cc-stripe text-2xl mr-3"></i> Plati putem Stripe-a
                    </button>
                </form>

                {{-- PayPal Forma --}}
                <form action="{{ route('paypal.process') }}" method="POST">
                    @csrf
                    {{-- Opciono: Dodavanje polja za ime i email ovde kao skrivena polja. --}}
                    
                    <button type="submit" class="w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-primary-dark font-extrabold text-lg rounded-lg transition-colors shadow-lg flex items-center justify-center border-b-4 border-yellow-700">
                        <i class="fab fa-paypal text-2xl mr-3"></i> Plati putem PayPal-a
                    </button>
                </form>
            </div>

            <div class="p-4 border-t border-primary-dark">
                <button 
                    id="close-payment-modal" 
                    class="w-full py-2 text-text-light/70 hover:text-accent font-semibold transition">
                    <i class="fas fa-times mr-2"></i> Otkaži
                </button>
            </div>
        </div>
    </div>


    @if (session('open_payment_modal'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('payment-modal');
            const modalContent = document.getElementById('modal-content');
            const closeBtnBottom = document.getElementById('close-payment-modal'); // Vaše dugme "Otkaži"
            const closeBtnTop = document.getElementById('close-modal-x'); // Novo "X" dugme
            const body = document.body;
            const transitionDuration = 300; // Podudara se sa CSS-om

            // --- FUNKCIJA ZA ZATVARANJE ---
            const closeModal = () => {
                modal.classList.remove('opacity-100');
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-90', 'opacity-0');
                
                setTimeout(() => {
                    modal.classList.add('hidden');
                    body.style.overflow = 'auto'; // Vraća skrolovanje
                }, transitionDuration);
            };

            // 1. Logika za automatsko otvaranje (Vaša logika)
            modal.classList.remove('hidden');
            // Dodajemo flex klasu da bismo osigurali centriranje pre animacije
            modal.classList.add('flex'); 

            setTimeout(() => {
                modal.classList.add('opacity-100');
                modalContent.classList.remove('scale-90', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
                body.style.overflow = 'hidden';
            }, 10);
            
            // 2. Event Listeneri za zatvaranje
            closeBtnBottom.addEventListener('click', closeModal);
            closeBtnTop.addEventListener('click', closeModal);

            // 3. Zatvaranje klikom na pozadinu (Overlay)
            modal.addEventListener('click', (e) => {
                // Proverava da li je kliknuto direktno na roditeljski modal div
                if (e.target.id === 'payment-modal') {
                    closeModal();
                }
            });

            // 4. Zatvaranje pritiskom na ESC taster
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
@endif



</body>
</html>
