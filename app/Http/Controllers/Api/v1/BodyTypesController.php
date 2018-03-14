<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\BodyTypesService;
use App\Transformers\BodyTypeSelectionTransformer;
use Saritasa\Laravel\Controllers\Api\BaseApiController;

/**
 * API controller of car body types.
 * Contains the method for getting the list of body types for forms.
 */
class BodyTypesController extends BaseApiController
{
    /**
     * Car body types business-logic service.
     *
     * @var BodyTypesService
     */
    protected $bodyTypesService;

    /**
     * BodyTypesController constructor.
     *
     * @param BodyTypesService $bodyTypesService Car body types business-logic service
     */
    public function __construct(BodyTypesService $bodyTypesService)
    {
        parent::__construct();
        $this->bodyTypesService = $bodyTypesService;
    }

    /**
     * Returns the list of body types for use in forms.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function getBodyTypesForSelection()
    {
        $bodyTypes = $this->bodyTypesService->getListForSelection();

        return $this->response->collection($bodyTypes, new BodyTypeSelectionTransformer);
    }
}
