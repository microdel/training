<?php

namespace App\Transformers;

use App\Models\CarModel;
use League\Fractal\TransformerAbstract;

/**
 * Converts a model to format for selections in forms.
 */
class CarModelSelectionTransformer extends TransformerAbstract
{
    /**
     * Transform.
     *
     * @param CarModel $make Car model for transforming
     * @return array
     */
    public function transform(CarModel $make): array
    {
        return [
            'id' => $make->id,
            'name' => $make->name
        ];
    }
}
