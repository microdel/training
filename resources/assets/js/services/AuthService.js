import router from 'js/routes/router';
import store from 'js/store/store';
import { HOME_PAGE } from '../routes/routes';
import { authResource } from '../http/resources';
import { LOGIN_MUTATION, LOGOUT_MUTATION } from '../store/mutations-types';
import { TOKEN_GETTER, AUTHENTICATED_GETTER } from '../store/getter-types';

export default {
  /**
   * Attempt user login.
   *
   * @param {string} email User email
   * @param {string} password User password
   */
  login(email, password) {
    return authResource.login({ email, password }).then((response) => {
      this.saveToken(response.body.token);
      router.push(HOME_PAGE);
    });
  },

  /**
   * Refreshes the auth token.
   */
  refreshToken() {
    return authResource.refreshToken().then((response) => {
      this.saveToken(response.body.token);
      return response.body.token;
    });
  },

  /**
   * User logout.
   */
  logout() {
    authResource.logout().then(() => {
      router.push(HOME_PAGE);
    });
    this.removeToken();
  },

  /**
   * Saves the token to the storage.
   *
   * @param {string} token
   */
  saveToken(token) {
    store.commit(LOGIN_MUTATION, token);
  },

  removeToken() {
    store.commit(LOGOUT_MUTATION);
  },

  /**
   * Returns TRUE if the current user is authenticated.
   *
   * @return {boolean}
   */
  isAuthenticated() {
    return store.getters[AUTHENTICATED_GETTER];
  },

  /**
   * Returns auth token.
   *
   * @return {*}
   */
  getToken() {
    return store.getters[TOKEN_GETTER];
  },
};
