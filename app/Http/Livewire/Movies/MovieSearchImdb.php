<?php

namespace App\Http\Livewire\Movies;

use App\Adapters\Movies\MovieAdapterInterface;
use App\Services\MovieService;
use Illuminate\View\View;
use Livewire\Component;

class MovieSearchImdb extends Component
{
    protected $movieAdapter;
    protected $movieService;

    public $search_imdb = '';
    public $imdb_movie;
    protected $listeners = ['getFromImdb', 'createMovie'];

    public function boot(MovieAdapterInterface $movieAdapter, MovieService $movieService): void
    {
        $this->movieAdapter = $movieAdapter;
        $this->movieService = $movieService;
    }

    public function getFromImdb(int $id): void
    {
        $this->imdb_movie = $this->movieAdapter->getMovie($id);
    }

    public function createMovie($movie): void
    {
        $this->imdb_movie = null;
        $this->search_imdb = '';
        $this->emitTo('movie-index-table', 'createMovie', $movie);
    }

    public function render(): View
    {
        $imdb_movies = $this->movieAdapter->getMovies($this->search_imdb);

        return view('livewire.movies.movie-search-imdb', compact('imdb_movies'));
    }
}
