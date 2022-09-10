<?php

namespace App\Providers;

use App\Repositories\Genres\GenreRepository;
use App\Repositories\Genres\GenreRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class GenreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
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
