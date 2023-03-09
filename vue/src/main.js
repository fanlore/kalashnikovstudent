import { createApp } from 'vue'
import App from './App.vue'

import store from './store';
import router from './router';

import vClickOutside from "click-outside-vue3"

import VueMyToasts from 'vue-my-toasts'
import MyToast from '../node_modules/vue-my-toasts/dist/toasts/TailwindComponent.vue'


import('preline');

import './index.css'

createApp(App)
  .use(store)
  .use(router)
  .use(vClickOutside)
  .use(VueMyToasts, {
    component: MyToast,
  })
  .mount('#app')
