<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface TravelRepositoryContract extends BaseRepositoryContract
{
    /**
     * @return Collection
     */
    public function getTravels(): Collection;
}
