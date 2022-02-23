const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/Pages/**/*.vue',
        './resources/js/Pages/**/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'brand-primary': {
                    DEFAULT: '#0DB3E9',
                    '50': '#C9EFFC',
                    '100': '#B3E9FB',
                    '200': '#87DDF8',
                    '300': '#5CD0F6',
                    '400': '#30C4F3',
                    '500': '#0DB3E9',
                    '600': '#0B92BE',
                    '700': '#087092',
                    '800': '#064F67',
                    '900': '#032D3B'
                },
                'brand-secondary': {
                    DEFAULT: '#FDA813',
                    '50': '#FFEBC9',
                    '100': '#FEE4B5',
                    '200': '#FED58C',
                    '300': '#FEC664',
                    '400': '#FDB73B',
                    '500': '#FDA813',
                    '600': '#E59302',
                    '700': '#BD7902',
                    '800': '#945F01',
                    '900': '#6C4501'
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
