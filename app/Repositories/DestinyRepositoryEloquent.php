<?php

namespace App\Repositories;

use App\Models\Destiny;
use App\Repositories\Contracts\DestinyRepositoryContract;

class DestinyRepositoryEloquent extends BaseRepositoryEloquent implements DestinyRepositoryContract
{
    /*
     * @var Destiny
     */
    protected $model = Destiny::class;
}
