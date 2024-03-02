import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import svgLoader from 'vite-svg-loader'
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vue(),
        svgLoader(),
        laravel({
            input: ['resources/sass/styles.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
});