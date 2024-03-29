import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: "localhost",
        },
        watch: {
            usePolling: true,
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/flowbite.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            external: ["jquery"],
            output: {
                globals: {
                    jquery: "$",
                },
            },
        },
    },
    resolve: {
        alias: {
            "@": "/resources/js",
        },
    },
});
