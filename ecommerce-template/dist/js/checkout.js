// Sample cart data (This should ideally come from local storage or a backend)
        const sampleCartItems = [
            { id: 1, name: 'Cotton T-Shirt', price: 29.99, quantity: 1 },
            { id: 2, name: 'Denim Jeans', price: 69.50, quantity: 2 },
            { id: 3, name: 'Leather Boots', price: 120.00, quantity: 1 }
        ];

        function calculateTotals() {
            let subtotal = 0;
            sampleCartItems.forEach(item => {
                subtotal += item.price * item.quantity;
            });
            const shippingCost = 5.00;
            const total = subtotal + shippingCost;
            
            document.getElementById('subtotal-price').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('total-price').textContent = `$${total.toFixed(2)}`;
        }

        // Handle form submission
        const checkoutForm = document.getElementById('checkout-form');
        const messageBox = document.getElementById('messageBox');

        checkoutForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Simple form validation
            const formInputs = checkoutForm.querySelectorAll('input, textarea');
            let allFieldsValid = true;
            formInputs.forEach(input => {
                if (!input.checkValidity()) {
                    allFieldsValid = false;
                }
            });

            if (!allFieldsValid) {
                showMessage('Please fill in all required fields.', 'bg-red-500');
                return;
            }

            // Simulate order placement
            setTimeout(() => {
                showMessage('Thank you for your order! Your payment has been processed.', 'bg-green-500');
                checkoutForm.reset();
            }, 1500);
        });

        function showMessage(text, className) {
            messageBox.textContent = text;
            messageBox.className = `mt-4 p-4 rounded-lg text-center font-semibold transition-all duration-300 ${className}`;
            messageBox.style.display = 'block';

            // Hide the message after 5 seconds
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 5000);
        }

        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('header button[aria-label="Open menu"]');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Initial calculations
        document.addEventListener('DOMContentLoaded', calculateTotals);
    