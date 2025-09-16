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
                'primary-dark': '#0A192F',
                'primary-light': '#172A45',
                'accent': '#64FFDA',
                'text-light': '#CCD6F6',
                'text-dark': '#8892B0',
                'bg-main': '#0A192F',
                'bg-secondary': '#112240',
              },
        },
    },
    plugins: [],
};
