<template>
    <div class="row">
        <div class="col-md-2" :class="{'has-error': errors.has('vin')}">
            <label for="vin">VIN</label>
            <input v-model="form.vin"
                   v-validate="'required|min:17|max:17|regex:^[A-Z0-9]{17}$'"
                   name="vin"
                   data-vv-as="VIN"
                   class="form-control"
                   id="vin"
                   placeholder="VIN"
            >
            <span v-if="errors.has('vin')" class="help-block">
                {{ errors.first('vin') }}
            </span>
        </div>
        <div class="col-md-2" :class="{'has-error': errors.has('body-type')}">
            <label for="body-type">Body Type</label>
            <select v-model="form.bodyType"
                    v-validate="'required'"
                    name="body-type"
                    data-vv-as="Body Type"
                    class="form-control"
                    id="body-type"
            >
                <option :value="null">- Select -</option>
                <option v-for="type in bodyTypes" :value="type.id">{{ type.name }}</option>
            </select>
            <span v-if="errors.has('body-type')" class="help-block">
                {{ errors.first('body-type') }}
            </span>
        </div>
        <div class="col-md-2" :class="{'has-error': errors.has('make')}">
            <label for="make">Make</label>
            <select v-model="form.make"
                    class="form-control"
                    id="make"
                    v-validate="'required'"
                    name="make"
                    data-vv-as="Make"
            >
                <option :value="null">- Select -</option>
                <option v-for="make in makes" :value="make.id">{{ make.name }}</option>
            </select>
            <span v-if="errors.has('make')" class="help-block">
                {{ errors.first('make') }}
            </span>
        </div>
        <div class="col-md-2" :class="{'has-error': errors.has('model')}">
            <label for="model">Model</label>
            <select v-model="form.model"
                    class="form-control"
                    id="model"
                    v-validate="'required'"
                    name="model"
                    data-vv-as="Model"
            >
                <option :value="null">- Select -</option>
                <option v-for="model in models" :value="model.id">{{ model.name }}</option>
            </select>
            <span v-if="errors.has('model')" class="help-block">
                {{ errors.first('model') }}
            </span>
        </div>
        <div class="col-md-2" :class="{'has-error': errors.has('year')}">
            <label for="year">Year</label>
            <select v-model="form.year"
                    class="form-control"
                    id="year"
                    v-validate="'required'"
                    name="year"
                    data-vv-as="Year"
            >
                <option :value="null">- Select -</option>
                <option v-for="year in years" :value="year.id">{{ year.value }}</option>
            </select>
            <span v-if="errors.has('year')" class="help-block">
                {{ errors.first('year') }}
            </span>
        </div>
        <div class="col-md-2" :class="{'has-error': errors.has('trim')}">
            <label for="trim">Trim</label>
            <select v-model="form.trim"
                    class="form-control"
                    id="trim"
                    v-validate="'required'"
                    name="trim"
                    data-vv-as="Trim"
            >
                <option :value="null">- Select -</option>
                <option v-for="trim in trims" :value="trim.id">{{ trim.name }}</option>
            </select>
            <span v-if="errors.has('trim')" class="help-block">
                {{ errors.first('trim') }}
            </span>
        </div>
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
      this.validate();
    },
    methods: {
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
      validate() {
        return this.$validator.validate();
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
    computed: {
      formData() {
        return this.form;
      },
    },
  };
</script>