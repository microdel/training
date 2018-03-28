<?php

namespace App\Http\Requests;

use App\Models\Dto\OrderData\OrderData;
use Saritasa\Laravel\Validation\Rule;

/**
 * Request for the creating order.
 * Contains the information for creating order.
 */
class CreateOrderRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'vin' => Rule::required()->string()->toString(),
            'body_type_id' => Rule::required()->int()->toString(),
            'make_id' => Rule::required()->int()->toString(),
            'model_id' => Rule::required()->int()->toString(),
            'year_id' => Rule::required()->int()->toString(),
            'trim_id' => Rule::required()->int()->toString()
        ];
    }

    /**
     * Returns the order data.
     *
     * @return OrderData
     */
    public function getOrderData(): OrderData
    {
        return new OrderData($this->only([
            'vin',
            'body_type_id',
            'make_id',
            'model_id',
            'year_id',
            'trim_id'
        ]));
    }
}
