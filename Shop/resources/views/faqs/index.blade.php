<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>FAQs - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        {{-- Главни наслов странице --}}
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">Frequently Asked Questions</h1>

        <div class="bg-white p-6 md:p-8 rounded-xl shadow-md max-w-3xl mx-auto">
            {{-- Хардкодовани подаци за FAQ питања и одговоре --}}
            @php
                $faqs = [
                    [
                        'question' => 'How can I place an order?',
                        'answer' => 'Ordering is easy! Browse our products, add desired items to your cart, and proceed to checkout. Follow the simple steps to provide shipping information and choose your payment method.',
                    ],
                    [
                        'question' => 'What payment methods do you accept?',
                        'answer' => 'We currently accept payments via PayPal and Stripe. Both options provide secure and convenient ways to complete your purchase.',
                    ],
                    [
                        'question' => 'How long does shipping take?',
                        'answer' => 'Standard shipping typically takes 3-7 business days within the country. International shipping times may vary. You will receive a tracking number once your order is dispatched.',
                    ],
                    [
                        'question' => 'Can I track my order?',
                        'answer' => 'Yes, once your order has been shipped, we will send you an email with a tracking number and a link to track its journey. You can also log into your account to check your order status.',
                    ],
                    [
                        'question' => 'What is your return policy?',
                        'answer' => 'We offer a 30-day return policy for most items. If you are not satisfied with your purchase, you can return it for a full refund or exchange, provided the item is in its original condition. Please see our full Return Policy page for more details.',
                    ],
                    [
                        'question' => 'Do you offer international shipping?',
                        'answer' => 'Yes, we do! We ship to most countries worldwide. Shipping costs and delivery times for international orders will be calculated at checkout based on your location.',
                    ],
                    [
                        'question' => 'How do I contact customer support?',
                        'answer' => 'You can reach our customer support team through the "Contact Us" page on our website, or by emailing us directly at info@vesnaswebstore.com. We aim to respond to all inquiries within 24-48 hours.',
                    ],
                ];
            @endphp

            <div class="space-y-6">
                @foreach ($faqs as $faq)
                    <div class="border-b border-gray-200 pb-4 last:border-b-0">
                        <h2 class="text-xl font-semibold text-dark-gray mb-2 cursor-pointer toggle-faq flex justify-between items-center">
                            {{ $faq['question'] }}
                            <i class="fa-solid fa-chevron-down text-gray-500 text-sm transform transition-transform duration-300"></i>
                        </h2>
                        <div class="faq-answer text-gray-700 leading-relaxed hidden mt-2">
                            <p>{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <x-footer />

    {{-- Javascript za funkcionalnost otvaranja/zatvaranja FAQ pitanja --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.toggle-faq');

            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    answer.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180'); // Rotira ikonicu strelice
                });
            });
        });
    </script>
</body>
</html>