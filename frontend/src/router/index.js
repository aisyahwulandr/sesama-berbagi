//import vue router
import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue';
import Donation from '@/views/Donation.vue';

//define a routes
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/donataion',
        name: 'Donation',
        component: Donation,
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
    {
        path: '/posts',
        name: 'posts.index',
        component: () => import('../views/posts/index.vue')
    },
    {
        path: '/create',
        name: 'posts.create',
        component: () => import('../views/posts/create.vue')
    },
    {
        path: '/edit/:id',
        name: 'posts.edit',
        component: () => import('../views/posts/edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes // <-- routes,
})

export default router