document.addEventListener('DOMContentLoaded', () => {

    const reviewModal = document.getElementById('reviewModal');
    const openReviewBtns = document.querySelectorAll('.open-review-modal-btn');
    const closeReviewBtn = document.getElementById('closeReviewModalBtn');

    const openModal = () => {
        reviewModal.classList.remove('hidden');
        requestAnimationFrame(() => {
            reviewModal.classList.remove('opacity-0');
            reviewModal.classList.add('opacity-100');
            const panel = reviewModal.querySelector('.transform');
            if (panel) {
                panel.classList.remove('scale-95');
                panel.classList.add('scale-100');
            }
        });
    };

    const closeModal = () => {
        reviewModal.classList.remove('opacity-100');
        reviewModal.classList.add('opacity-0');
        const panel = reviewModal.querySelector('.transform');
        if (panel) {
            panel.classList.remove('scale-100');
            panel.classList.add('scale-95');
        }
        setTimeout(() => reviewModal.classList.add('hidden'), 300);
    };

    openReviewBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            openModal();
        });
    });

    closeReviewBtn?.addEventListener('click', closeModal);
    reviewModal?.addEventListener('click', (e) => { if (e.target === reviewModal) closeModal(); });

});
