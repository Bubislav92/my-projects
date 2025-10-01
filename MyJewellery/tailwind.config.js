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
                // Osnovne Neutralne Boje
                'cream-base': '#F5F5F5',    // Vrlo svetla, prljavo bela/bež, elegantnija od čiste bele
                'dark-slate': '#1A1A1A',    // Vrlo tamna siva, skoro crna, ali izbegavamo čistu crnu (#000000) za dubinu
                
                // Luksuzna Naglasak Boja (Zlato/Bronza)
                'gold-accent': '#B8860B',   // Duboka, plemenita zlatna nijansa
                'gold-light': '#D4AF37',    // Svetlija nijansa za sjaj i naglaske
                
                // Sekundarna Luksuzna Boja (Safir/Tirkiz)
                'sapphire-deep': '#0F3057', // Duboka, bogata plava, asocira na safir
                'sapphire-light': '#2163A0',// Svetlija plava za interaktivne elemente
                
                // Akcentna Boja (Za CTA i važne elemente)
                'ruby-red': '#A50020',      // Diskretna, bogata crvena za 'Kupi sada'
              },
              fontFamily: {
                // 'serif' će se koristiti za elegantan, luksuzan izgled
                // 'sans' će biti čist, savremen font za čitljivost
                'heading': ['Playfair Display', 'serif'], // Luksuzan, elegantan font za naslove
                'body': ['Inter', 'sans-serif'],        // Čist, moderan, profesionalan font za telo teksta
              },
        },
    },

    plugins: [forms],
};
