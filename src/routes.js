export const createRoutes = () => ([
    {
        path: '/',
        name: 'home',
        component: () => import('@/views/Home.vue'),
    },
])
