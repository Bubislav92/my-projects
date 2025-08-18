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
          'primary-dark': '#0F172A', // Тамно плава
          'secondary-dark': '#1E293B', // Тамно сива
          'accent': '#22D3EE', // Тиркизна
          'text-light': '#F8FAFC', // Светло сива
        },
      },
    },
    plugins: [],
};
