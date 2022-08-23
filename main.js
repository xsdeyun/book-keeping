import App from './App'

import request from 'common/request.js'
Vue.prototype.$request = request;

import tabbar from 'components/tabbar.vue';
Vue.component("tab-bar",tabbar)
import Daiog from 'components/Daiog.vue';
Vue.component("fate-Daiog",Daiog)

// #ifndef VUE3
import Vue from 'vue'
Vue.config.productionTip = false
App.mpType = 'app'
const app = new Vue({
    ...App
})
app.$mount()
// #endif

// #ifdef VUE3
import { createSSRApp } from 'vue'
export function createApp() {
  const app = createSSRApp(App)
  return {
    app
  }
}
// #endif