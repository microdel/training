import HTTP from './../http/http-common';

class AuthService {
  constructor(http) {
    this.http = http;
  }

  login(email, password, rememberMe) {
    return this.http.request({
      url: '/test',
      method: 'post',
      data: { email, password, rememberMe },
    }).then(() => {
      console.log('tesssssss');
    });
  }
}

export default new AuthService(HTTP);
