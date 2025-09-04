import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/js/app.js', 
                'resources/js/user-menu.js', 
                'resources/js/find-freelancer.js', 
                'resources/js/post-project-modal.js',
                'resources/js/read-article-modal.js',
                'resources/js/second-read-article-modal.js'],
            refresh: true,
        }),
    ],
});
