document.addEventListener('DOMContentLoaded', () => {
    const triggers = document.querySelectorAll('.open-message-modal-btn');
    const modal = document.getElementById('messageModal');
    if (!modal) return;

    const panel = modal.querySelector('.transform');   // unutrašnji panel za scale animaciju
    const title = modal.querySelector('#modalTitle');
    const closeBtn = modal.querySelector('#messageCloseBtn');
    const sendBtn  = modal.querySelector('#messageSendBtn');
    const textarea = modal.querySelector('#messageTextarea');

    const open = (name = 'Freelancer') => {
        if (title) title.textContent = `Message ${name}`;
        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            panel.classList.remove('scale-95');
            panel.classList.add('scale-100');
        });
    };

    const close = () => {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        panel.classList.remove('scale-100');
        panel.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 300);
    };

    triggers.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();
            const name =
                el.dataset.freelancerName ||
                el.closest('[data-freelancer-name]')?.dataset.freelancerName ||
                el.closest('.bg-white')?.querySelector('h3')?.textContent?.trim() ||
                'Freelancer';
            open(name);
        });
    });

    closeBtn?.addEventListener('click', close);
    modal.addEventListener('click', (e) => { if (e.target === modal) close(); });

    sendBtn?.addEventListener('click', () => {
        const msg = textarea?.value.trim();
        if (!msg) {
            alert('Please type a message.');
            return;
        }
        // ovde ubaci AJAX/Fetch slanje poruke
        textarea.value = '';
        close();
    });
});
