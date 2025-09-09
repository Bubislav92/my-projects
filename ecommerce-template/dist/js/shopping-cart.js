   // Sample cart data
        let cartItems = [
            { id: 1, name: 'Cotton T-Shirt', price: 29.99, quantity: 1, image: 'https://placehold.co/100x100/f3f4f6/6b7280?text=T-Shirt' },
            { id: 2, name: 'Denim Jeans', price: 69.50, quantity: 2, image: 'https://placehold.co/100x100/f3f4f6/6b7280?text=Jeans' },
            { id: 3, name: 'Leather Boots', price: 120.00, quantity: 1, image: 'https://placehold.co/100x100/f3f4f6/6b7280?text=Boots' }
        ];

        const cartItemsContainer = document.getElementById('cart-items-container');
        const emptyCartMessage = document.getElementById('empty-cart-message');
        const subtotalPriceEl = document.getElementById('subtotal-price');
        const totalPriceEl = document.getElementById('total-price');
        const cartCountEl = document.getElementById('cart-count');

        function renderCart() {
            cartItemsContainer.innerHTML = '';
            if (cartItems.length === 0) {
                emptyCartMessage.classList.remove('hidden');
                cartCountEl.textContent = 0;
            } else {
                emptyCartMessage.classList.add('hidden');
                cartCountEl.textContent = cartItems.length;

                cartItems.forEach(item => {
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'flex items-center space-x-4 bg-background-DEFAULT p-4 rounded-lg shadow-inner';
                    itemDiv.innerHTML = `
                        <img src="${item.image}" alt="${item.name}" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-grow">
                            <h3 class="font-bold text-lg">${item.name}</h3>
                            <p class="text-text-light">$${item.price.toFixed(2)}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button data-id="${item.id}" data-action="decrease" class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 transition-colors duration-300">-</button>
                            <span class="text-lg font-semibold w-6 text-center">${item.quantity}</span>
                            <button data-id="${item.id}" data-action="increase" class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 transition-colors duration-300">+</button>
                        </div>
                        <div class="text-right font-bold text-lg w-20">
                            $${(item.price * item.quantity).toFixed(2)}
                        </div>
                        <button data-id="${item.id}" data-action="remove" class="p-2 text-text-light hover:text-red-500 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    `;
                    cartItemsContainer.appendChild(itemDiv);
                });
            }
            updateTotals();
        }

        function updateTotals() {
            let subtotal = 0;
            cartItems.forEach(item => {
                subtotal += item.price * item.quantity;
            });
            subtotalPriceEl.textContent = `$${subtotal.toFixed(2)}`;
            totalPriceEl.textContent = `$${subtotal.toFixed(2)}`; // No shipping cost for simplicity
        }

        function handleCartAction(event) {
            const button = event.target.closest('button');
            if (!button) return;

            const id = parseInt(button.dataset.id);
            const action = button.dataset.action;

            const itemIndex = cartItems.findIndex(item => item.id === id);

            if (itemIndex > -1) {
                if (action === 'increase') {
                    cartItems[itemIndex].quantity++;
                } else if (action === 'decrease') {
                    if (cartItems[itemIndex].quantity > 1) {
                        cartItems[itemIndex].quantity--;
                    }
                } else if (action === 'remove') {
                    cartItems.splice(itemIndex, 1);
                }
                renderCart();
            }
        }

        cartItemsContainer.addEventListener('click', handleCartAction);

        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('header button[aria-label="Open menu"]');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Initial render
        document.addEventListener('DOMContentLoaded', renderCart);
    