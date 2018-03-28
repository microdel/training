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
  import OrdersService from 'js/services/OrdersService';
  import AuthService from 'js/services/AuthService';
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
            const data = form.formData;

            OrdersService.createOrder({
              vin: data.vin,
              body_type_id: data.bodyType,
              make_id: data.make,
              model_id: data.model,
              year_id: data.year,
              trim_id: data.trim,
            });
          }
        });
      },
      refreshToken() {
        AuthService.refreshToken();
      },
    },
  };
</script>