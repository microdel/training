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
const makesResource = Vue.resource('dictionaries/makes');
const modelsResource = Vue.resource('dictionaries/makes{/makeId}/models');
const yearsResource = Vue.resource('dictionaries/models{/modelId}/years');
const trimsResource = Vue.resource('dictionaries/years{/yearId}/trims');

export {
  authResource,
  bodyTypesResource,
  makesResource,
  modelsResource,
  yearsResource,
  trimsResource,
};
