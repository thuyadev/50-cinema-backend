<?php

namespace App\Http\Livewire\Cinemas;

use App\Services\CinemaService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CinemaIndexTable extends Component
{

    use WithPagination;

    protected $cinemaService;
    protected $queryString = ['search'];

    public $search = '';

    public function boot(CinemaService $cinemaService): void
    {
        $this->cinemaService = $cinemaService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $cinemas = $this->cinemaService->getAll($this->search);

        return view('livewire.cinemas.cinema-index-table', compact('cinemas'));
    }
}
