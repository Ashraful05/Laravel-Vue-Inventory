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

//sweet alert start......
import Swal from 'sweetalert2';
Window.Swal = Swal;

//noti- notification start...
import Notification from "./Helpers/Notification";
window.Notification = Notification;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

const router = new VueRouter({
    routes,
    mode:'history'
})

const app = new Vue({
    el: '#app',
    router
});
