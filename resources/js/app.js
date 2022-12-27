/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue').default;

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
Vue.component('permissions', require('./Views/Permissions/Permissions').default);
Vue.component('roles', require('./Views/Roles/Roles').default);
Vue.component('users', require('./Views/Users/Users').default);
Vue.component('logs', require('./Views/Logs/Logs').default);
Vue.component('profile', require('./Views/Profile/Profile').default);
Vue.component('password', require('./Views/Password/Password').default);
Vue.component('category', require('./Views/Category/Category').default);
Vue.component('subcategory', require('./Views/SubCategory/SubCategory').default);
Vue.component('coin', require('./Views/Coin/Coin').default);
Vue.component('product', require('./Views/Product/Product').default);
Vue.component('saleproduct', require('./Views/SaleProduct/SaleProduct').default);
Vue.component('order', require('./Views/Order/Order').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});