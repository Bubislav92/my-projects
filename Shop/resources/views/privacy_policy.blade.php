<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Наслов странице --}}
    <title>Privacy Policy - Vesna's Web Store</title>

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
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">Privacy Policy</h1>

        <div class="bg-white p-6 md:p-8 rounded-xl shadow-md text-gray-700 leading-relaxed">
            <p class="mb-4">
                This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from Vesna's Web Store (the "Site").
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">1. Personal Information We Collect</h2>
            <p class="mb-4">
                When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically-collected information as "Device Information."
            </p>
            <p class="mb-4">
                We collect Device Information using the following technologies:
            </p>
            <ul class="list-disc list-inside mb-4 space-y-1">
                <li>**Cookies:** Data files that are placed on your device or computer and often include an anonymous unique identifier.</li>
                <li>**Log files:** Track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.</li>
                <li>**Web beacons, tags, and pixels:** Electronic files used to record information about how you browse the Site.</li>
            </ul>
            <p class="mb-4">
                Additionally, when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers, PayPal details, etc.), email address, and phone number. We refer to this information as "Order Information."
            </p>
            <p class="mb-4">
                When we talk about "Personal Information" in this Privacy Policy, we are talking both about Device Information and Order Information.
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">2. How We Use Your Personal Information</h2>
            <p class="mb-4">
                We use the Order Information that we collect generally to fulfill any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations). Additionally, we use this Order Information to:
            </p>
            <ul class="list-disc list-inside mb-4 space-y-1">
                <li>Communicate with you;</li>
                <li>Screen our orders for potential risk or fraud; and</li>
                <li>When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</li>
            </ul>
            <p class="mb-4">
                We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">3. Sharing Your Personal Information</h2>
            <p class="mb-4">
                We share your Personal Information with third parties to help us use your Personal Information, as described above. For example, we use Google Analytics to help us understand how our customers use the Site--you can read more about how Google uses your Personal Information here: <a href="https://www.google.com/intl/en/policies/privacy/" target="_blank" class="underline hover:text-primary-green">https://www.google.com/intl/en/policies/privacy/</a>. You can also opt-out of Google Analytics here: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" class="underline hover:text-primary-green">https://tools.google.com/dlpage/gaoptout</a>.
            </p>
            <p class="mb-4">
                Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to otherwise protect our rights.
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">4. Your Rights</h2>
            <p class="mb-4">
                If you are a European resident, you have the right to access personal information we hold about you and to ask that your personal information be corrected, updated, or deleted. If you would like to exercise this right, please contact us through the contact information below.
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">5. Data Retention</h2>
            <p class="mb-4">
                When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">6. Changes</h2>
            <p class="mb-4">
                We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.
            </p>

            <h2 class="text-2xl font-semibold text-dark-gray mb-4">7. Contact Us</h2>
            <p class="mb-4">
                For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us by e-mail at <a href="mailto:info@vesnaswebstore.com" class="underline hover:text-primary-green">info@vesnaswebstore.com</a>.
            </p>

            <p class="text-sm text-gray-500 mt-6">
                Last updated: July 7, 2025
            </p>
        </div>
    </main>

    <x-footer />
</body>
</html>