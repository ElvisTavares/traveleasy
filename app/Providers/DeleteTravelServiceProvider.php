<?php

namespace App\Providers;

use App\Services\Travel\Contracts\DeleteTravelServiceContract;
use App\Services\Travel\DeleteTravelService;
use Illuminate\Support\ServiceProvider;

class DeleteTravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->bind(
          DeleteTravelServiceContract::class,
          DeleteTravelService::class,
      );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            DeleteTravelServiceContract::class,
        ];
    }
}
