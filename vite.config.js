import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/app-dashboard.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,

            // reload the page when the view of each module changes
            hmr: {
                host: 'localhost',
                port: 3000,
            }
        }),
    ],
});
