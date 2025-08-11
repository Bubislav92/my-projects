// resources/js/wishlist-modal.js

document.addEventListener('DOMContentLoaded', function() {
    const wishlistModal = document.getElementById('addToWishlistModal');
    const wishlistModalProductDetails = document.getElementById('wishlistModalProductDetails');
    const closeWishlistModalBtn = document.getElementById('closeWishlistModalBtn');
    const continueShoppingWishlistBtn = document.getElementById('continueShoppingWishlistBtn');

    // PROVERA: Da li su elementi pronađeni?
    if (!wishlistModal) {
        console.error('ERROR: #addToWishlistModal element not found. Wishlist modal will not function.');
        return;
    }
    // Ako se modal ne prikazuje, obavezno proveri ove logove u konzoli brauzera (F12)
    if (!wishlistModalProductDetails) {
        console.warn('WARNING: #wishlistModalProductDetails element not found.');
    }
    if (!closeWishlistModalBtn) {
        console.warn('WARNING: #closeWishlistModalBtn not found.');
    }
    if (!continueShoppingWishlistBtn) {
        console.warn('WARNING: #continueShoppingWishlistBtn not found.');
    }


    // Pristupite podacima preko NOVE globalne promenljive
    const flashWishlistMessages = window.flashWishlistMessages;

    // Proverite da li postoje poruke o uspešnom dodavanju u listu želja
    if (flashWishlistMessages && flashWishlistMessages.success && flashWishlistMessages.addedProduct.id) {
        console.log('Wishlist flash message detected. Attempting to show wishlist modal.');

        // Popunite detalje proizvoda u modalu
        if (wishlistModalProductDetails) {
            const imageUrl = flashWishlistMessages.addedProduct.image || 'https://via.placeholder.com/64x64/F5F5F5/333333?text=No+Image';
            const productName = flashWishlistMessages.addedProduct.name || 'Unknown Product';

            wishlistModalProductDetails.innerHTML = `
                <img src="${imageUrl}" alt="${productName}" class="w-16 h-16 object-cover rounded-md mr-4 border border-light-gray">
                <div>
                    <p class="font-medium text-dark-gray">${productName}</p>
                    <p class="text-sm text-gray-600">Successfully added to your wishlist!</p>
                </div>
            `;
        }

        wishlistModal.classList.remove('hidden'); // Prikaži modal
    } else {
        console.log('No wishlist flash message detected or incomplete data. Wishlist modal will not be shown on load.');
    }

    // Funkcija za zatvaranje modala
    function closeWishlistModal() {
        wishlistModal.classList.add('hidden');
        console.log('Wishlist modal closed.');
    }

    // Dodajte event listenere za dugmad za zatvaranje
    if (closeWishlistModalBtn) {
        closeWishlistModalBtn.addEventListener('click', closeWishlistModal);
    }
    if (continueShoppingWishlistBtn) {
        continueShoppingWishlistBtn.addEventListener('click', closeWishlistModal);
    }

    // Zatvaranje modala kada se klikne izvan njegovog sadržaja (na pozadinu)
    if (wishlistModal) {
        wishlistModal.addEventListener('click', function(event) {
            if (event.target === wishlistModal) {
                closeWishlistModal();
            }
        });
    }

    console.log('wishlist-modal.js initialized.');
});