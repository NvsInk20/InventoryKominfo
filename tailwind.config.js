/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme"); // Impor defaultTheme
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                biru: "#3489D2",
                merah: "#dc2626",
            },
            width: {
                85: "85rem",
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            // Menambahkan customisasi tema jika diperlukan di sini
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"), // Plugin forms dari TailwindCSS
        require("flowbite/plugin"),
    ],
};
