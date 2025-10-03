import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            // Овде дефинишемо наше прилагођене боје
                colors: {
                    // Базне боје (позадина/текст)
                    'primary': {
                    50: '#F8F6F4', // Кремасто бела (за позадине)
                    900: '#1A1A2E', // Поноћно сива (за главни текст)
                    },
                    // Луксузни акценат (златна)
                    'accent': {
                    500: '#A68C65', // Нежно златна
                    700: '#8C7456', // Тамно златна (за hover/active)
                    },
                    // Комплементарни акценат (дубока боја)
                    'secondary': {
                    500: '#594A4E', // Дубока шљива/бургунди
                    },
                },
            },
    },
    plugins: [],
};
