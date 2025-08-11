<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refund Policy - Vesna's Web Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmPXeMyE/P+x7x0HwGgqa66bU8m2gS0QzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-light-gray font-sans">
    <x-header />

    <main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-4xl font-bold text-dark-gray mb-8 text-center">Refund Policy</h1>

        <div class="bg-white p-6 md:p-8 rounded-xl shadow-md text-gray-700 leading-relaxed">
            <h2 class="text-2xl font-semibold text-dark-gray mb-4">Our Commitment to Your Satisfaction</h2>
            <p class="mb-4">
                At Vesna's Web Store, we strive to ensure your complete satisfaction with every purchase. If you are not entirely satisfied with your order, we're here to help.
            </p>

            <h3 class="text-xl font-semibold text-dark-gray mb-3">1. Eligibility for a Refund</h3>
            <ul class="list-disc list-inside mb-4 space-y-1">
                <li>Products must be returned within **30 days** of the purchase date.</li>
                <li>Products must be unused, in their original packaging, and in the same condition that you received them.</li>
                <li>Proof of purchase (order number or receipt) is required.</li>
                <li>Certain items are exempt from being returned, such as perishable goods, custom products, and digital downloads.</li>
            </ul>

            <h3 class="text-xl font-semibold text-dark-gray mb-3">2. How to Request a Refund</h3>
            <ol class="list-decimal list-inside mb-4 space-y-1">
                <li>Log in to your dashboard and navigate to "My Orders".</li>
                <li>Locate the order you wish to return and click on the "Request Refund" button (available for eligible, delivered orders).</li>
                <li>Fill out the refund request form, providing the reason for your return and any necessary details.</li>
                <li>Our team will review your request and contact you within 3-5 business days with further instructions.</li>
            </ol>

            <h3 class="text-xl font-semibold text-dark-gray mb-3">3. Refund Process</h3>
            <p class="mb-4">
                Once your return is received and inspected, we will send you an email to notify you that we have received your returned item. We will also notify you of the approval or rejection of your refund. If approved, your refund will be processed, and a credit will automatically be applied to your original method of payment within **7-10 business days**.
            </p>

            <h3 class="text-xl font-semibold text-dark-gray mb-3">4. Shipping Costs</h3>
            <p class="mb-4">
                You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable. If you receive a refund, the cost of return shipping will be deducted from your refund.
            </p>

            <h3 class="text-xl font-semibold text-dark-gray mb-3">5. Exchanges</h3>
            <p class="mb-4">
                If you need to exchange an item, please contact our customer support team to arrange this.
            </p>

            <p class="text-sm text-gray-500 mt-6">
                For any questions regarding our Refund Policy, please contact us at <a href="mailto:support@vesnaswebstore.com" class="underline hover:text-primary-green">support@vesnaswebstore.com</a>.
            </p>
        </div>
    </main>

    <x-footer />
</body>
</html>