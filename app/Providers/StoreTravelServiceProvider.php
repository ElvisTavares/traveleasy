<?php

namespace App\Providers;

use App\Services\Travel\Contracts\StoreTravelServiceContract;
use App\Services\Travel\StoreTravelService;
use Illuminate\Support\ServiceProvider;

class StoreTravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            StoreTravelServiceContract::class,
            StoreTravelService::class
        );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
          StoreTravelServiceContract::class,
        ];
   }
}
