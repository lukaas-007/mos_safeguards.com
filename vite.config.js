import { defineConfig } from 'vite';
import fs from 'fs';
import laravel from 'laravel-vite-plugin';

const cssFiles = fs.readdirSync('resources/css')
    .filter(file => file.endsWith('.css'))
    .map(file => `resources/css/${file}`);

export default defineConfig({
    plugins: [laravel({
        input: ['resources/js/app.js', ...cssFiles],
        refresh: true,
    })]
});
