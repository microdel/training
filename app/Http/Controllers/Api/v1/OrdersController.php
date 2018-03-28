<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\CreateOrderRequest;
use Saritasa\Laravel\Controllers\Api\BaseApiController;

/**
 * Class YearsController
 */
class OrdersController extends BaseApiController
{
    /**
     * Creates order.
     *
     * @param CreateOrderRequest $request HTTP Request
     * @return \Dingo\Api\Http\Response
     */
    public function createOrder(CreateOrderRequest $request)
    {
        var_dump($request->getOrderData());
        return $this->response->created();
    }
}
