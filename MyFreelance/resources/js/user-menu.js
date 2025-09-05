document.addEventListener('DOMContentLoaded', () => {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    // Inicijalno sakrijemo meni
    userMenu.style.maxHeight = '0px';

    function closeMenu() {
        userMenu.style.maxHeight = '0px';
    }

    userMenuButton.addEventListener('click', (e) => {
        e.stopPropagation();
        if (userMenu.style.maxHeight === '0px') {
            userMenu.style.maxHeight = userMenu.scrollHeight + 'px';
        } else {
            closeMenu();
        }
    });

    // Klik van menija zatvara ga
    document.addEventListener('click', (e) => {
        if (!userMenu.contains(e.target) && !userMenuButton.contains(e.target)) {
            closeMenu();
        }
    });
});