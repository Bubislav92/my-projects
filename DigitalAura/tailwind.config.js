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
            // Овде додајете нове боје
            colors: {
                    'aura-primary': '#00F0FF', // Неон цијан
                    'aura-secondary': '#FF4D94', // Вибрантна магента
                    'aura-dark': '#1A1A2E', // Тамноплава позадина
                    'aura-light': '#EBEBF0', // Светли текст
                    'aura-muted': '#8F9BB3', // Сиви помоћни текст
                    },
                    // Можете додати и фонтове, типографију итд.
                },
    },
    plugins: [],
};
