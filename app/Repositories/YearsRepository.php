<?php

namespace App\Repositories;

use App\Models\CarModel;
use App\Models\Trim;
use App\Models\Year;
use Illuminate\Support\Collection;
use Saritasa\Repositories\Base\Repository;

/**
 * Abstract storage of car years.
 */
class YearsRepository extends Repository
{
    protected $modelClass = Year::class;

    /**
     * Returns years by the car model.
     *
     * @param CarModel $model The car mode for filtering
     * @return Collection
     */
    public function findByCarModel(CarModel $model): Collection
    {
        return $this->query()
            ->select(['years.*'])
            ->leftJoin('trims as t', 't.' . Trim::ID, '=', 'years.' . Year::TRIM_ID)
            ->where('t.' . Trim::CAR_MODEL_ID, '=', $model->id)
            ->get();
    }
}
