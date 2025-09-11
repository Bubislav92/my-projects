/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.html",
    "./components/**/*.html", // Додајте ову линију да Tailwind скенира компоненте
  ],
  theme: {
    extend: {
      // Ovde idu vaše prilagođene boje
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
}
