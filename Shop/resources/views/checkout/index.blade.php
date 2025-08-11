<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- KLJUČNO: CSRF TOKEN --}}
    <title>Checkout - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Proverite Font Awesome integritet - OBAVEZNO PROVERITE SA CDN-a ako se promeni verzija --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Stilovi za modal */
        .modal {
            display: none; /* Sakriveno podrazumevano */
            position: fixed; /* Ostaje na mestu */
            z-index: 1000; /* Iznad svega ostalog */
            left: 0;
            top: 0;
            width: 100%; /* Cela širina */
            height: 100%; /* Cela visina */
            overflow: auto; /* Omogući skrolovanje ako je sadržaj prevelik */
            background-color: rgba(0,0,0,0.7); /* Crna pozadina sa transparentnošću */
            justify-content: center; /* Centriraj po horizontali */
            align-items: center; /* Centriraj po vertikali */
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto; /* Auto margin za centriranje ako nije flex */
            padding: 30px;
            border-radius: 8px;
            width: 90%; /* Može biti manje na većim ekranima */
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            text-align: center;
            position: relative; /* Potrebno za pozicioniranje spinnera */
        }

        .modal-content h3 {
            font-size: 1.75rem; /* 28px */
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .modal-content p {
            font-size: 1.125rem; /* 18px */
            color: #555;
            margin-bottom: 30px;
        }

        .modal-content .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .modal-content .modal-buttons button { /* Samo button stilovi */
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .modal-content .modal-buttons .btn-confirm {
            background-color: #28a745; /* Zelena za potvrdu */
            color: white;
        }

        .modal-content .modal-buttons .btn-confirm:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .modal-content .modal-buttons .btn-cancel {
            background-color: #f44336; /* Crvena za otkazivanje */
            color: white;
        }

        .modal-content .modal-buttons .btn-cancel:hover {
            background-color: #da190b;
            transform: translateY(-2px);
        }

        /* Stil za loading spinner */
        .loading-spinner {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #333;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px; /* Centriraj i dodaj razmak */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">Checkout</h1>

        <div class="bg-white p-6 md:p-8 rounded-xl shadow-md grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-semibold text-dark-gray mb-6">Shipping Information</h2>
                <form id="checkoutForm" action="{{ route('checkout.process_order') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Lični podaci --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-gray-700 text-sm font-semibold mb-2">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="John" value="{{ old('first_name', $userData['first_name'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-gray-700 text-sm font-semibold mb-2">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="Doe" value="{{ old('last_name', $userData['last_name'] ?? '') }}" required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="john.doe@example.com" value="{{ old('email', $userData['email'] ?? '') }}" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">Phone Number (Optional)</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="+1234567890" value="{{ old('phone', $userData['phone'] ?? '') }}">
                    </div>

                    {{-- Adresa --}}
                    <h2 class="text-2xl font-semibold text-dark-gray mt-8 mb-4">Delivery Address</h2>
                    <div>
                        <label for="address" class="block text-gray-700 text-sm font-semibold mb-2">Street Address</label>
                        <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="123 Main St" value="{{ old('address', $userData['address'] ?? '') }}" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="city" class="block text-gray-700 text-sm font-semibold mb-2">City</label>
                            <input type="text" id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="Webville" value="{{ old('city', $userData['city'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-gray-700 text-sm font-semibold mb-2">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="12345" value="{{ old('postal_code', $userData['postal_code'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="country" class="block text-gray-700 text-sm font-semibold mb-2">Country</label>
                            <input type="text" id="country" name="country" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="Online Country" value="{{ old('country', $userData['country'] ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Način plaćanja --}}
                    <h2 class="text-2xl font-semibold text-dark-gray mt-8 mb-4">Payment Method</h2>
                    <div class="space-y-4">
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-light-gray transition duration-200">
                            <input type="radio" name="payment_method" value="paypal" class="form-radio text-primary-green focus:ring-primary-green" checked>
                            <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_74x46.jpg" alt="PayPal" class="ml-4 h-8">
                            <span class="ml-3 text-lg font-medium text-dark-gray">PayPal</span>
                        </label>
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-light-gray transition duration-200">
                            <input type="radio" name="payment_method" value="stripe" class="form-radio text-primary-green focus:ring-primary-green">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Stripe_Logo%2C_revised_2016.svg" alt="Stripe" class="ml-4 h-8">
                            <span class="ml-3 text-lg font-medium text-dark-gray">Stripe</span>
                        </label>
                        <div class="flex items-center ml-4 gap-2">
                            <img src="{{ asset('images/payments/Paypal.png') }}" alt="PayPal" class="h-8 max-h-8">
                            <img src="{{ asset('images/payments/Mastercard-logo.svg') }}" alt="MasterCard" class="h-8 max-h-8">
                            <img src="{{ asset('images/payments/Maestro_Logo.png') }}" alt="Maestro" class="h-8 max-h-8">
                            <img src="{{ asset('images/payments/Visa_Inc.-Logo.svg') }}" alt="Visa" class="h-8 max-h-8">
                            <img src="{{ asset('images/payments/American-Express-logo.png') }}" alt="American Express" class="h-8 max-h-8">
                            <img src="{{ asset('images/payments/discover.svg') }}" alt="Discover" class="h-8 max-h-8">
                        </div>
                    </div>

                    {{-- Dugme za završetak narudžbine --}}
                    <button type="submit" id="placeOrderBtn" class="w-full bg-primary-green text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-primary-green-dark focus:outline-none focus:ring-2 focus:ring-primary-green focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105 mt-8">
                        Place Order
                    </button>
                    {{-- Mesto za status porudžbine/greške (popunjava JS) --}}
                    <div id="formStatus" class="mt-4 text-center"></div>
                </form>
            </div>

            {{-- Rezime narudžbine (sa desne strane) --}}
            <div class="lg:col-span-1 bg-light-gray p-6 rounded-lg shadow-inner h-fit sticky top-4">
                <h2 class="text-2xl font-semibold text-dark-gray mb-4">Order Summary</h2>
                
                <div class="space-y-3 mb-6">
                    @forelse ($cartItems as $item)
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                {{-- Provera da li thumbnail_url postoji, inače fallback na placeholder --}}
                                <img src="{{ $item->product->thumbnail_url ?? 'https://picsum.photos/64/64?random=' . $item->product->id }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded-md mr-3">
                                <span class="text-gray-700 text-sm">{{ $item->product->name }} (x{{ $item->quantity }})</span>
                            </div>
                            @php
                                $displayPrice = $item->product->discount_price ?? $item->product->price;
                            @endphp
                            <span class="text-dark-gray font-medium">{{ number_format($displayPrice * $item->quantity, 2) }} USD</span>
                        </div>
                    @empty
                        <p class="text-gray-600 text-center">No Products in the Cart.</p>
                    @endforelse
                </div>

                <div class="border-t border-gray-300 pt-4 mt-4 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Subtotal:</span>
                        <span class="font-medium text-dark-gray">{{ number_format($subtotal, 2) }} USD</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700">Shipping:</span>
                        <span class="font-medium text-dark-gray">{{ number_format($shipping, 2) }} USD</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold">
                        <span class="text-dark-gray">Total:</span>
                        <span class="text-primary-green">{{ number_format($total, 2) }} USD</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer />

    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <div class="loading-spinner" id="modalSpinner"></div>
            <h3 id="modalTitle">Potvrda narudžbine</h3>
            <p id="modalMessage">Vaša narudžbina je uspešno kreirana. Molimo vas izaberite način plaćanja za nastavak.</p>
            <div class="modal-buttons">
                {{-- KLJUČNO: Sada je <button> tag --}}
                <button id="paymentActionButton" class="btn-confirm" style="display: none;">Nastavi na plaćanje</button>
                <button id="closeModalBtn" class="btn-cancel">Zatvori</button>
            </div>
        </div>
    </div>

    {{-- Glavni JavaScript kod --}}
    {{-- Glavni JavaScript kod --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dohvatanje elemenata DOM-a
            const checkoutForm = document.getElementById('checkoutForm');
            const placeOrderBtn = document.getElementById('placeOrderBtn');
            const formStatus = document.getElementById('formStatus');
            
            const paymentModal = document.getElementById('paymentModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalMessage = document.getElementById('modalMessage');
            const paymentActionButton = document.getElementById('paymentActionButton'); // Ključno: Ovo mora biti ID dugmeta u modalu
            const closeModalBtn = document.getElementById('closeModalBtn');
            const modalSpinner = document.getElementById('modalSpinner');

            // Promenljive za čuvanje URL-a i metode plaćanja koje se postavljaju kada stigne odgovor sa servera
            let currentPaymentUrl = null;
            let currentPaymentMethod = null;

            // Funkcija za prikaz modala
            function showModal(title, message, paymentUrl, method) {
                modalTitle.textContent = title;
                modalMessage.textContent = message;
                modalSpinner.style.display = 'none'; // Sakrij spinner kada se prikazuje konačna poruka

                currentPaymentUrl = paymentUrl;
                currentPaymentMethod = method;

                if (paymentUrl) {
                    // Ako postoji URL za plaćanje, prikaži dugme "Nastavi na plaćanje"
                    paymentActionButton.textContent = `Nastavi na ${method === 'paypal' ? 'PayPal' : 'Stripe'}`;
                    paymentActionButton.style.display = 'inline-flex';
                    closeModalBtn.textContent = 'Zatvori';
                } else {
                    // Ako nema URL-a (npr. greška ili COD), sakrij dugme za akciju i promeni tekst dugmeta "Zatvori"
                    paymentActionButton.style.display = 'none';
                    closeModalBtn.textContent = 'OK';
                }
                paymentModal.style.display = 'flex'; // Prikaži modal (koristi flex za centriranje)
            }

            // Funkcija za sakrivanje modala
            function hideModal() {
                paymentModal.style.display = 'none';
                // Resetovanje stanja dugmeta i spinnera kada se modal sakrije
                paymentActionButton.style.display = 'none'; 
                modalSpinner.style.display = 'none';
                currentPaymentUrl = null;
                currentPaymentMethod = null;
            }

            // Funkcija za preusmeravanje na PayPal/Stripe putem POST forme
            function initiatePaymentRedirect(url) { // Uklonjen 'method' kao argument, jer je logika ista
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                // Dodavanje CSRF tokena u formu (neophodno za Laravel POST rute)
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);

                // Submitovanje forme
                document.body.appendChild(form); // Forma mora biti u DOM-u pre submitovanja
                form.submit();
            }

            // KLJUČNO: Vezivanje event listenera za paymentActionButton SAMO JEDNOM
            // Ovaj listener će se pozvati kada korisnik klikne "Nastavi na plaćanje" u modalu
            paymentActionButton.addEventListener('click', function() {
                if (currentPaymentUrl && currentPaymentMethod) {
                    // Pre nego što preusmerimo, možemo opciono da sakrijemo dugmad i prikažemo spinner
                    paymentActionButton.style.display = 'none';
                    closeModalBtn.style.display = 'none'; // Sakrij i zatvori dugme
                    modalSpinner.style.display = 'block'; // Pokaži spinner za finalno preusmeravanje
                    modalMessage.textContent = `Preusmeravam vas na ${currentPaymentMethod === 'paypal' ? 'PayPal' : 'Stripe'}...`;
                    
                    // Pozovi funkciju za preusmeravanje sa URL-om
                    initiatePaymentRedirect(currentPaymentUrl); 
                } else {
                    console.error('Nema URL-a za plaćanje za preusmeravanje.');
                    alert('Došlo je do greške u pripremi plaćanja. Molimo pokušajte ponovo.');
                    hideModal(); // Zatvori modal u slučaju greške
                }
            });


            // Listener za zatvaranje modala dugmetom "Zatvori" / "OK"
            closeModalBtn.addEventListener('click', hideModal);

            // Listener za zatvaranje modala klikom van sadržaja (overlay)
            paymentModal.addEventListener('click', function(event) {
                // Ako je korisnik kliknuo direktno na pozadinu modala (ne na modal-content)
                if (event.target === paymentModal) {
                    hideModal();
                }
            });

            // Glavni Event Listener za submit Checkout forme
            checkoutForm.addEventListener('submit', function (e) {
                e.preventDefault(); // Sprečava standardno slanje forme (koje bi osvežilo stranicu)

                // Resetovanje statusa poruka i UI elemenata
                formStatus.innerHTML = '';
                placeOrderBtn.disabled = true;
                placeOrderBtn.textContent = 'Obrađujem...';
                
                // Prikaži modal sa inicijalnom porukom i spinnerom dok se čeka odgovor sa servera
                modalSpinner.style.display = 'block'; 
                showModal('Obrađujem narudžbinu...', 'Molimo sačekajte dok obrađujemo vašu narudžbinu i pripremamo plaćanje...', null, null);

                const formData = new FormData(checkoutForm);

                // Slanje forme putem Fetch API-ja (AJAX)
                fetch(checkoutForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json', // Očekujemo JSON odgovor od servera
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : ''
                    }
                })
                .then(response => {
                    // Provera da li je HTTP odgovor uspešan (status 2xx)
                    if (!response.ok) {
                        // Ako nije uspešan, pokušavamo da parsiramo grešku kao JSON
                        return response.json().then(errorData => {
                            throw new Error(errorData.message || 'Greška prilikom obrade zahteva.');
                        }).catch(() => {
                            // Ako JSON parsiranje ne uspe (npr. server je vratio HTML grešku), dohvatimo tekst
                            return response.text().then(text => {
                                throw new Error(`Server Error: ${response.status} - ${text.substring(0, 200)}...`);
                            });
                        });
                    }
                    return response.json(); // Parsiramo uspešan odgovor kao JSON
                })
                .then(data => {
                    // Obrada uspešnog odgovora sa servera (kada je data.success === true)
                    if (data.success) {
                        let paymentUrl;
                        let paymentMethodName;
                        
                        if (data.payment_method === 'paypal') {
                            paymentUrl = data.paypal_url;
                            paymentMethodName = 'PayPal';
                        } else if (data.payment_method === 'stripe') {
                            paymentUrl = data.stripe_url;
                            paymentMethodName = 'Stripe';
                        } else {
                            // Za Cash on Delivery ili druge offline metode
                            // Nema eksternog preusmeravanja, odmah prikaži "OK" i preusmeri na npr. /order-confirmed
                            showModal(
                                'Narudžbina uspešno kreirana!',
                                `Vaša narudžbina #${data.order_id} je uspešno kreirana. Bićete uskoro preusmereni.`,
                                null, // Nema URL-a za plaćanje
                                data.payment_method
                            );
                            // Automatsko preusmeravanje nakon kratkog kašnjenja za COD
                            setTimeout(() => {
                                window.location.href = '/order-confirmed?order_id=' + data.order_id; // Prilagodite ovu rutu
                            }, 2000); // 2 sekunde
                            formStatus.innerHTML = `<p class="text-green-500">${data.message}</p>`;
                            return; // Završi izvršavanje funkcije
                        }

                        // Prikaži modal sa opcijom za nastavak na plaćanje (za PayPal i Stripe)
                        showModal( 
                            'Narudžbina uspešno kreirana!',
                            `Vaša narudžbina #${data.order_id} je uspešno kreirana. Kliknite ispod da nastavite sa plaćanjem putem ${paymentMethodName}.`,
                            paymentUrl,
                            data.payment_method
                        );
                        formStatus.innerHTML = `<p class="text-green-500">${data.message}</p>`;

                    } else {
                        // Obrada greške prijavljene od strane servera (kada je data.success === false u JSON-u)
                        showModal('Greška!', data.message || 'Došlo je do nepoznate greške prilikom kreiranja narudžbine.', null, null);
                        formStatus.innerHTML = `<p class="text-red-500">${data.message || 'Došlo je do greške.'}</p>`;
                    }
                })
                .catch(error => {
                    // Hvatanje i prikazivanje grešaka koje se javljaju tokom Fetch poziva (mrežne greške, validacija 422)
                    console.error('Došlo je do greške prilikom slanja forme:', error);
                    let errorMessage = 'Došlo je do greške prilikom slanja forme. Molimo pokušajte ponovo.';
                    try {
                        // Pokušaj parsiranja greške, posebno za validacione greške (status 422)
                        const errorMatch = error.message.match(/\{.*\}/s); // Regex za hvatanje JSON objekta
                        if (errorMatch && errorMatch[0]) {
                             const errorResponse = JSON.parse(errorMatch[0]);
                             if (errorResponse.errors) {
                                 errorMessage = 'Molimo popunite sva obavezna polja:<br>';
                                 for (const key in errorResponse.errors) {
                                     errorMessage += `- ${errorResponse.errors[key][0]}<br>`;
                                 }
                             } else {
                                 errorMessage = errorResponse.message || error.message;
                             }
                        } else {
                           errorMessage = error.message;
                        }
                    } catch (e) {
                        errorMessage = error.message; // U slučaju problema sa parsiranjem, koristimo originalnu poruku
                    }
                    showModal('Greška!', errorMessage, null, null);
                    formStatus.innerHTML = `<p class="text-red-500">${errorMessage}</p>`;
                })
                .finally(() => {
                    // Vraćanje dugmeta "Place Order" u početno stanje bez obzira na ishod
                    placeOrderBtn.disabled = false;
                    placeOrderBtn.textContent = 'Place Order';
                    // Spinner u modalu se isključuje u `showModal` funkciji, ali ova linija je dodatna sigurnost
                    // modalSpinner.style.display = 'none'; 
                });
            });
        });
    </script>
</body>
</html>