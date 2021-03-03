import Vue from 'vue'

require('./bootstrap');

window.Vue = Vue;
import VueRouter from 'vue-router'
import routes from './router/index'
import VueProgressBar from 'vue-progressbar'

// Vprogressbar
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
  }
  
  Vue.use(VueProgressBar, options)

// Vue router
Vue.use(VueRouter)
const router = new VueRouter({
    routes,
    mode: 'history'
})


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
