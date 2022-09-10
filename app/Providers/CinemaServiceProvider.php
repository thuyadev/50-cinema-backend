<?php

namespace App\Providers;

use App\Repositories\CinemaRepository;
use App\Repositories\CinemaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CinemaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CinemaRepositoryInterface::class, CinemaRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
