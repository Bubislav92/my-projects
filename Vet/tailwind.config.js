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
                // --- Главне боје ---
                // Primarna: Дубока, професионална плава за дугмад, хедере, важне иконе
                'primary': {
                  '50': '#E6F0F6',
                  '100': '#B3D0E4',
                  '200': '#80AFC2',
                  '300': '#4D8EA0',
                  '400': '#1A6D7E',
                  '500': '#0F4D59', // Главна нијанса
                  '600': '#0B3A44',
                  '700': '#08282E',
                  '800': '#051A1D',
                  '900': '#030D0E',
                },
                // Sekundarna: Свежа, умирујућа зелена, асоцијација на здравље и природу
                'secondary': {
                  '50': '#EDFAF1',
                  '100': '#D3F4DC',
                  '200': '#B6EFCA',
                  '300': '#99E9B7',
                  '400': '#7CE3A4',
                  '500': '#60DD91', // Главна нијанса
                  '600': '#4CAE73',
                  '700': '#387E56',
                  '800': '#254F38',
                  '900': '#121F1B',
                },
                
                // --- Алати за поруке ---
                // Success: Зелена за потврде, успешне акције
                'success': '#4BB543',
                // Danger: Црвена за упозорења, грешке, важне поруке
                'danger': '#E74C3C',
                // Warning: Жута за обавештења
                'warning': '#F39C12',
        
                // --- Фонт и позадина ---
                // Позадина је увек бела (већ је подразумевана 'white')
                // Font: Скоро црна боја за бољу читљивост од чисте црне
                'text-default': '#1F2937', 
                // Light Gray: За границе, ивице, позадине секција
                'border-light': '#E5E7EB',
                
              },
        },
    },
    plugins: [],
};
