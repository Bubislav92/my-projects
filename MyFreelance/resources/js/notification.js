document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('notification-toggle');
    const menu = document.getElementById('notification-menu');

    // Inicijalno sakrijemo meni
    menu.style.maxHeight = '0px';
    
    toggleButton.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = menu.style.maxHeight !== '0px';
        menu.style.maxHeight = isOpen ? '0px' : menu.scrollHeight + 'px';
    });

    // Klikvanjem van menija zatvara se
    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && !toggleButton.contains(e.target)) {
            menu.style.maxHeight = '0px';
        }
    });
});