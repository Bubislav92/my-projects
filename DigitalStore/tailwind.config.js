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
                'background-dark': '#1C2B3A', // Тамноплава-сива - главна позадина
                'surface-light': '#F3F4F6', // Светло сива - позадина за картице/секције
                'accent-green': '#10B981', // Жива зелена - примарни CTA, успех
                'accent-orange': '#F97316', // Топла наранџаста - секундарни CTA, упозорење
                'text-primary': '#E5E7EB', // Светло сива - текст на тамним површинама
                'text-secondary': '#4B5563', // Тамно сива - текст на светлим површинама
              },
        },
    },
    plugins: [],
};
