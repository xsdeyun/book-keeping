import Vue from 'vue'
import App from './App.vue'
import "./assets/main.css"
import './pulings/element-ui'
import './components'
import router from './router'
import './router/permission.js'
import store from './store'
import ApiRequest from './api/request'
import VueParticles from 'vue-particles'  
Vue.use(VueParticles)

Vue.prototype.$request = ApiRequest;

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
