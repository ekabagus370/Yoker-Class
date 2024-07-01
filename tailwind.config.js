/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        fontFamily: {
            'body': ['Poppins', 'Roboto', 'sans-serif']
        },
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
