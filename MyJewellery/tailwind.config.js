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
        'gold': '#A58A69',
        'gold-hover': '#b0967a',
        'dark-gray': '#1F2937',
        'light-gray': '#F9FAFB',
        'subtle-gray': '#6B7280',
      },
      fontFamily: {
          serif: ['Playfair Display', 'serif'],
          sans: ['Lato', 'sans-serif'],
      }
    },
  },

    plugins: [forms],
};
