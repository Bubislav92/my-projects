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
                'background-dark': '#0D0D0D', // Главна позадина (Deep Black)
                'surface-dark': '#1A1A1A',    // Позадина за елементе (Dark Gray)
                'text-light': '#F5F5F5',      // Боја текста (Off-White)
                'accent-gold': '#B8860B',     // Примарни акценат - Луксуз (Dark Goldenrod)
                'highlight-blue': '#007FFF',  // Секундарни акценат - Поузданост (Azure)
                'border-gray': '#404040',     // Границе и раздвајачи (Medium Dark Gray)
              },
        },
    },
    plugins: [],
};
