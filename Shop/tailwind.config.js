import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
          // Ovde ćeš morati da vratiš HEX kodove za tvoje primarne boje
          // Ako ih nisi zapisao, koristiću neke opšte vrednosti, pa ih ti kasnije zameni
          colors: {
            'primary-green': '#4CAF50', // Primer: Vrlo česta nijansa zelene, zameni sa tvojom stvarnom
            'primary-green-dark': '#388E3C', // Primer: Tamnija nijansa
            'primary-green-light': '#81C784', // Primer: Svetlija nijansa
            'dark-gray': '#333333', // Primer: Česta tamno siva
            'light-gray': '#F5F5F5', // Primer: Česta svetlo siva
          },
          fontFamily: {
            sans: ['Inter', ...defaultTheme.fontFamily.sans],
          },
          keyframes: {
            fadeIn: {
              'from': { opacity: '0' },
              'to': { opacity: '1' },
            },
            fadeInDown: {
              'from': { opacity: '0', transform: 'translateY(-20px)' },
              'to': { opacity: '1', transform: 'translateY(0)' },
            },
            fadeInUp: {
              'from': { opacity: '0', transform: 'translateY(20px)' },
              'to': { opacity: '1', transform: 'translateY(0)' },
            },
            fadeInRight: {
              'from': { opacity: '0', transform: 'translateX(20px)' },
              'to': { opacity: '1', transform: 'translateX(0)' },
            },
            blob: {
              '0%': { transform: 'translate(0px, 0px) scale(1)' },
              '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
              '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
              '100%': { transform: 'translate(0px, 0px) scale(1)' },
            }
          },
          animation: {
            'fade-in': 'fadeIn 1s ease-out forwards',
            'fade-in-down': 'fadeInDown 1s ease-out forwards',
            'fade-in-up': 'fadeInUp 1s ease-out forwards',
            'fade-in-right': 'fadeInRight 1s ease-out forwards',
            'blob': 'blob 7s infinite ease-in-out alternate',
          }
        },
      },
      plugins: [forms],
    };