<?php

namespace App\Http\Livewire\Genres;

use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class GenreIndexTable extends Component
{
    use WithPagination;

    protected $genreService;
    protected $queryString = ['search'];
    protected $listeners = ['genreDelete'];

    public $search = '';

    public function boot(GenreService $genreService): void
    {
        $this->genreService = $genreService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function genreDelete(Genre $genre): void
    {
        $this->genreService->delete($genre);
    }

    public function render(): View
    {
        $genres = $this->genreService->getGenres($this->search);

        return view('livewire.genres.genre-index-table', compact('genres'));
    }
}
