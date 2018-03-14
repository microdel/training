<?php

namespace App\Repositories;

use App\Models\CarModel;
use App\Models\Trim;
use App\Models\Year;
use Illuminate\Support\Collection;
use Saritasa\Repositories\Base\Repository;

/**
 * Abstract storage of trims.
 */
class TrimsRepository extends Repository
{
    protected $modelClass = Trim::class;

    /**
     * Returns trims by the car model and year.
     *
     * @param CarModel $model The car model for filtering
     * @param Year $year The year for filtering
     * @return Collection
     */
    public function findByCarModelAndYear(CarModel $model, Year $year): Collection
    {
        return $this->query()
            ->select(['trims.*'])
            ->leftJoin('years as y', 'trims.' . Trim::ID, '=', 'y.' . Year::TRIM_ID)
            ->where('trims.' . Trim::CAR_MODEL_ID, '=', $model->id)
            ->where('y.' . Year::VALUE, '=', $year->value)
            ->get();
    }
}
