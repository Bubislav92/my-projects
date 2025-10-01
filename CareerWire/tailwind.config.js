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
            colors: {
                // PRIMARNE BOJE (SkillFlow Branding)
                carrerwire: {
                    // Moderno, profesionalno zeleno (Primarna akcija, linkovi, dugmad)
                    'green': '#00B894', // Čista, profesionalna zelena (Emerald/Teal ton)
                    'green-light': '#36E0B5',
                    'green-dark': '#009477',
                    // Energetska, topla narandžasta (Akcentna boja, upozorenja, isticanje)
                    'orange': '#FF7F50',  // Koralna/Narandžasta nijansa (Coral)
                    'orange-light': '#FFA37F',
                    'orange-dark': '#CC6640',
                },
                
                // NEUTRALNE BOJE (Siva i Bijela)
                // Bijela: Koristite isključivo 'white' za profesionalnu pozadinu
                'white': '#FFFFFF',
                
                // Siva: Za tekst, ivice i neutralne pozadine
                'gray': {
                    50: '#F9FAFB',    // Najsvetlija siva (za suptilne pozadine)
                    100: '#F3F4F6',   // Pozadina (kao 'body' background)
                    200: '#E5E7EB',   // Ivice, linije
                    300: '#D1D5DB',   // Slabe ivice, placeholderi
                    400: '#9CA3AF',   // Suptilan tekst, ikone
                    500: '#6B7280',   // Sekundarni tekst
                    600: '#4B5563',   // Normalan tekst
                    700: '#374151',   // Glavni naslovi
                    800: '#1F2937',   // Najtamniji tekst
                    900: '#111827',   // Skoro crna
                },
              },
        },
    },

    plugins: [forms],
};
