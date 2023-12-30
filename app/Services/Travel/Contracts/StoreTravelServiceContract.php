<?php

namespace App\Services\Travel\Contracts;

use App\Models\Travel;

interface StoreTravelServiceContract
{
    public function store(array $requestData): Travel;
}
