<template>
    <div>
        Home page
        {{ auth ? 'YES' : 'NO' }}

        <div v-if="auth">
            <button class="btn btn-default" @click="logout">Logout</button>
        </div>
    </div>
</template>

<script>
  import { mapGetters } from 'vuex';
  import AuthService from 'js/services/AuthService';
  import { AUTHENTICATED_GETTER } from 'js/store/getter-types';

  export default {
    props: {},
    methods: {
      logout() {
        AuthService.logout();
      },
    },
    computed: {
      ...mapGetters({ auth: AUTHENTICATED_GETTER }),
    },
  };
</script>