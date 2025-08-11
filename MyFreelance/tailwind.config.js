import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
          colors: {
            'primary-orange': '#FFA500', // Светлија, енергична наранџаста
            'secondary-green': '#3CB371', // Свежа, професионална зелена
            'dark-gray': '#333333',     // За главни текст и футере
            'light-gray': '#F8F8F8',    // За светле позадине
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'], // Препорука: Inter или неки други модеран фонт
          },
        },
    },

    plugins: [forms],
};
