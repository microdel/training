import Vue from 'vue';
import Vuex from 'vuex';
import persistedState from 'vuex-persistedstate';
import state from './state';
import mutations from './mutations';
import getters from './getters';

Vue.use(Vuex);

/**
 * Vuex store object.
 */
const Store = new Vuex.Store({
  state,
  mutations,
  getters,
  plugins: [
    persistedState({
      paths: ['auth'],
    }),
  ],
});

export default Store;
