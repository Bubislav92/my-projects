document.addEventListener('DOMContentLoaded', function () {
    const openButton = document.getElementById('open-find-modal-button');
    const closeButton = document.getElementById('close-find-modal-button');
    const modal = document.getElementById('find-freelancer-modal');
    const modalContent = modal.querySelector('div');

    if (openButton && closeButton && modal) {
        // Otvara modal
        openButton.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);
        });

        // Zatvara modal
        closeButton.addEventListener('click', function () {
            modal.classList.remove('opacity-100');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        });

        // Zatvara modal klikom van sadržaja
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('opacity-100');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        });
        
        // Zatvara modal pritiskom na 'Escape' taster
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                modal.classList.remove('opacity-100');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        });
    }
});