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
            fontFamily: {
                // Body & UI. Plus Jakarta Sans dirancang di Jakarta — pas untuk
                // institusi Indonesia, modern, dan berkarakter tanpa berlebihan.
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                display: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                // Tangga navy diambil dari palet React (pixel-sampled).
                // DEFAULT dipakai sebagai warna header utama.
                navy: {
                    DEFAULT: '#1b3a82', // header utama
                    dark: '#0f2452',    // kompatibel dgn kelas lama `bg-navy-dark`
                    950: '#0a192f',     // paling gelap: hero base & footer
                    900: '#0f2452',     // top-bar universitas
                    800: '#11244d',     // drawer mobile
                    700: '#152c6e',
                    600: '#1b3879',
                    500: '#1c398e',     // navy brand awal (masih tersedia)
                },
                // Aksen emas — bintang dari desain React.
                gold: {
                    DEFAULT: '#fbbf24', // = amber-400
                    light: '#fcd34d',   // = amber-300
                    dark: '#f59e0b',    // = amber-500
                    deep: '#d97706',    // = amber-600
                },
                // Dipertahankan agar halaman lama yg pakai `maroon` tidak rusak.
                maroon: {
                    DEFAULT: '#800000',
                    dark: '#5c0000',
                },
            },

            boxShadow: {
                'gold': '0 4px 14px 0 rgba(251, 191, 36, 0.35)',
                'card': '0 1px 3px 0 rgba(15, 36, 82, 0.08), 0 1px 2px -1px rgba(15, 36, 82, 0.10)',
                'card-hover': '0 12px 28px -6px rgba(15, 36, 82, 0.22)',
            },

            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                scaleUp: {
                    '0%': { opacity: '0', transform: 'scale(0.95)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(100%)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                marquee: {
                    '0%': { transform: 'translateX(100%)' },
                    '100%': { transform: 'translateX(-100%)' },
                },
            },

            animation: {
                fadeIn: 'fadeIn 0.25s ease-out forwards',
                scaleUp: 'scaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                slideUp: 'slideUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                marquee: 'marquee 25s linear infinite',
            },
        },
    },

    plugins: [forms],
};
