// import all pages for our main bundle
import VeeValidate from 'vee-validate';
import Vue from 'vue';
import VueRouter from 'vue-router';
import App from 'vues/layout/app.vue';
import Store from './store/store';
import routes from './routes/routes';
import './utils';

Vue.use(VueRouter);
Vue.use(VeeValidate);

const router = new VueRouter({
  mode: 'history',
  base: window.location.pathName,
  routes,
});

window.vue = new Vue({
  el: '#app',
  store: Store,
  render(h) {
    return h(App);
  },
  router,
});
