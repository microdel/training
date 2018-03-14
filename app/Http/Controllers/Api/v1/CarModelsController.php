<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\CarModelsService;
use App\Services\MakesService;
use App\Transformers\CarModelSelectionTransformer;
use Saritasa\Laravel\Controllers\Api\BaseApiController;

class CarModelsController extends BaseApiController
{
    /**
     * Business-logic service of makes.
     *
     * @var MakesService
     */
    protected $makesService;

    /**
     * Business-logic service of car models.
     *
     * @var CarModelsService
     */
    protected $carModelsService;

    /**
     * CarModelsController constructor.
     *
     * @param MakesService $makesService Business-logic service of makes
     * @param CarModelsService $carModelsService Business-logic service of car models
     */
    public function __construct(MakesService $makesService, CarModelsService $carModelsService)
    {
        parent::__construct();

        $this->makesService = $makesService;
        $this->carModelsService = $carModelsService;
    }

    /**
     * Returns the list of car models by the car make for use in forms.
     *
     * @param int $makeId Make id
     * @return \Dingo\Api\Http\Response
     */
    public function getModelsForSelection(int $makeId)
    {
        $make = $this->makesService->getMake($makeId);
        $models = $this->carModelsService->getCarModelsByMake($make);

        return $this->response->collection($models, new CarModelSelectionTransformer);
    }
}
