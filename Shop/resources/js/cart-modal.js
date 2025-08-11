document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addToCartModal');
    const modalProductDetails = document.getElementById('modalProductDetails');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const continueShoppingBtn = document.getElementById('continueShoppingBtn');

    // Pristupite podacima preko globalne promenljive
    const flashMessages = window.flashMessages;

    if (flashMessages && flashMessages.success && flashMessages.addedProduct.id) {
        // Popunite detalje proizvoda u modalu
        modalProductDetails.innerHTML = `
            <img src="${flashMessages.addedProduct.image}" alt="${flashMessages.addedProduct.name}" class="w-16 h-16 object-cover rounded-md mr-4 border border-light-gray">
            <div>
                <p class="font-medium text-dark-gray">${flashMessages.addedProduct.name}</p>
                <p class="text-sm text-gray-600">Quantity: 1</p>
            </div>
        `;
        modal.classList.remove('hidden'); // Prikaži modal
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    closeModalBtn.addEventListener('click', closeModal);
    continueShoppingBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});