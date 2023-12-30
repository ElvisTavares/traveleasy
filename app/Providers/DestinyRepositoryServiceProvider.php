<?php

namespace App\Providers;

use App\Repositories\Contracts\DestinyRepositoryContract;
use App\Repositories\DestinyRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class DestinyRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            DestinyRepositoryContract::class,
            DestinyRepositoryEloquent::class,
        );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            DestinyRepositoryContract::class,
        ];
    }
}
