import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Funkcionalnost modalnog prozora za pretragu
document.addEventListener('DOMContentLoaded', () => {
    const openSearchModalBtn = document.getElementById('openSearchModalBtn');
    const closeSearchModalBtn = document.getElementById('closeSearchModalBtn');
    const searchModal = document.getElementById('searchModal');
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const noResults = document.getElementById('noResults');

    // Proveravamo da li elementi postoje pre nego što im dodamo event listenere
    if (openSearchModalBtn && searchModal && closeSearchModalBtn) {
        openSearchModalBtn.addEventListener('click', () => {
            searchModal.classList.remove('hidden');
            searchInput.focus(); // Fokusiraj se na polje za unos kada se modal otvori
        });

        closeSearchModalBtn.addEventListener('click', () => {
            searchModal.classList.add('hidden');
            searchResults.innerHTML = ''; // Očisti prethodne rezultate
            noResults.classList.add('hidden'); // Sakrij poruku "Nema rezultata"
            searchInput.value = ''; // Očisti polje za unos
        });

        // Zatvori modal kada se klikne van njega
        searchModal.addEventListener('click', (e) => {
            if (e.target === searchModal) {
                searchModal.classList.add('hidden');
                searchResults.innerHTML = '';
                noResults.classList.add('hidden');
                searchInput.value = '';
            }
        });

        // Funkcionalnost pretrage (pretpostavljamo da je window.routes.search dostupan)
        if (searchInput && searchResults && noResults && window.routes && window.routes.search) {
            let searchTimeout;
            searchInput.addEventListener('input', () => {
                clearTimeout(searchTimeout); // Očisti prethodni tajmer

                const query = searchInput.value.trim();

                if (query.length < 2) { // Zahtevaj najmanje 2 karaktera za pretragu
                    searchResults.innerHTML = '';
                    noResults.classList.add('hidden');
                    return;
                }

                searchTimeout = setTimeout(async () => {
                    try {
                        const response = await fetch(`${window.routes.search}?query=${encodeURIComponent(query)}`);
                        const data = await response.json();

                        searchResults.innerHTML = ''; // Očisti prethodne rezultate

                        if (data.length > 0) {
                            noResults.classList.add('hidden');
                            data.forEach(product => {
                                const productLink = document.createElement('a');
                                productLink.href = `/products/${product.slug}`; // Prilagodi rutu detalja proizvoda ako je potrebno
                                productLink.classList.add('flex', 'items-center', 'p-2', 'hover:bg-gray-100', 'rounded-md', 'transition-colors', 'duration-200');
                                productLink.innerHTML = `
                                    <img src="/images/products/${product.image}" alt="${product.name}" class="w-12 h-12 object-cover rounded-md mr-3">
                                    <div>
                                        <p class="font-semibold text-dark-gray">${product.name}</p>
                                        <p class="text-sm text-gray-600">${product.price.toFixed(2)} RSD</p>
                                    </div>
                                `;
                                searchResults.appendChild(productLink);
                            });
                        } else {
                            noResults.classList.remove('hidden'); // Prikaži poruku "Nema rezultata"
                        }
                    } catch (error) {
                        console.error('Greška prilikom preuzimanja rezultata pretrage:', error);
                        searchResults.innerHTML = '<p class="text-center text-red-500 py-4">Došlo je do greške prilikom pretrage.</p>';
                        noResults.classList.add('hidden');
                    }
                }, 300); // Debounce: sačekaj 300ms nakon unosa pre pretrage
            });
        }
    }
});