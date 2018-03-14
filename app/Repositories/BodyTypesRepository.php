<?php

namespace App\Repositories;

use App\Models\BodyType;
use Saritasa\Repositories\Base\Repository;

/**
 * The abstract storage of body types.
 */
class BodyTypesRepository extends Repository
{
    protected $modelClass = BodyType::class;
}
