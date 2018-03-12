<template>
    <div>
        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" v-model="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" v-model="password" class="form-control" id="inputPassword"
                           placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input v-model="rememberMe" type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button @click="sendRequest" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import AuthService from 'js/services/AuthService';

  export default {
    props: {},
    data() {
      return {
        email: '',
        password: '',
        rememberMe: false,
      };
    },
    methods: {
      sendRequest() {
        AuthService.login(this.email, this.password);
      },
    },
    computed: {},
  };
</script>