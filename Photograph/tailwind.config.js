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
                'neutral-950': '#0A0A0A',
                'neutral-50': '#FAFAFA',
                'slate-600': '#475569',
                'slate-300': '#CBD5E1',
                'accent-400': '#FDBA74',
                'accent-600': '#F97316',
              },
              fontFamily: {
                'sans': ['Inter', 'sans-serif'], // Препорука за професионалне фонтове
                'serif': ['Merriweather', 'serif'],
              },
        },
    },
    plugins: [],
};
