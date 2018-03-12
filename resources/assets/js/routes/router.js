import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import middleware from './middleware';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  base: window.location.pathName,
  routes,
});

middleware(router);

export default router;
