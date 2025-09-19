// tailwind.config.js
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#4B5563',
        'secondary': '#F3F4F6',
        'accent': '#B45309',
        'highlight': '#FCD34D',
      },
      
    },
  },
  plugins: [],
}