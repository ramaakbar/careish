const colors = require("tailwindcss/colors");
const { fontFamily } = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./resources/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: {
                    500: "#504BE5",
                },
                success: colors.green,
                warning: colors.yellow,
            },
            backgroundImage: {
                elder: "asset('/assets/elder.png')",
            },
        },
        fontFamily: {
            sans: ["Inter", ...fontFamily.sans],
            serif: ["serif"],
        },
        dropShadow: {
            xl: "0 15px 15px #00000040",
        },
        screens: {
            xs: "400px",
            sm: "640px",
            md: "768px",
            mymd: "962px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
    },
    plugins: [
        require("flowbite/plugin"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
