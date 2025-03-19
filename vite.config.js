import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.min.css',
                'resources/css/bootstrap-select.min.css',
                'resources/css/animate.css',
                'resources/css/bootsnav.css',
                'resources/css/nice-select.css',
                'resources/css/aos.css',
                'resources/css/style.css',
                'resources/css/responsive.css'
            ],
            refresh: true,
        }),
    ],
});
