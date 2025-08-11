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
          'primary-blue': '#1E3A8A',    // Наша тамно плава
          'accent-yellow': '#FBBF24',  // Наша жућкаста акцентна боја
          'gray-text': '#1F2937',      // Скоро црна за текст
          'light-bg': '#F9FAFB',       // Светла позадина
          'medium-gray': '#6B7280',    // Средња сива
        },
      },
    },
    plugins: [],
};
