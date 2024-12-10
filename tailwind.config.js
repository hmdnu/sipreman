/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./views/**/*.{php,html,js}"],
    theme: {
        extend: {
            colors: {
                primary: {
                    0: "#FFF",
                    100: "#CEBBEC",
                    200: "#B79CE3",
                    300: "#9E78D9",
                    400: "#8454CE",
                    500: "#6F38C5",
                    600: "#6031AB",
                    700: "#51298F",
                    800: "#412173",
                    900: "#311957",
                },
                secondary: {
                    0: "#FFF",
                    100: "#EDF8F5",
                    200: "#E6E6E6",
                    300: "#D0ECE4",
                    400: "#BEE4DA",
                    500: "#ADDDD0",
                    600: "#93D2C1",
                    700: "#6FC3AC",
                    800: "#49B195",
                    900: "#3C9079",
                },
                tertiary: {
                    0: "#C9D5FD",
                    100: "#BFCDFD",
                    200: "#B5C6FD",
                    300: "#ABBEFC",
                    400: "#A1B6FC",
                    500: "#87A2FB",
                    600: "#3D69FB",
                    700: "#2B5BF8",
                    800: "#083DED",
                    900: "#0733C5",
                },
                neutral: {
                    0: "#FFF",
                    100: "#F5F5F5",
                    200: "#EEEEEE",
                    300: "#D4D4D4",
                    400: "#C8C8C8",
                    500: "#B4B4B4",
                    600: "#959595",
                    700: "#F6F08A",
                    800: "#F65C5C",
                    900: "#303030",
                }

            }
        },
    },
    plugins: [],
}


