document.addEventListener('DOMContentLoaded', () => {
    const openLink = document.getElementById('openModalLink');
    const modal = document.getElementById('tipsModal');
    const closeBtn = document.getElementById('closeModalBtn');

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

    openLink.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);

    // Close on outside click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
});
