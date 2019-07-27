import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/views/Home';
import CategoryProducts from '@/js/views/CategoryProducts';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/category/:id/products',
            name: 'category.products',
            component: CategoryProducts,
        },
    ]
});

export default router;
