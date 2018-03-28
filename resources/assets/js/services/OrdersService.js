import { ordersResource } from '../http/resources';

export default {
  /**
   * Creates the order.
   *
   * @param {object} orderData
   */
  createOrder(orderData) {
    return ordersResource.save(orderData).then((response) => {
      console.log(response);
    });
  },
};
