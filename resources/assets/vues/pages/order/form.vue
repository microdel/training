<template>
    <div class="row">
        <div class="col-md-2">
            <label for="vin">VIN</label>
            <input v-model="form.vin" class="form-control" id="vin" placeholder="VIN">
        </div>
        <div class="col-md-2">
            <label for="body-type">Body Type</label>
            <select v-model="form.bodyType" class="form-control" id="body-type">
                <option :value="null">- Select -</option>
                <option v-for="type in bodyTypes" :value="type.id">{{ type.name }}</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="make">Make</label>
            <select v-model="form.make" class="form-control" id="make">
                <option :value="null">- Select -</option>
                <option v-for="make in makes" :value="make.id">{{ make.name }}</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="model">Model</label>
            <select v-model="form.model" class="form-control" id="model">
                <option :value="null">- Select -</option>
                <option v-for="model in models" :value="model.id">{{ model.name }}</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="year">Year</label>
            <select v-model="form.year" class="form-control" id="year">
                <option :value="null">- Select -</option>
                <option v-for="year in years" :value="year.id">{{ year.value }}</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="trim">Trim</label>
            <select v-model="form.trim" class="form-control" id="trim">
                <option :value="null">- Select -</option>
                <option v-for="trim in trims" :value="trim.id">{{ trim.name }}</option>
            </select>
        </div>
        <button @click="test">test</button>
    </div>
</template>

<script>
  import DictionariesService from 'js/services/DictionariesService';

  export default {
    props: {},
    data() {
      return {
        bodyTypes: [],
        makes: [],
        models: [],
        years: [],
        trims: [],
        form: {
          vin: '',
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
      this.loadMakes();
    },
    methods: {
      test() {
        console.log(this.form);
      },
      /**
       * Loads body types in the form.
       */
      loadBodyTypes() {
        DictionariesService.getBodyTypes().then((bodyTypes) => {
          this.bodyTypes = bodyTypes;
        });
      },
      /**
       * Loads makes.
       */
      loadMakes() {
        DictionariesService.getMakes().then((makes) => {
          this.makes = makes;
        });
      },
      loadModels(makeId) {
        if (makeId) {
          DictionariesService.getModelsByMake(makeId).then((models) => {
            this.models = models;
          });
        } else {
          this.models = [];
        }
      },
      loadYears(modelId) {
        if (modelId) {
          DictionariesService.getYearsByModel(modelId).then((years) => {
            this.years = years;
          });
        } else {
          this.years = [];
        }
      },
      loadTrims(yearId) {
        if (yearId) {
          DictionariesService.getTrimsByYear(yearId).then((trims) => {
            this.trims = trims;
          });
        } else {
          this.trims = [];
        }
      },
    },
    /* eslint func-names: ["error", "as-needed"] */
    watch: {
      'form.make': function (makeId) {
        this.form.model = null;
        this.loadModels(makeId);
      },
      'form.model': function (modelId) {
        this.form.year = null;
        this.loadYears(modelId);
      },
      'form.year': function (yearId) {
        this.form.trim = null;
        this.loadTrims(yearId);
      },
    },
  };
</script>