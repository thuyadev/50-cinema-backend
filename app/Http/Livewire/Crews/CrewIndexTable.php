<?php

namespace App\Http\Livewire\Crews;

use App\Models\Crew;
use App\Services\CrewService;
use Livewire\Component;
use Livewire\WithPagination;

class CrewIndexTable extends Component
{
    use WithPagination;

    protected $crewService;
    protected $queryString = ['search'];
    protected $listeners = ['crewDelete'];

    public $search = '';

    public function boot(CrewService $crewService): void
    {
        $this->crewService = $crewService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function crewDelete(Crew $crew): void
    {
        $this->crewService->delete($crew);
    }

    public function render()
    {
        $crews = $this->crewService->getCrews($this->search);

        return view('livewire.crews.crew-index-table', compact('crews'));
    }
}
