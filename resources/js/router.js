import Vue from 'vue';
import VueRouter from 'vue-router';

import Category from './components/CategoryComponent.vue'
// import Home from './pages/Home.vue';
// import About from './pages/About.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [{
        path: '/like',
        name: 'category',
        component: Category,
    }, ]
});
export default router;