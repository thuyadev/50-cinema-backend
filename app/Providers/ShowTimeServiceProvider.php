<?php

namespace App\Providers;

use App\Repositories\ShowTimes\ShowTimeRepository;
use App\Repositories\ShowTimes\ShowTimeRepositoryInterface;
use App\Repositories\TheaterShowTimes\TheaterShowTimeRepository;
use App\Repositories\TheaterShowTimes\TheaterShowTimeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ShowTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ShowTimeRepositoryInterface::class, ShowTimeRepository::class);

        $this->app->bind(TheaterShowTimeRepositoryInterface::class, TheaterShowTimeRepository::class);
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
