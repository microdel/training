import home from 'vues/pages/home/home.vue';
import order from 'vues/pages/order/order.vue';
import login from 'vues/pages/login/login.vue';

export const HOME_PAGE = '/';
export const ORDER_PAGE = '/order';
export const LOGIN_PAGE = '/login';

export default [
  {
    path: HOME_PAGE,
    name: 'home',
    component: home,
  },
  {
    path: ORDER_PAGE,
    name: 'order',
    component: order,
    meta: {
      requireLogin: true,
    },
  },
  {
    path: LOGIN_PAGE,
    name: 'login',
    component: login,
  },
];
