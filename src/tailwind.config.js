/** @type {import('tailwindcss').Config} */
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
                primary: "#3C8200",

                secondary: "#D1D5DB",

                tertiary: "#888484",

                gray: {
                    normal:  "#4B5563"
                },

                success: "#3C8200",

                warning: "#F6C912",

                danger: {
                    light: "#FDF2F2",
                    normal: "#E60024",
                    dark: "#971D1D",
                },
            },
            fontSize: {
                xxs: "8pt",
            },
            fontFamily: {
                base: ["Inter", "sans-serif"],
            },
            height: {
                100: "28rem",
                128: "32rem",
                144: "36rem",
                160: "40rem",
                192: "48rem",
                224: "56rem",
                240: "60rem",
            },
            width: {
                128: "32rem",
                144: "36rem",
                160: "40rem",
                192: "48rem",
                224: "56rem",
                240: "60rem",
            },
        },
        screens: {
            ss: "500px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            xxl: "1536px",
        },
    },
    plugins: [require("flowbite/plugin")],
};
