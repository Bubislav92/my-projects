document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('orderDetailsModal');
    const closeBtn = document.getElementById('closeOrderModalBtn');
    const orderItemsContainer = document.getElementById('orderItemsContainer');

    function showOrderModal(orderData) {
        document.getElementById('orderId').innerHTML = `<span class="font-medium text-gray-600">Order ID:</span> <span class="font-bold text-dark-gray">#${orderData.id}</span>`;
        document.getElementById('orderStatus').innerHTML = `<span class="font-medium text-gray-600">Status:</span> <span class="font-bold text-dark-gray">${orderData.status}</span>`;
        document.getElementById('orderTotal').innerHTML = `<span class="font-medium text-gray-600">Total Amount:</span> <span class="font-bold text-dark-gray">${orderData.total_amount} USD</span>`;
        
        orderItemsContainer.innerHTML = '';

        if (orderData.order_items && Array.isArray(orderData.order_items)) {
            orderData.order_items.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.className = 'flex items-center space-x-4 p-2 bg-gray-100 rounded-md';
                
                const imageUrl = (item.product && item.product.media && item.product.media.length > 0) 
                                 ? item.product.media[0].original_url 
                                 : 'https://via.placeholder.com/60?text=No+Image';

                // Ispravljeno: Koristimo 'price_at_purchase' umesto 'price_per_unit'
                const pricePerUnit = parseFloat(item.price_at_purchase);
                const quantity = parseFloat(item.quantity);
                let itemTotal = 'N/A';

                if (!isNaN(pricePerUnit) && !isNaN(quantity)) {
                    itemTotal = (pricePerUnit * quantity).toFixed(2);
                }

                itemElement.innerHTML = `
                    <img src="${imageUrl}" alt="${item.product.name}" class="w-16 h-16 object-cover rounded-md">
                    <div class="flex-1">
                        <p class="font-semibold text-dark-gray">${item.product.name}</p>
                        <p class="text-sm text-gray-600">Quantity: ${item.quantity}</p>
                    </div>
                    <p class="font-bold text-primary-green">${itemTotal} USD</p>
                `;
                orderItemsContainer.appendChild(itemElement);
            });
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    document.querySelectorAll('.view-order-btn').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.dataset.orderId;
            const url = `/dashboard/orders/${orderId}/details`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    showOrderModal(data);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                    alert('Došlo je do greške prilikom učitavanja detalja porudžbine. Pokušajte ponovo.');
                });
        });
    });

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});