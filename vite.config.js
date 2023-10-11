import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/app-dashboard.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/app.tsx',
            ],
            ssr: 'resources/js/ssr.tsx',
            refresh: true,

            // reload the page when the view of each module changes
            hmr: {
                host: 'localhost',
                port: 3000,
            }
        }),
        react(),
    ],
});
