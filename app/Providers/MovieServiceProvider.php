<?php

namespace App\Providers;

use App\Adapters\Movies\ImdbAdapter;
use App\Adapters\Movies\MovieTableAdapter;
use App\Adapters\Movies\MovieAdapterInterface;
use App\Repositories\Movies\MovieRepository;
use App\Repositories\Movies\MovieRepositoryInterface;
use App\Services\ImdbService;
use Illuminate\Support\ServiceProvider;

class MovieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);

        $this->app->bind(MovieAdapterInterface::class, function () {
            if (request()->route()->getName() == "livewire.message" || request()->route()->getName() == "movies.index")
            {
                $imdbService = new ImdbService();

                return new ImdbAdapter($imdbService);
            } else
            {
                $movieRepository = new MovieRepository();

                return new MovieTableAdapter($movieRepository);
            }
        });
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
