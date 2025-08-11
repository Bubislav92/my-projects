import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/spinner.css', 'resources/js/app.js', 'resources/js/cart-modal.js', 'resources/js/wishlist-modal.js', 'resources/js/search-modal.js', 'resources/js/spinner.js', 'resources/js/order-modal.js'],
            refresh: true,
        }),
    ],
});