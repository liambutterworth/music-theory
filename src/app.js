import '@/assets/app.css'

import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import { createRoutes } from '@/routes.js'

import App from '@/components/App.vue'

const app = createApp(App)

app.use(createRouter({
    history: createWebHistory('app'),
    routes: createRoutes(),
}))

app.mount('#app')
