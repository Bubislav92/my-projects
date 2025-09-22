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
                'primary': '#6EE7B7', // Soft green (Mint)
                'secondary': '#FDBA74', // Soft orange (Light Apricot)
                'background-light': '#F3F4F6', // Very light gray
                'background-dark': '#E5E7EB', // Slightly darker gray for variations
                'text-dark': '#4B5563', // Dark gray for main text
                'text-light': '#6B7280', // Lighter gray for secondary text
                'accent': '#93C5FD', // Light blue for accent elements
                'border': '#D1D5DB', // Gray for borders
              },
        },
    },

    plugins: [forms],
};
