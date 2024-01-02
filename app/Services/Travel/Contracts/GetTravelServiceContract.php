<?php

namespace App\Services\Travel\Contracts;

use Illuminate\Support\Collection;

interface GetTravelServiceContract
{
    /**
     * @return Collection
     */
    public function getTravel(): Collection;
}
