import { defineConfig } from 'vite'
import path from 'path'
import vue from '@vitejs/plugin-vue'
import components from 'unplugin-vue-components/vite'

export default defineConfig({
    plugins: [
        vue(),

        components({
            dirs: [
                'src/components',
            ],

            extensions: [
                'vue',
            ],
        }),
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, '/src'),
        }
    }
})
