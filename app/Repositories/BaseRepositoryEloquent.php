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

    /*
  * {@inheritDoc}
  */
    public function findBy(string $attribute, $value): Model
    {
        return $this->model::where($attribute, $value)->firstOrFail();
    }
}
