<?php

namespace App\Transformers;

use App\Models\Trim;
use League\Fractal\TransformerAbstract;

/**
 * Converts a trim to format for selections in forms.
 */
class TrimSelectionTransformer extends TransformerAbstract
{
    /**
     * Transform.
     *
     * @param Trim $trim Trim for transforming
     * @return array
     */
    public function transform(Trim $trim): array
    {
        return [
            'id' => $trim->id,
            'name' => $trim->name,
        ];
    }
}
