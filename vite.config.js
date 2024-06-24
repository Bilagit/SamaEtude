import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',   
                    'resources/css/sidebars.css', 'resources/js/sidebars.js',
            ],
            refresh: true,
        }),
    ],
});
