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
                'primary': '#003366', // Тамноплава
                'secondary': '#FF9900', // Наранџасти акценат
                'accent': '#A0AEC0',    // Светло сива
                'text-dark': '#1A202C', // Тамни текст
                // Бела je већ дефинисана kao 'white'
              },
        },
    },
    plugins: [],
};
