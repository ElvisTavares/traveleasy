<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class BaseRepositoryEloquent implements BaseRepositoryContract
{

    /**
     * @var Model
     */
    protected $model;

    /*
     * {@inheritDoc}
     */
    public function store(array $data): Model
    {
        return $this->model::create($data);
    }
}
