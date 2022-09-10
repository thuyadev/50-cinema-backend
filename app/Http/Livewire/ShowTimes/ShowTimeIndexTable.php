<?php

namespace App\Http\Livewire\ShowTimes;

use App\Models\ShowTime;
use App\Services\ShowTimeService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTimeIndexTable extends Component
{
    use WithPagination;

    protected $showTimeService;
    protected $queryString = ['search'];
    protected $listeners = ['showTimeDelete'];

    public $search = '';

    public function boot(ShowTimeService $showTimeService): void
    {
        $this->showTimeService = $showTimeService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function showTimeDelete(ShowTime $showtime): void
    {
        $this->showTimeService->delete($showtime);
    }

    public function render(): View
    {
        $show_times = $this->showTimeService->getShowTimes($this->search);

        return view('livewire.show-times.show-time-index-table', compact('show_times'));
    }
}
