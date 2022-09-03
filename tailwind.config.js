const colors = require("tailwindcss/colors");
const { fontFamily } = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./node_modules/flowbite/**/*.js"],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
            backgroundImage:{
                'elder': "asset('/assets/elder.png')"
            }
        },
        fontFamily: {
            sans: ["Inter", ...fontFamily.sans],
            serif: ["serif"],
        },
    },
    plugins: [require("flowbite/plugin")]
}
