<?php

namespace App\Services\Travel\Contracts;

use App\Models\Travel;
use Illuminate\Support\Collection;

interface GetTravelServiceContract
{
    /**
     * @return Collection
     */
    public function getTravel(): Collection;

    /**
     * @param int $id
     * @return Travel
     */
    public function getTravelById(int $id): Travel;
}
