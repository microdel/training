import { TOKEN_GETTER, AUTHENTICATED_GETTER } from './getter-types';

export default {
  /**
   * Returns auth.token.
   */
  [TOKEN_GETTER]: state => state.auth.token,

  /**
   * Returns true if user is authenticated.
   */
  [AUTHENTICATED_GETTER]: state => state.auth.authenticated,
};
