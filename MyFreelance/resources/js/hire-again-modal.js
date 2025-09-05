document.addEventListener('DOMContentLoaded', () => {

    const hireModal = document.getElementById('hireAgainModal');
    const openHireBtns = document.querySelectorAll('.open-hire-modal-btn');
    const closeHireBtn = document.getElementById('closeHireAgainModalBtn');
    const cancelHireBtn = document.getElementById('cancelHireBtn');
    const hireNameSpan = document.getElementById('hireAgainFreelancerName');

    const openModal = (name = 'Freelancer') => {
        if (hireNameSpan) hireNameSpan.textContent = name;
        hireModal.classList.remove('hidden');
        requestAnimationFrame(() => {
            hireModal.classList.remove('opacity-0');
            hireModal.classList.add('opacity-100');
            const panel = hireModal.querySelector('.transform');
            if (panel) {
                panel.classList.remove('scale-95');
                panel.classList.add('scale-100');
            }
        });
    };

    const closeModal = () => {
        hireModal.classList.remove('opacity-100');
        hireModal.classList.add('opacity-0');
        const panel = hireModal.querySelector('.transform');
        if (panel) {
            panel.classList.remove('scale-100');
            panel.classList.add('scale-95');
        }
        setTimeout(() => hireModal.classList.add('hidden'), 300);
    };

    openHireBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const name = btn.dataset.freelancerName || 'Freelancer';
            openModal(name);
        });
    });

    closeHireBtn?.addEventListener('click', closeModal);
    cancelHireBtn?.addEventListener('click', closeModal);
    hireModal?.addEventListener('click', (e) => { if (e.target === hireModal) closeModal(); });

});
