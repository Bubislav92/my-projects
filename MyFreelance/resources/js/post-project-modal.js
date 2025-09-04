document.addEventListener('DOMContentLoaded', function () {
    const openButton = document.getElementById('open-project-modal-button');
    const closeModalButton = document.getElementById('close-modal-button');
    const modal = document.getElementById('create-project-modal');
    const modalContent = document.getElementById('modal-content');

    if (openButton && closeModalButton && modal && modalContent) {
        // 👉 Otvori modal
        openButton.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100');
            }, 10);
        });

        // 👉 Zatvori modal (X dugme)
        closeModalButton.addEventListener('click', function () {
            modal.classList.remove('opacity-100');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        });

        // 👉 Zatvori modal klikom van sadržaja
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.remove('opacity-100');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        });

        // 👉 Escape taster
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                modal.classList.remove('opacity-100');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        });
    }
});
