<template>
    <div>
        <page-form ref="form"></page-form>

        <div class="row mt10">
            <div class="col-md-12">
                <button class="btn btn-primary" @click="sendForm">Send</button>
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
    methods: {
      sendForm() {
        const { form } = this.$refs;

        form.validate().then((valid) => {
          if (valid) {
            console.log(form.formData);
          }
        });
      },
    },
  };
</script>