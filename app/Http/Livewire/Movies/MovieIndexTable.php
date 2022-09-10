<?php

namespace App\Http\Livewire\Movies;

use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MovieIndexTable extends Component
{
    use WithPagination;

    protected $movieService;
    protected $queryString = ['search'];
    protected $listeners = ['createMovie', 'movieDelete'];

    public $search = '';

    public function boot(MovieService $movieService): void
    {
        $this->movieService = $movieService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function createMovie($movie): void
    {
        $this->movieService->create($movie);
    }

    public function movieDelete(Movie $movie): void
    {
        $this->movieService->delete($movie);
    }

    public function render(): View
    {
        $movies = $this->movieService->getMovies($this->search);

        return view('livewire.movies.movie-index-table', compact('movies'));
    }
}
