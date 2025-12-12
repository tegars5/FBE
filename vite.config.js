import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/dashboard.css",
                "resources/css/style.css",
                "resources/sass/app.scss",
                "resources/css/style.css",
                "resources/css/dashboard.css",
                "resources/js/app.js",
                "resources/js/main.js",
            ],
            refresh: true,
        }),
    ],
});
