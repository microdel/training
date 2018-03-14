<?php

namespace App\Transformers;

use App\Models\Make;
use League\Fractal\TransformerAbstract;

/**
 * Converts a make to format for selections in forms.
 */
class MakeSelectionTransformer extends TransformerAbstract
{
    /**
     * Transform.
     *
     * @param Make $make Body type for transforming
     * @return array
     */
    public function transform(Make $make): array
    {
        return [
            'id' => $make->id,
            'name' => $make->name
        ];
    }
}
