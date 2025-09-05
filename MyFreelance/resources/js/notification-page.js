        const notificationToggle = document.getElementById('notification-toggle');
        const notificationMenu = document.getElementById('notification-menu');
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        // Toggles the visibility of the notification menu by adding/removing the 'hidden' Tailwind class.
        notificationToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationMenu.classList.toggle('hidden');
            // Hides other menus to ensure only one is open at a time.
            userMenu.classList.add('hidden');
            mobileMenu.classList.add('hidden');
        });

        // Toggles the visibility of the user menu.
        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userMenu.classList.toggle('hidden');
            // Hides other menus.
            notificationMenu.classList.add('hidden');
            mobileMenu.classList.add('hidden');
        });

        // Toggles the visibility of the mobile menu.
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            // Hides other menus.
            userMenu.classList.add('hidden');
            notificationMenu.classList.add('hidden');
        });

        // Hides all menus when the user clicks anywhere outside of them.
        document.addEventListener('click', (e) => {
            if (!notificationMenu.contains(e.target) && !notificationToggle.contains(e.target)) {
                notificationMenu.classList.add('hidden');
            }
            if (!userMenu.contains(e.target) && !userMenuButton.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });