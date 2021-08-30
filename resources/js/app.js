/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Vue.component('app', require('./components/App').default);
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuelidate from 'vuelidate'

Vue.use(VueRouter)
Vue.use(Vuelidate)

import App from './components/App'
import Home from './components/Home'
import About from './components/About'
import Desks from './components/desks/Desks'
import ShowDesk from './components/desks/ShowDesk'


const router = new VueRouter({
	mode: 'history',
	routes:[
        {
          path: '/trello/home',
          name: 'home',
          component: Home
        },
        {
          path: '/trello/desks',
          name: 'desks',
          component: Desks
        },
        {
          path: '/trello/desks/:deskId',
          name: 'showDesk',
          component: ShowDesk,
          props: true
        },
	]

})

const ap = new Vue({
	el: '#app',
    components: {App},
    router
})

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
