import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import path from 'path';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
        tailwindcss(),
    ],
    build: {
        outDir: './public',
        emptyOutDir: false,
        manifest: 'manifest.json',
        // Simplified build without manual chunks for now
        rollupOptions: {
            output: {
                entryFileNames: 'js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    const info = assetInfo.name.split('.');
                    const ext = info[info.length - 1];
                    if (/\.(css)$/.test(assetInfo.name)) {
                        return `css/[name]-[hash].${ext}`;
                    }
                    if (/\.(png|jpe?g|gif|svg|webp|ico)$/.test(assetInfo.name)) {
                        return `images/[name]-[hash].${ext}`;
                    }
                    if (/\.(woff2?|eot|ttf|otf)$/.test(assetInfo.name)) {
                        return `fonts/[name]-[hash].${ext}`;
                    }
                    return `assets/[name]-[hash].${ext}`;
                }
            }
        },
        minify: 'terser',
        sourcemap: true,
        target: 'es2015',
        cssCodeSplit: true,
        assetsInlineLimit: 4096
    },
    server: {
        hmr: {
            host: 'localhost'
        }
    },
});
