<?php

namespace App\Repositories;

use App\Models\Make;
use Saritasa\Repositories\Base\Repository;

/**
 * The abstract storage of makes.
 */
class MakesRepository extends Repository
{
    protected $modelClass = Make::class;
}
