import { defineConfig } from 'vite';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/custom-modal.js',
                'resources/js/diagramador.js',
                'resources/js/diagramador.js',
                'resources/js/modal-link.js',
                'resources/js/socket-client.js'
            ],
            refresh: [
                'app/Livewire/**',
            ],
        }),
    ],
});
