import router from 'js/routes/router';
import store from 'js/store/store';
import { HOME_PAGE } from '../routes/routes';
import AuthResource from '../http/resources';
import { LOGIN_MUTATION, LOGOUT_MUTATION } from '../store/mutations-types';
import { AUTHENTICATED_GETTER } from '../store/getter-types';

export default {
  authResource: AuthResource,

  login(email, password) {
    return this.authResource.login({ email, password }).then((response) => {
      store.commit(LOGIN_MUTATION, response.body.token);
      router.push(HOME_PAGE);
    });
  },

  logout() {
    store.commit(LOGOUT_MUTATION);
    router.push(HOME_PAGE);
  },

  /**
   * Returns TRUE if the current user is authenticated.
   *
   * @return {boolean}
   */
  isAuthenticated() {
    return store.getters[AUTHENTICATED_GETTER];
  },
};
