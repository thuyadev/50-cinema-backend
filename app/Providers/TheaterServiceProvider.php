<?php

namespace App\Providers;

use App\Repositories\Theaters\TheaterRepository;
use App\Repositories\Theaters\TheaterRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TheaterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TheaterRepositoryInterface::class, TheaterRepository::class);
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
