<?php

namespace App\Services\Travel\Contracts;

use App\Models\Travel;

interface StoreTravelServiceContract
{
    /**
     * @param array $requestData
     * @return Travel
     */
    public function store(array $requestData): Travel;
}
