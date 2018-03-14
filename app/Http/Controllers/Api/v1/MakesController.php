<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\MakesService;
use App\Transformers\MakeSelectionTransformer;
use Saritasa\Laravel\Controllers\Api\BaseApiController;

/**
 * Class MakesController
 */
class MakesController extends BaseApiController
{
    /**
     * Business-logic service of makes.
     *
     * @var MakesService
     */
    protected $makesService;

    /**
     * MakesController constructor.
     *
     * @param MakesService $makesService Business-logic service of makes
     */
    public function __construct(MakesService $makesService)
    {
        parent::__construct();

        $this->makesService = $makesService;
    }

    /**
     * Returns the list of makes for use in forms.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function getMakesForSelection()
    {
        $makes = $this->makesService->getMakes();

        return $this->response->collection($makes, new MakeSelectionTransformer);
    }
}
