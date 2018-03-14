<?php

namespace App\Services;

use App\Models\Make;
use App\Repositories\MakesRepository;
use Illuminate\Support\Collection;

/**
 * Business-logic service of makes.
 */
class MakesService
{
    /**
     * The abstract storage of makes.
     *
     * @var MakesRepository
     */
    protected $makesRepository;

    /**
     * MakesService constructor.
     *
     * @param MakesRepository $makesRepository The abstract storage of makes
     */
    public function __construct(MakesRepository $makesRepository)
    {
        $this->makesRepository = $makesRepository;
    }

    /**
     * Returns all makes.
     *
     * @return Collection
     */
    public function getMakes(): Collection
    {
        return $this->makesRepository->get();
    }

    /**
     * Returns the make by id.
     *
     * @param int $id Make id
     * @return Make
     */
    public function getMake(int $id): Make
    {
        return $this->makesRepository->findOrFail($id);
    }
}
