import AuthService from 'js/services/AuthService';
import { LOGIN_PAGE } from '../routes';

/**
 * Redirect user to login page if user is not authorized and page require
 * authorization.
 *
 * @param router
 * @constructor
 */
export default function CheckAccessToRoute(router) {
  router.beforeEach((to, from, next) => {
    if (to.meta.requireLogin && !AuthService.isAuthenticated()) {
      next(LOGIN_PAGE);
    } else {
      next();
    }
  });
}
