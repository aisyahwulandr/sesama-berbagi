//import vue router
import { createRouter, createWebHistory } from 'vue-router';

//define a routes
const routes = [
    // General routes
    {
        path: '/',
        name: 'Home',
        component: () => import('@/views/Home.vue')
    },
    {
        path: '/donation',
        name: 'Donation',
        component: () => import('@/views/Donation.vue')
    },
    {
        // path: '/program/:id',
        path: '/program',
        name: 'DetailProgram',
        component: () => import('@/views/DetailProgram.vue')
    },
    {
        path: '/about',
        name: 'About',
        component: () => import('@/views/About.vue')
    },
    {
        path: '/contact',
        name: 'Contact',
        component: () => import('@/views/Contact.vue')
    },

    // Posts module
    {
        path: '/posts',
        children: [
            {
                path: '',
                name: 'posts.index',
                component: () => import('@/views/posts/index.vue')
            },
            {
                path: 'create',
                name: 'posts.create',
                component: () => import('@/views/posts/create.vue')
            },
            {
                path: 'edit/:id',
                name: 'posts.edit',
                component: () => import('@/views/posts/edit.vue')
            }
        ]
    }
];

//create router
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;