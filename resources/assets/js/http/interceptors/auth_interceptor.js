import Vue from 'vue';
import AuthService from 'js/services/AuthService';

/**
 * Set Authorization header.
 */
Vue.http.interceptors.push((request, next) => {
  if (AuthService.isAuthenticated()) {
    request.headers.set('Authorization', `Bearer ${AuthService.getToken()}`);
  }
  next();
});

// /**
//  * Refresh token.
//  */
// Vue.http.interceptors.push((request, next) => {
//   next((response) => {
//     if (
//       response && response.status === 401 &&
//       !(
//         request.url === authActions.refreshToken.url &&
//         request.method === authActions.refreshToken.method
//       )
//     ) {
//       return authResource.refreshToken().then((result) => {
//         Store.dispatch(SAVE_TOKEN_ACTION, result.data.token);
//
//         return Vue.http(request).then(data => data);
//       });
//     }
//
//     return response;
//   });
// });

export default {};
