document.addEventListener('DOMContentLoaded', () => {
    const openLink = document.getElementById('openSecondModalLink');
    const modal = document.getElementById('secondTipsModal');
    const closeBtn = document.getElementById('closeSecondModalBtn');

    if (!openLink || !modal || !closeBtn) return;

    // Show modal
    function openModal(e) {
        e.preventDefault();
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
        }, 10);
    }

    // Hide modal
    function closeModal() {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Event listeners
    openLink.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
});
