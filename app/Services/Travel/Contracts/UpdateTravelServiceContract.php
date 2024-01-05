<?php

namespace App\Services\Travel\Contracts;

interface UpdateTravelServiceContract
{
    /**
     * @param int $id
     * @param array $attributes
     * @return void
     */
    public function update(int $id, array $attributes): void;
}
