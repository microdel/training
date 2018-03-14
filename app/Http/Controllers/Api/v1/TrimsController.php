<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\TrimsService;
use App\Services\YearsService;
use App\Transformers\TrimSelectionTransformer;
use Saritasa\Laravel\Controllers\Api\BaseApiController;

/**
 * Class TrimsController
 */
class TrimsController extends BaseApiController
{
    /**
     * Business-logic service of car years.
     *
     * @var YearsService
     */
    protected $yearsService;

    /**
     * Business-logic service of trims.
     *
     * @var TrimsService
     */
    protected $trimsService;

    /**
     * TrimsController constructor.
     *
     * @param YearsService $yearsService Business-logic service of car years
     * @param TrimsService $trimsService Business-logic service of trims
     */
    public function __construct(YearsService $yearsService, TrimsService $trimsService)
    {
        parent::__construct();

        $this->yearsService = $yearsService;
        $this->trimsService = $trimsService;
    }

    /**
     * Returns the list of trims by the year for use in forms.
     *
     * @param int $yearId Year id
     * @return \Dingo\Api\Http\Response
     */
    public function getTrimsForSelection(int $yearId)
    {
        $year = $this->yearsService->getYear($yearId);
        $trims = $this->trimsService->getTrimsByYear($year);

        return $this->response->collection($trims, new TrimSelectionTransformer);
    }
}
