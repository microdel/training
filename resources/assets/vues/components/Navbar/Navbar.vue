<template>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <router-link tag="li" active-class="active" :to="{ name: 'home' }" exact>
                        <a>Home</a>
                    </router-link>

                    <router-link tag="li" active-class="active" :to="{ name: 'form' }" exact>
                        <a>Form</a>
                    </router-link>

                    <template v-if="!isAuth">
                        <router-link tag="li" active-class="active" :to="{ name: 'login' }" exact>
                            <a>Login</a>
                        </router-link>
                    </template>
                    <template v-else>
                        <li><a href="javascript:;" @click="logout">Logout</a></li>
                    </template>
                </ul>

            </div>
        </div>
    </nav>
</template>

<script>
  import AuthService from 'js/services/AuthService';

  export default {
    props: {},
    methods: {
      logout() {
        AuthService.logout();
      },
    },
    computed: {
      isAuth() {
        return AuthService.isAuthenticated();
      },
    },
  };
</script>
