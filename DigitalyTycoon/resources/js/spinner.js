document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form'); // tvoja checkout forma
    const btn = document.getElementById('open-payment-modal');
    const btnText = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');

    if (!form || !btn || !btnText || !btnSpinner) return; // sigurnosna provera

    form.addEventListener('submit', () => {
        // Sakrij tekst dugmeta
        btnText.classList.add('hidden');
        // Prikaži spinner
        btnSpinner.classList.remove('hidden');
        // Disable dugme da se ne klikće više puta
        btn.disabled = true;
    });
});
