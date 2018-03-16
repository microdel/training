import { bodyTypesResource } from '../http/resources';

export default {
  getAll() {
    return bodyTypesResource.get().then((response) => {
      return response.body.results;
    });
  },
};
