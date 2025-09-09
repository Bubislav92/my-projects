/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",
    "./components/**/*.html", // Додајте ову линију да Tailwind скенира компоненте
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          light: '#6d28d9',
          DEFAULT: '#5b21b6', // Пример: љубичаста боја за дугмиће, наслове
          dark: '#4c1d95',
        },
        secondary: '#f97316', // Пример: наранџаста боја за акције (sale, new)
        text: {
          DEFAULT: '#374151', // Тамно сива за основни текст
          light: '#6b7280', // Светлија сива за мањи текст
        },
        background: {
          DEFAULT: '#f3f4f6', // Светло сива позадина
          card: '#ffffff', // Бела позадина за картице производа
        },
      },
    },
  },
  plugins: [],
}