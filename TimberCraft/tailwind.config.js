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
                'wood-primary': '#7A4F3F',    // Боја топлог, тамнијег дрвета (за главне елементе)
                'wood-light': '#C5A67B',      // Боја светлијег дрвета (за акценте)
                'nature-green': '#3B5945',    // Тамна, пригушена зелена (асоцијација на природу/бренд)
                'off-white': '#F5F5F0',       // Скоро бела, топла подлога
                'charcoal': '#2C2C2C',        // Врло тамна сива/црна (за текст)
              },
        },
    },
    plugins: [],
};
