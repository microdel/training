// import all pages for our main bundle
import VeeValidate from 'vee-validate';
import Vue from 'vue';
import App from 'vues/layout/app.vue';
import Store from './store/store';
import router from './routes/router';
import './utils';

Vue.use(VeeValidate);

window.vue = new Vue({
  el: '#app',
  store: Store,
  render(h) {
    return h(App);
  },
  router,
});
