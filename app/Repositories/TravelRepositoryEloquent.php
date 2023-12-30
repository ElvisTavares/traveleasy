<?php

namespace App\Repositories;

use App\Models\Travel;
use App\Repositories\Contracts\TravelRepositoryContract;

class TravelRepositoryEloquent extends BaseRepositoryEloquent implements TravelRepositoryContract
{
    /**
     * @var Travel
     */
    protected $model = Travel::class;
}
