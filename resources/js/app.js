// import './bootstrap';
require('./bootstrap');

import { createApp } from 'vue'

import App from './components/Inicio.vue';
import LoadScript from 'vue-plugin-load-script'
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'
import StarRating from 'vue-star-rating'
// importamos Axios
const VueAxios      =   require('vue-axios')
const axios         =   require('axios') 

// importamos y configuramos el router
const VueRouter     =   require('vue-router')
var routes          =   require('./routes')()

const router        =   VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
})

const app           =   createApp(App)
app.component('star-rating', StarRating)
const rootComponent = app.use(router)
                        .use(VueAxios, axios)
                        .use(LoadScript)
                        .use(VueSweetalert2)
                        .mount('#app')
                        