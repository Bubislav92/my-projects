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
                'primary': '#0A192F',       // Тамно плава
                'secondary': '#FFC107',     // Јарко жута
                'accent': '#DC3545',        // Црвена
                'light-gray': '#F5F5F5',    // Светло сива
                'dark-gray': '#333333',     // Тамно сива
              },
        },
    },
    plugins: [],
};
