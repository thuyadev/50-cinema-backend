<?php

namespace App\Http\Livewire\Theaters;

use App\Models\Theater;
use App\Services\TheaterService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TheaterIndexTable extends Component
{
    use WithPagination;

    protected $theaterService;
    protected $queryString = ['search'];
    protected $listeners = ['theaterDelete'];

    public $search = '';

    public function boot(TheaterService $theaterService): void
    {
        $this->theaterService = $theaterService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function theaterDelete(Theater $theater): void
    {
        $this->theaterService->delete($theater);
    }

    public function render(): View
    {
        $theaters = $this->theaterService->getTheaters($this->search);

        return view('livewire.theaters.theater-index-table', compact('theaters'));
    }
}
