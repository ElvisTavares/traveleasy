<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * @param string $attribute
     * @param $value
     * @return Model
     */
    public function findBy(string $attribute, $value): Model;

    /**
     * @param int|Model $model
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(int|Model $model, array $attributes = [], array $options = []): bool;
}
