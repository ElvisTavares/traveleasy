<?php

namespace App\Services\Travel;

use App\Repositories\Contracts\TravelRepositoryContract;
use App\Services\Travel\Contracts\GetTravelServiceContract;
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
}
