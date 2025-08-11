import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors'; // Увезите colors из tailwindcss

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // Додајте дефиниције боја овде
            colors: {
                // Користите Tailwinds-ове уграђене нијансе за конзистентност
                orange: colors.orange,
                emerald: colors.emerald,
                gray: colors.gray,
                white: colors.white,
                black: colors.black,
                // Можете додати и друге боје ако су вам потребне (нпр. custom нијансе)
                // 'primary-orange': '#FF8C42', // Пример custom боје
                // 'secondary-green': '#3CB371', // Пример custom боје
            },
            // Додајте дефиниције keyframes и animation за ваше анимације
            keyframes: {
                'fade-in-up': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(20px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                'fade-in-left': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(-20px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)'
                    },
                },
                'fade-in-right': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(20px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)'
                    },
                },
            },
            animation: {
                'fade-in-up': 'fade-in-up 0.6s ease-out forwards',
                'fade-in-left': 'fade-in-left 0.6s ease-out forwards',
                'fade-in-right': 'fade-in-right 0.6s ease-out forwards',
            }
        },
    },

    plugins: [forms],
};
