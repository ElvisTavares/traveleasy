<?php

namespace App\Providers;

use App\Services\Travel\Contracts\UpdateTravelServiceContract;
use App\Services\Travel\UpdateTravelService;
use Illuminate\Support\ServiceProvider;

class UpdateTravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UpdateTravelServiceContract::class,
            UpdateTravelService::class,
        );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            UpdateTravelServiceContract::class,
        ];
    }
}
