import './bootstrap'
import Vue from 'vue'
import App from './App.vue';
import VueRouter from 'vue-router';
import router from './routes/routes';
import store from './store/index'
import GlobalComponents from './GlobalComponents'
import vuetify from './plugins/vuetify'
import 'vue-flash-message/dist/vue-flash-message.min.css';
import Vue2Filters from 'vue2-filters'
import VueFlashMessage from 'vue-flash-message';
import { VueMaskDirective } from 'v-mask'
import '../css/app.css'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';
Vue.component('vue-phone-number-input', VuePhoneNumberInput);



Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(GlobalComponents)
Vue.directive('mask', VueMaskDirective);

Vue.use(VueFlashMessage, {
    messageOptions: {
      timeout: 1000,
      important: true,
      autoEmit: false,
      pauseOnInteract: true
    }
});
Vue.use(VueRouter);
Vue.use(Vue2Filters)
  
const app = new Vue({
    el: '#app',
    router: router,
    store,
    vuetify,
    render: h => h(App),
});