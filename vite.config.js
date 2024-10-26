import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/edit.scss', // Ensure this points to your SCSS file
                'resources/js/app.js' // If you have a JS file
            ],
            refresh: true,
        }),
    ],
});
