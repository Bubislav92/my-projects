document.addEventListener('DOMContentLoaded', function() {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    function closeAllMenus() {
        if (userMenu) {
            userMenu.classList.add('hidden');
        }
        if (mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    }

    if (userMenuButton && userMenu) {
        userMenuButton.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            closeAllMenus();
            userMenu.classList.toggle('hidden');
        });
    }

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            closeAllMenus();
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Close menus when clicking outside
    document.addEventListener('click', function(event) {
        if (userMenu && !userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
        if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
});
