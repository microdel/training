<template>
    <div class="app">
        <navbar></navbar>

        <!-- Begin page content -->
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
  import Navbar from 'vues/components/Navbar/Navbar.vue';

  export default {
    components: {
      Navbar,
    },
    props: {},
    methods: {},
  };
</script>

<style>
    .app {
        width: 100%;
    }
</style>