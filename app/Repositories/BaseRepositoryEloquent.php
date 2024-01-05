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

    /*
    * {@inheritDoc}
    */
    public function update(int|Model $model, array $attributes = [], array $options = []): bool
    {
        if ($model instanceof Model) {
            return $model->update($attributes, $options);
        }

        return $this->model::query()
            ->where($model)
            ->update($attributes, $options);
    }
}
