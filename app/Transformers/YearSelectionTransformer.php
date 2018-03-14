<?php

namespace App\Transformers;

use App\Models\Year;
use League\Fractal\TransformerAbstract;

/**
 * Converts a car year to format for selections in forms.
 */
class YearSelectionTransformer extends TransformerAbstract
{
    /**
     * Transform.
     *
     * @param Year $year Year for transforming
     * @return array
     */
    public function transform(Year $year): array
    {
        return [
            'id' => $year->id,
            'value' => $year->value
        ];
    }
}
