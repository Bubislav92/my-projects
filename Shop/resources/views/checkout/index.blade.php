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
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">{{ __('checkout_translate.checkout_page') }}</h1>

        <div class="bg-white p-6 md:p-8 rounded-xl shadow-md grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-semibold text-dark-gray mb-6">{{ __('checkout_translate.shipping_information') }}</h2>
                <form id="checkoutForm" action="{{ route('checkout.process_order') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Lični podaci --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.first_name') }}</label>
                            <input type="text" id="first_name" name="first_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="John" value="{{ old('first_name', $userData['first_name'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.last_name') }}</label>
                            <input type="text" id="last_name" name="last_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="Doe" value="{{ old('last_name', $userData['last_name'] ?? '') }}" required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.email_address') }}</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="john.doe@example.com" value="{{ old('email', $userData['email'] ?? '') }}" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.phone_number') }}</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="+1234567890" value="{{ old('phone', $userData['phone'] ?? '') }}">
                    </div>

                    {{-- Adresa --}}
                    <h2 class="text-2xl font-semibold text-dark-gray mt-8 mb-4">{{ __('checkout_translate.delivery_address') }}</h2>
                    <div>
                        <label for="address" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.street_address') }}</label>
                        <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="123 Main St" value="{{ old('address', $userData['address'] ?? '') }}" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="city" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.city') }}</label>
                            <input type="text" id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="Webville" value="{{ old('city', $userData['city'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.postal_code') }}</label>
                            <input type="text" id="postal_code" name="postal_code" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="12345" value="{{ old('postal_code', $userData['postal_code'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="country" class="block text-gray-700 text-sm font-semibold mb-2">{{ __('checkout_translate.country') }}</label>
                            <input type="text" id="country" name="country" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-200" placeholder="Online Country" value="{{ old('country', $userData['country'] ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Način plaćanja --}}
                    <h2 class="text-2xl font-semibold text-dark-gray mt-8 mb-4">{{ __('checkout_translate.payment_method') }}</h2>
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
                        {{ __('checkout_translate.place_order') }}
                    </button>
                    {{-- Mesto za status porudžbine/greške (popunjava JS) --}}
                    <div id="formStatus" class="mt-4 text-center"></div>
                </form>
            </div>

            {{-- Rezime narudžbine (sa desne strane) --}}
            <div class="lg:col-span-1 bg-light-gray p-6 rounded-lg shadow-inner h-fit sticky top-4">
                <h2 class="text-2xl font-semibold text-dark-gray mb-4">{{ __('checkout_translate.order_summary') }}</h2>
                
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
                        <p class="text-gray-600 text-center">{{ __('checkout_translate.no_products_in_cart') }}</p>
                    @endforelse
                </div>

                <div class="border-t border-gray-300 pt-4 mt-4 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-700">{{ __('checkout_translate.subtotal') }}</span>
                        <span class="font-medium text-dark-gray">{{ number_format($subtotal, 2) }} USD</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700">{{ __('checkout_translate.shipping') }}</span>
                        <span class="font-medium text-dark-gray">{{ number_format($shipping, 2) }} USD</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold">
                        <span class="text-dark-gray">{{ __('checkout_translate.total') }}</span>
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
            <h3 id="modalTitle">{{ __('checkout_translate.order_confirmation') }}</h3>
            <p id="modalMessage">{{ __('checkout_translate.order_created_select_payment') }}</p>
            <div class="modal-buttons">
                {{-- KLJUČNO: Sada je <button> tag --}}
                <button id="paymentActionButton" class="btn-confirm" style="display: none;">{{ __('checkout_translate.continue_to_payment') }}</button>
                <button id="closeModalBtn" class="btn-cancel">{{ __('checkout_translate.close') }}</button>
            </div>
        </div>
    </div>

    {{-- Glavni JavaScript kod --}}
    {{-- Glavni JavaScript kod --}}
    {{-- Glavni JavaScript kod sa prevodima --}}
<script>
    // Inicijalizacija JavaScript objekta sa prevodima
    // Ovo se izvršava na serveru i prevodi se ubrizgavaju u HTML pre nego što se pošalje klijentu
    window.translations = {
        checkout: {
            continue_to: '{{ __("checkout_translate.continue_to") }}',
            close: '{{ __("checkout_translate.close") }}',
            ok: 'OK', 
            redirecting_to: '{{ __("checkout_translate.redirecting_to") }}',
            no_payment_url: '{{ __("checkout_translate.no_payment_url") }}',
            payment_prep_error: '{{ __("checkout_translate.payment_prep_error") }}',
            processing: '{{ __("checkout_translate.processing") }}',
            processing_order: '{{ __("checkout_translate.processing_order") }}',
            please_wait_processing: '{{ __("checkout_translate.please_wait_processing") }}',
            processing_error: '{{ __("checkout_translate.processing_error") }}',
            order_created_success: '{{ __("checkout_translate.order_created_success") }}',
            your_order: '{{ __("checkout_translate.your_order") }}',
            order_created_redirect: '{{ __("checkout_translate.order_created_redirect") }}',
            order_created_success_click: '{{ __("checkout_translate.order_created_success_click") }}',
            your_order_click: '{{ __("checkout_translate.your_order_click") }}',
            order_created_continue: '{{ __("checkout_translate.order_created_continue") }}',
            error: '{{ __("checkout_translate.error") }}',
            unknown_error: '{{ __("checkout_translate.unknown_error") }}',
            an_error_occurred: '{{ __("checkout_translate.an_error_occurred") }}',
            form_submission_error: '{{ __("checkout_translate.form_submission_error") }}',
            form_submission_error_retry: '{{ __("checkout_translate.form_submission_error_retry") }}',
            fill_all_fields: '{{ __("checkout_translate.fill_all_fields") }}',
            place_order_button: '{{ __("checkout_translate.place_order_button") }}',
        }
    };
    
    document.addEventListener('DOMContentLoaded', function () {
        // Dohvatanje elemenata DOM-a
        const checkoutForm = document.getElementById('checkoutForm');
        const placeOrderBtn = document.getElementById('placeOrderBtn');
        const formStatus = document.getElementById('formStatus');
        
        const paymentModal = document.getElementById('paymentModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');
        const paymentActionButton = document.getElementById('paymentActionButton');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalSpinner = document.getElementById('modalSpinner');

        // Promenljive za čuvanje URL-a i metode plaćanja
        let currentPaymentUrl = null;
        let currentPaymentMethod = null;

        // Funkcija za prikaz modala
        function showModal(title, message, paymentUrl, method) {
            modalTitle.textContent = title;
            modalMessage.textContent = message;
            modalSpinner.style.display = 'none';

            currentPaymentUrl = paymentUrl;
            currentPaymentMethod = method;

            if (paymentUrl) {
                // Ako postoji URL, prikaži dugme "Nastavi na..."
                const methodText = method === 'paypal' ? 'PayPal' : 'Stripe';
                paymentActionButton.textContent = `${window.translations.checkout.continue_to} ${methodText}`;
                paymentActionButton.style.display = 'inline-flex';
                closeModalBtn.textContent = window.translations.checkout.close;
            } else {
                // Ako nema URL-a, sakrij dugme za akciju i promeni tekst dugmeta "Zatvori"
                paymentActionButton.style.display = 'none';
                closeModalBtn.textContent = window.translations.checkout.close;
            }
            paymentModal.style.display = 'flex';
        }

        // Funkcija za sakrivanje modala
        function hideModal() {
            paymentModal.style.display = 'none';
            paymentActionButton.style.display = 'none';
            modalSpinner.style.display = 'none';
            currentPaymentUrl = null;
            currentPaymentMethod = null;
        }

        // Funkcija za preusmeravanje na PayPal/Stripe putem POST forme
        function initiatePaymentRedirect(url) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);
            document.body.appendChild(form);
            form.submit();
        }

        // Listener za dugme "Nastavi na plaćanje" u modalu
        paymentActionButton.addEventListener('click', function() {
            if (currentPaymentUrl && currentPaymentMethod) {
                paymentActionButton.style.display = 'none';
                closeModalBtn.style.display = 'none';
                modalSpinner.style.display = 'block';
                const methodText = currentPaymentMethod === 'paypal' ? 'PayPal' : 'Stripe';
                modalMessage.textContent = `${window.translations.checkout.redirecting_to} ${methodText}...`;
                
                initiatePaymentRedirect(currentPaymentUrl); 
            } else {
                console.error(window.translations.checkout.no_payment_url);
                alert(window.translations.checkout.payment_prep_error);
                hideModal();
            }
        });

        // Listener za zatvaranje modala
        closeModalBtn.addEventListener('click', hideModal);

        // Listener za zatvaranje modala klikom na pozadinu
        paymentModal.addEventListener('click', function(event) {
            if (event.target === paymentModal) {
                hideModal();
            }
        });

        // Glavni Event Listener za submit Checkout forme
        checkoutForm.addEventListener('submit', function (e) {
            e.preventDefault();

            formStatus.innerHTML = '';
            placeOrderBtn.disabled = true;
            placeOrderBtn.textContent = window.translations.checkout.processing;
            
            modalSpinner.style.display = 'block'; 
            showModal(window.translations.checkout.processing_order, window.translations.checkout.please_wait_processing, null, null);

            const formData = new FormData(checkoutForm);

            fetch(checkoutForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : ''
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || window.translations.checkout.processing_error);
                    }).catch(() => {
                        return response.text().then(text => {
                            throw new Error(`Server Error: ${response.status} - ${text.substring(0, 200)}...`);
                        });
                    });
                }
                return response.json();
            })
            .then(data => {
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
                        // COD i slične metode
                        showModal(
                            window.translations.checkout.order_created_success,
                            `${window.translations.checkout.your_order} #${data.order_id} ${window.translations.checkout.order_created_redirect}`,
                            null,
                            data.payment_method
                        );
                        setTimeout(() => {
                            window.location.href = '/order-confirmed?order_id=' + data.order_id;
                        }, 2000);
                        formStatus.innerHTML = `<p class="text-green-500">${data.message}</p>`;
                        return;
                    }

                    // Prikaz modala za nastavak na plaćanje
                    showModal( 
                        window.translations.checkout.order_created_success_click,
                        `${window.translations.checkout.your_order_click} #${data.order_id} ${window.translations.checkout.order_created_continue} ${paymentMethodName}.`,
                        paymentUrl,
                        data.payment_method
                    );
                    formStatus.innerHTML = `<p class="text-green-500">${data.message}</p>`;

                } else {
                    // Greška sa servera
                    showModal(window.translations.checkout.error, data.message || window.translations.checkout.unknown_error, null, null);
                    formStatus.innerHTML = `<p class="text-red-500">${data.message || window.translations.checkout.an_error_occurred}</p>`;
                }
            })
            .catch(error => {
                // Hvatanje mrežnih i validacionih grešaka
                console.error(`${window.translations.checkout.form_submission_error}`, error);
                let errorMessage = window.translations.checkout.form_submission_error_retry;
                try {
                    const errorMatch = error.message.match(/\{.*\}/s);
                    if (errorMatch && errorMatch[0]) {
                         const errorResponse = JSON.parse(errorMatch[0]);
                         if (errorResponse.errors) {
                             errorMessage = `${window.translations.checkout.fill_all_fields}<br>`;
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
                    errorMessage = error.message;
                }
                showModal(window.translations.checkout.error, errorMessage, null, null);
                formStatus.innerHTML = `<p class="text-red-500">${errorMessage}</p>`;
            })
            .finally(() => {
                // Vraćanje dugmeta u početno stanje
                placeOrderBtn.disabled = false;
                placeOrderBtn.textContent = window.translations.checkout.place_order_button;
            });
        });
    });
</script>
</body>
</html>