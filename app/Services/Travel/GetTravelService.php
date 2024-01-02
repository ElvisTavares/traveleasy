<?php

namespace App\Services\Travel;

use App\Exceptions\TravelNotFoundException;
use App\Models\Travel;
use App\Repositories\Contracts\TravelRepositoryContract;
use App\Services\Travel\Contracts\GetTravelServiceContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class GetTravelService implements GetTravelServiceContract
{

    /**
     * @param TravelRepositoryContract $travelRepository
     */
    public function __construct(
        protected TravelRepositoryContract $travelRepository,
    ){

    }

    /**
     * @return Collection
     */
    public function getTravel(): Collection
    {
        return $this->travelRepository->getTravels();
    }

    /**
     * @param int $id
     * @return Travel
     * @throws TravelNotFoundException
     */
    public function getTravelById(int $id): Travel
    {
        try {
            return $this->travelRepository->findBy('id', $id);
        } catch (ModelNotFoundException $exception) {
            throw new TravelNotFoundException();
        }
    }
}
