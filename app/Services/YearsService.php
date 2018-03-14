<?php

namespace App\Services;

use App\Models\CarModel;
use App\Models\Year;
use App\Repositories\YearsRepository;
use Illuminate\Support\Collection;

/**
 * Business-logic service of car years.
 */
class YearsService
{
    /**
     * Abstract storage of car years.
     *
     * @var YearsRepository
     */
    protected $yearsRepository;

    /**
     * YearsService constructor.
     *
     * @param YearsRepository $yearsRepository Abstract storage of car years
     */
    public function __construct(YearsRepository $yearsRepository)
    {
        $this->yearsRepository = $yearsRepository;
    }

    /**
     * Returns the year by id.
     *
     * @param int $id Year id
     * @return Year
     */
    public function getYear(int $id): Year
    {
        return $this->yearsRepository->findOrFail($id);
    }

    /**
     * Returns years by the car model.
     *
     * @param CarModel $model The car model for filtering
     * @return Collection
     */
    public function getYearsByCarModel(CarModel $model): Collection
    {
        return $this->yearsRepository->findByCarModel($model);
    }
}
