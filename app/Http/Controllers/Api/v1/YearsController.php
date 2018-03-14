<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\CarModelsService;
use App\Services\YearsService;
use App\Transformers\YearSelectionTransformer;
use Saritasa\Laravel\Controllers\Api\BaseApiController;

/**
 * Class YearsController
 */
class YearsController extends BaseApiController
{
    /**
     * Business-logic service of car years.
     *
     * @var YearsService
     */
    protected $yearsService;

    /**
     * Business-logic service of car models.
     *
     * @var CarModelsService
     */
    protected $carModelsService;

    /**
     * YearsController constructor.
     *
     * @param YearsService $yearsService Business-logic service of car years
     * @param CarModelsService $carModelsService Business-logic service of car models
     */
    public function __construct(YearsService $yearsService, CarModelsService $carModelsService)
    {
        parent::__construct();

        $this->yearsService = $yearsService;
        $this->carModelsService = $carModelsService;
    }

    /**
     * Returns the list of years by the car model for use in forms.
     *
     * @param int $carModelId Car model id
     * @return \Dingo\Api\Http\Response
     */
    public function getYearsForSelection(int $carModelId)
    {
        $carModel = $this->carModelsService->getCarModel($carModelId);
        $years = $this->yearsService->getYearsByCarModel($carModel);

        return $this->response->collection($years, new YearSelectionTransformer);
    }
}
