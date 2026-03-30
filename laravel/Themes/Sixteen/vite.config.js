import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

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
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor-core': ['alpinejs'],
                    'vendor-ui': ['bootstrap-italia'],
                },
                chunkFileNames: 'js/[name]-[hash].js',
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
                },
            },
        },
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
                pure_funcs: ['console.log', 'console.info', 'console.debug', 'console.warn'],
            },
            mangle: {
                safari10: true,
            },
        },
        sourcemap: false,
        target: 'es2015',
        cssCodeSplit: true,
        assetsInlineLimit: 4096,
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    optimizeDeps: {
        include: [
            'alpinejs',
            'bootstrap-italia',
        ],
    },
});
