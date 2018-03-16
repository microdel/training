<template>
    <div>
        <page-form></page-form>

        <div class="row mt10">
            <div class="col-md-12">
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</template>

<script>
  import PageForm from './form.vue';

  export default {
    components: {
      PageForm,
    },
    props: {},
    methods: {},
  };
</script>