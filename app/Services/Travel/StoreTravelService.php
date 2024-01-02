<?php

namespace App\Services\Travel;

use App\Models\Travel;
use App\Repositories\Contracts\DestinyRepositoryContract;
use App\Repositories\Contracts\TravelRepositoryContract;
use App\Services\Travel\Contracts\StoreTravelServiceContract;

class StoreTravelService implements StoreTravelServiceContract
{

    /**
     * @param TravelRepositoryContract $travelRepository
     * @param DestinyRepositoryContract $destinyRepository
     */
    public function __construct(
        protected TravelRepositoryContract $travelRepository,
        protected DestinyRepositoryContract $destinyRepository,
    ){
        //
    }

    /**
     * @param array $requestData
     * @return Travel
     */
    public function store(array $requestData): Travel
    {
        $travelData = $this->formatDataTravel($requestData);

        $travel = $this->travelRepository->store($travelData);

        $destinyData = $this->formatDataDestiny($requestData);

        $destiny = $this->destinyRepository->store($destinyData);

        $travel->destinies()->attach($destiny->id);

        return $travel;
    }

    /**
     * @param array $requestData
     * @return array
     */
    private function formatDataTravel(array $requestData): array
    {
        return [
            'name' => $requestData['travel_name'],
            'departure_date' =>  $requestData['departure_date'],
            'return_date' =>  $requestData['return_date'],
            'means_of_transport' =>  $requestData['means_of_transport'],
            'accommodation' =>  $requestData['accommodation'],
            'budget' =>  $requestData['budget'],
        ];
    }

    /**
     * @param array $requestData
     * @return array
     */
    private function formatDataDestiny(array $requestData): array
    {
        return [
            'name' => $requestData['destiny_name'],
            'location' => $requestData['location'],
        ];
    }
}
