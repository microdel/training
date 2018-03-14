<?php

namespace App\Services;

use App\Models\CarModel;
use App\Models\Make;
use App\Repositories\CarModelsRepository;
use Illuminate\Support\Collection;

/**
 * Business-logic service of car models.
 */
class CarModelsService
{
    /**
     * Abstract storage of car models.
     *
     * @var CarModelsRepository
     */
    protected $carModelsRepository;

    /**
     * CarModelsService constructor.
     *
     * @param CarModelsRepository $carModelsRepository Abstract storage of car models
     */
    public function __construct(CarModelsRepository $carModelsRepository)
    {
        $this->carModelsRepository = $carModelsRepository;
    }

    /**
     * Returns the car model by id.
     *
     * @param int $id Car model id
     * @return CarModel
     */
    public function getCarModel(int $id): CarModel
    {
        return $this->carModelsRepository->findOrFail($id);
    }

    /**
     * Returns car models by the car make.
     *
     * @param Make $make The make for filtering
     * @return Collection
     */
    public function getCarModelsByMake(Make $make): Collection
    {
        return $this->carModelsRepository->getWhere([CarModel::MAKE_ID => $make->id]);
    }
}
