import home from 'vues/pages/home/home.vue';
import form from 'vues/pages/form/form.vue';
import login from 'vues/pages/login/login.vue';

export const HOME_PAGE = '/';
export const FORM_PAGE = '/form';
export const LOGIN_PAGE = '/login';

export default [
  {
    path: HOME_PAGE,
    name: 'home',
    component: home,
  },
  {
    path: FORM_PAGE,
    name: 'form',
    component: form,
  },
  {
    path: LOGIN_PAGE,
    name: 'login',
    component: login,
  },
];
