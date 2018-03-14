<?php

namespace App\Services;

use App\Repositories\BodyTypesRepository;
use Illuminate\Support\Collection;

/**
 * Car body types business-logic service.
 */
class BodyTypesService
{
    /**
     * The abstract storage of body types.
     *
     * @var BodyTypesRepository
     */
    protected $bodyTypesRepository;

    /**
     * BodyTypesServices constructor.
     *
     * @param BodyTypesRepository $bodyTypesRepository The abstract storage of body types
     */
    public function __construct(BodyTypesRepository $bodyTypesRepository)
    {
        $this->bodyTypesRepository = $bodyTypesRepository;
    }

    /**
     * Returns the list of body types for use in forms.
     *
     * @return Collection
     */
    public function getListForSelection(): Collection
    {
        return $this->bodyTypesRepository->get();
    }
}
