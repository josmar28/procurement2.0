/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import VueConfirmDialog from 'vue-confirm-dialog'
import Vue           from 'vue'
import Notifications from 'vue-notification'

Vue.use(Notifications)
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)  


Vue.component('app-report-component', require('./components/APPComponent.vue').default); 
Vue.component('prapp-component', require('./components/PrAppComponent.vue').default); 
Vue.component('business-category-component', require('./components/BusiCatComponent.vue').default); 
Vue.component('offices-component', require('./components/OfficeComponent.vue').default); 
Vue.component('signatories-component', require('./components/SignatoriesComponent.vue').default); 
Vue.component('category-component', require('./components/CategoryComponent.vue').default); 
Vue.component('doctype-component', require('./components/DocTypeComponent.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
Vue.component('status-level-component', require('./components/StatusLevelComponent.vue').default);
Vue.component('rfqitb-component', require('./components/RfqItbComponent.vue').default);
Vue.component('procmode-component', require('./components/ProcModeComponent.vue').default);
Vue.component('proctype-inter-component', require('./components/ProcTypeInterComponent.vue').default);
Vue.component('proctype-component', require('./components/ProcTypeComponent.vue').default);
Vue.component('expensecode-component', require('./components/ExpenseCodeComponent.vue').default);
Vue.component('fund-year-component', require('./components/FundYearComponent.vue').default);
Vue.component('fund-type-component', require('./components/FundTypeComponent.vue').default);
Vue.component('fund-source-component', require('./components/FundSourceComponent.vue').default);
Vue.component('supplier-component', require('./components/SupplierComponent.vue').default);
Vue.component('supplies-component', require('./components/SuppliesComponent.vue').default);
Vue.component('draftpr-component', require('./components/DraftprComponent.vue').default); 
Vue.component('prtracking-component', require('./components/PrTrackingComponent.vue').default);
Vue.component('ppmp-component', require('./components/PpmpComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
