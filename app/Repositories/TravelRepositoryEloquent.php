<?php

namespace App\Repositories;

use App\Models\Travel;
use App\Repositories\Contracts\TravelRepositoryContract;
use Illuminate\Support\Collection;

class TravelRepositoryEloquent extends BaseRepositoryEloquent implements TravelRepositoryContract
{
    /**
     * @var Travel
     */
    protected $model = Travel::class;

    /**
     * @return Collection
     */
    public function getTravels(): Collection
    {
        return $this->model::with('destinies')->get();
    }
}
