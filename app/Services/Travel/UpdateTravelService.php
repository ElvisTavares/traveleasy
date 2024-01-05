<?php

namespace App\Services\Travel;

use App\Exceptions\TravelNotFoundException;
use App\Models\Destiny;
use App\Repositories\Contracts\DestinyRepositoryContract;
use App\Repositories\Contracts\TravelRepositoryContract;
use App\Services\Travel\Contracts\UpdateTravelServiceContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateTravelService implements UpdateTravelServiceContract
{

    /**
     * @param TravelRepositoryContract $travelRepository
     * @param DestinyRepositoryContract $destinyRepository
     */
    public function __construct(
        protected TravelRepositoryContract $travelRepository,
        protected DestinyRepositoryContract $destinyRepository
    ){

    }

    /**
     * @param int $id
     * @param array $attributes
     * @return void
     * @throws TravelNotFoundException
     */
    public function update(int $id, array $attributes): void
    {
        try {
            $travel = $this->travelRepository->findBy('id', $id);

            $travelData = $this->formatDataTravel($attributes);

            $this->travelRepository->update($travel, $travelData);
        } catch (ModelNotFoundException $exception) {
            Log::info('Travel not found', [
                'exception' => $exception,
                'code' => 'travel_update_not_found',
                'service' => 'travel_updade',
            ]);

            throw new TravelNotFoundException();
        }
    }

    /**
     * @param array $attributes
     * @return array
     */
    private function formatDataTravel(array $attributes): array
    {
        return [
            'name' => $attributes['travel_name'],
            'departure_date' =>  $attributes['departure_date'],
            'return_date' =>  $attributes['return_date'],
            'means_of_transport' =>  $attributes['means_of_transport'],
            'accommodation' =>  $attributes['accommodation'],
            'budget' =>  $attributes['budget'],
        ];
    }
}
