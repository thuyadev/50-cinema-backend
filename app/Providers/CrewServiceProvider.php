<?php

namespace App\Providers;

use App\Repositories\Crews\CrewRepository;
use App\Repositories\Crews\CrewRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CrewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrewRepositoryInterface::class, CrewRepository::class);
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
