
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue');

import Vue from 'vue';
import Vuetify from 'vuetify';

import Routes from '@/js/routes.js';
import App from '@/js/views/App';

Vue.use(Vuetify);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('TreeMenu', require('./components/TreeMenu.vue'));

const app = new Vue({
    el: '#app',
    router: Routes,
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi', // default - only for display purposes
        },
    }),
    render: h => h(App)

});

export default app;
