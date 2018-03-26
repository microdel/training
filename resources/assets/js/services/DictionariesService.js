import {
  bodyTypesResource, makesResource,
  modelsResource, yearsResource, trimsResource,
} from '../http/resources';

export default {
  /**
   * Returns all body types.
   */
  getBodyTypes() {
    return bodyTypesResource.get().then(response => response.body.results);
  },
  /**
   * Returns all makes.
   */
  getMakes() {
    return makesResource.get().then(response => response.body.results);
  },
  /**
   * Returns the car models by make.
   * @param { number } makeId Make id
   */
  getModelsByMake(makeId) {
    return modelsResource.get({ makeId }).then(res => res.body.results);
  },
  getYearsByModel(modelId) {
    return yearsResource.get({ modelId }).then(res => res.body.results);
  },
  getTrimsByYear(yearId) {
    return trimsResource.get({ yearId }).then(res => res.body.results);
  },
};
