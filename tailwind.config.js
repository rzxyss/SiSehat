import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                montserrat: ["Montserrat", "serif"],
            },
        },
        colors: {
            transparent: "transparent",
            primary: "#4CAF4F",
            secondary: "#263238",
            shade1: "#43A046",
            shade2: "#388E3B",
            shade3: "#237D31",
            shade4: "#1B5E1F",
            shade5: "#103E13",
            warning: "#FBC02D",
            error: "#E53835",
            success: "#2E7D31",
            info: "#2194f3",
            white: "#FFFFFF",
            ngrey: "#89939E",
        },
    },

    plugins: [forms],
};
