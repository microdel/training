<template>
    <div class="row">
        <div class="col-md-2">
            <label for="vin">VIN</label>
            <input v-model="form.vin" class="form-control" id="vin" placeholder="VIN">
        </div>
        <div class="col-md-2">
            <label for="body-type">Body Type</label>
            <select class="form-control" id="body-type">
                <option v-for="type in bodyTypes" value="type.id">{{ type.name }}</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="make">Make</label>
            <select class="form-control" id="make"></select>
        </div>
        <div class="col-md-2">
            <label for="model">Model</label>
            <select class="form-control" id="model"></select>
        </div>
        <div class="col-md-2">
            <label for="year">Year</label>
            <select class="form-control" id="year"></select>
        </div>
        <div class="col-md-2">
            <label for="trim">Trim</label>
            <select class="form-control" id="trim"></select>
        </div>
        <button @click="test">test</button>
    </div>
</template>

<script>
  import BodyTypesService from 'js/services/BodyTypesService';

  export default {
    props: {},
    data() {
      return {
        bodyTypes: [],
        form: {
          vin: 'asdasdasd',
          bodyType: null,
          make: null,
          model: null,
          year: null,
          trim: null,
        },
      };
    },
    created() {
      this.loadBodyTypes();
    },
    methods: {
      test() {
        console.log(this.form);
      },
      /**
       * re
       */
      loadBodyTypes() {
        BodyTypesService.getAll().then((bodyTypes) => {
          this.bodyTypes = bodyTypes;
        });
      },
    },
  };
</script>