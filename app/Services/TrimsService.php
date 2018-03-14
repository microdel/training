<?php

namespace App\Services;

use App\Models\Year;
use App\Repositories\TrimsRepository;
use Illuminate\Support\Collection;

/**
 * Business-logic service of trims.
 */
class TrimsService
{
    /**
     * Abstract storage of trims.
     *
     * @var TrimsRepository
     */
    protected $trimsRepository;

    /**
     * TrimsService constructor.
     *
     * @param TrimsRepository $trimsRepository Abstract storage of trims
     */
    public function __construct(TrimsRepository $trimsRepository)
    {
        $this->trimsRepository = $trimsRepository;
    }

    /**
     * Returns trims by the year.
     *
     * @param Year $year The year for filtering
     * @return Collection
     */
    public function getTrimsByYear(Year $year): Collection
    {
        return $this->trimsRepository->findByCarModelAndYear($year->trim->carModel, $year);
    }
}
