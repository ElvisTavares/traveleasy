<?php

namespace App\Providers;

use App\Services\Travel\Contracts\GetTravelServiceContract;
use App\Services\Travel\GetTravelService;
use Illuminate\Support\ServiceProvider;

class GetTravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            GetTravelServiceContract::class,
            GetTravelService::class
        );
    }


    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            GetTravelServiceContract::class,
        ];
    }
}
