<?php

namespace App\Providers;

use App\Repositories\Contracts\TravelRepositoryContract;
use App\Repositories\TravelRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class TravelRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            TravelRepositoryContract::class,
            TravelRepositoryEloquent::class
        );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            TravelRepositoryContract::class,
        ];
    }
}
