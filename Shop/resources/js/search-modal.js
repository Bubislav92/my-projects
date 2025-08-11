document.addEventListener('DOMContentLoaded', function() {
    const openSearchModalBtn = document.getElementById('openSearchModalBtn');
    const searchModal = document.getElementById('searchModal');
    const closeSearchModalBtn = document.getElementById('closeSearchModalBtn');
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const noResultsMessage = document.getElementById('noResults');

    let searchTimeout;

    function openModal() {
        searchModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        searchInput.focus();
    }

    function closeModal() {
        searchModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        searchInput.value = '';
        searchResults.innerHTML = '';
        noResultsMessage.classList.add('hidden');
    }

    async function performSearch(query) {
        if (query.length < 2) {
            searchResults.innerHTML = '';
            noResultsMessage.classList.add('hidden');
            return;
        }

        try {
            // Koristimo globalnu varijablu window.routes ako je definisana u Blade-u
            const searchUrl = window.routes && window.routes.search ? window.routes.search : '/search';
            const response = await fetch(`${searchUrl}?query=${encodeURIComponent(query)}`);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const products = await response.json();
            
            displayResults(products);

        } catch (error) {
            console.error('Greška pri pretrazi:', error);
            searchResults.innerHTML = '<p class="text-center text-red-500 py-4">Došlo je do greške prilikom pretrage.</p>';
            noResultsMessage.classList.add('hidden');
        }
    }

    function displayResults(products) {
        searchResults.innerHTML = '';
        
        if (products.length === 0) {
            noResultsMessage.classList.remove('hidden');
            return;
        } else {
            noResultsMessage.classList.add('hidden');
        }

        products.forEach(product => {
            const productCard = document.createElement('a');
            productCard.href = `/products/${product.slug}`;
            productCard.className = 'flex items-center p-3 hover:bg-gray-100 rounded-md transition duration-200';
            
            const imageUrl = product.thumbnail_url || 'https://via.placeholder.com/60x60/F5F5F5/333333?text=No+Img';

            productCard.innerHTML = `
                <img src="${imageUrl}" alt="${product.name}" class="w-16 h-16 object-cover rounded-md mr-4">
                <div>
                    <h4 class="font-semibold text-dark-gray">${product.name}</h4>
                    <p class="text-primary-green font-bold">${parseFloat(product.price).toFixed(2)} USD</p>
                </div>
            `;
            searchResults.appendChild(productCard);
        });
    }

    if (openSearchModalBtn) {
        openSearchModalBtn.addEventListener('click', openModal);
    }
    if (closeSearchModalBtn) {
        closeSearchModalBtn.addEventListener('click', closeModal);
    }
    if (searchModal) {
        searchModal.addEventListener('click', function(event) {
            if (event.target === searchModal) {
                closeModal();
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value;
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });
    }
});