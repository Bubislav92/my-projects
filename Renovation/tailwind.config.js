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
            colors: {
                'primary': '#1A237E', // Тамноплава, нпр. 'indigo-900'
                'secondary': '#FFC107', // Златна, нпр. 'amber-500'
                'accent': '#FF5722', // Додатна боја за акценте
                'dark': '#263238', // Тамна сива за текст и позадине
                'light': '#F5F5F5', // Светла сива за позадине
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'], // Препоручује се професионалан фонт
                serif: ['Playfair Display', 'serif'],
            },
        },
    },
    plugins: [],
};
