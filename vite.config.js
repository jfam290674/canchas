import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.tsx', 'resources/css/app.css'],
            refresh: true,
        }),
        react(),
    ],
    build: {
        outDir: 'public/build',
        assetsDir: 'assets',
    },
    server: {
        origin: 'https://ecupadel.nexosdelecuador.com/public',
    },
});
