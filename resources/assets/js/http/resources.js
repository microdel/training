import Vue from 'vue';
import VueResource from 'vue-resource';
import config from '../config';

Vue.use(VueResource);
Vue.http.options.root = config.api.url;

// Auth resources
const authResource = Vue.resource('auth', {}, {
  login: { method: 'POST', url: 'auth' },
  logout: { method: 'DELETE', url: 'auth' },
  refreshToken: { method: 'PUT', url: 'auth' },
  resetPassword: { method: 'POST', url: 'auth/password/reset' },
  confirmResetPassword: { method: 'PUT', url: 'auth/password/reset' },
  setPassword: { method: 'PUT', url: 'auth/password' },
});

const bodyTypesResource = Vue.resource('dictionaries/body-types');

export {
  authResource,
  bodyTypesResource,
};
