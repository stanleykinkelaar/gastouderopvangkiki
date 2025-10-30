import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [`resources/views/**/*`],
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
        host: 'gastouderopvangkiki.test',
        port: 5173,
        hmr: {
            host: 'gastouderopvangkiki.test',
            port: 5173,
        },
    },
});