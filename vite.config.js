import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',   
                    'resources/css/sidebars.css', 'resources/js/sidebars.js',
                    'resources/css/style.css', 'resources/css/main.css',
                    'resources/css/util.css', 'resources/css/cours.js',
            ],
            refresh: true,
        }),
    ],
});
