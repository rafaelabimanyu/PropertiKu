import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        {pattern: /bg-(indigo|emerald|violet|amber|blue|red|purple)-(50|100|400|500|600|700|900)/, variants: ['hover','dark']},
        {pattern: /text-(indigo|emerald|violet|amber|blue|red|purple)-(400|500|600|700)/, variants: ['hover','dark']},
        {pattern: /from-(indigo|emerald|violet)-(500|700)/},
        {pattern: /to-(indigo|emerald|violet)-(500|700)/},
        {pattern: /shadow-(indigo|emerald|violet)-(500)/},
        {pattern: /border-(indigo|emerald|violet)-(300)/, variants: ['hover']},
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
