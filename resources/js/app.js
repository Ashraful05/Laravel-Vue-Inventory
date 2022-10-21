require('./bootstrap');

// window.Vue = require('vue').default;

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//imported route..
import {routes} from './routes';

//import user class...
import User from './Helpers/User';
Window.User = User;

const router = new VueRouter({
    routes,
    mode:'history'
})

const app = new Vue({
    el: '#app',
    router
});
