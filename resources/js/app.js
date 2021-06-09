/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');






window.Vue = require('vue');


import 'vuejs-datatable/dist/themes/bootstrap-4.esm';
import { VuejsDatatableFactory } from 'vuejs-datatable';


Vue.use( VuejsDatatableFactory );


Vue.component('modal', {
    template: '#modal-template'
})

// global variable
Vue.prototype.$usuarioLogueado = '';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('frmservicio', require('./components/frmservicio.vue').default);
Vue.component('frmsolicitudservicio', require('./components/frmsolicitudservicio.vue').default);
Vue.component('login-component', require('./components/loginComponent.vue').default);
Vue.component('frmmissolicitudes', require('./components/frmmissolicitudes.vue').default);
Vue.component('nombreusuariologueado', require('./components/nombreUsuarioLogueadoComponent.vue').default);
Vue.component('frmespecialidad', require('./components/frmespecialidad.vue').default);
Vue.component('frmpersonal', require('./components/frmpersonal.vue').default);
Vue.component('serviciosasignados', require('./components/serviciosasignados.vue').default);
Vue.component('rechazarasignacion', require('./components/rechazarasignacion.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        menu:0
    }
});




////require('./datatable');