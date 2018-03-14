<?php

namespace App\Transformers;

use App\Models\BodyType;
use League\Fractal\TransformerAbstract;

/**
 * Converts a body type to format for selections in forms.
 */
class BodyTypeSelectionTransformer extends TransformerAbstract
{
    /**
     * Transform.
     *
     * @param BodyType $bodyType Body type for transforming
     * @return array
     */
    public function transform(BodyType $bodyType): array
    {
        return [
            'id' => $bodyType->id,
            'name' => $bodyType->name
        ];
    }
}
