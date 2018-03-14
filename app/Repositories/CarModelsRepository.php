<?php

namespace App\Repositories;

use App\Models\CarModel;
use Saritasa\Repositories\Base\Repository;

/**
 * Abstract storage of car models.
 */
class CarModelsRepository extends Repository
{
    protected $modelClass = CarModel::class;
}
