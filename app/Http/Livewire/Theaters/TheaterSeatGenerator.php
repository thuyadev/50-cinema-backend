<?php

namespace App\Http\Livewire\Theaters;

use App\Services\TheaterService;
use Illuminate\View\View;
use Livewire\Component;

class TheaterSeatGenerator extends Component
{
    protected $theaterService;
    protected $listeners = ['generateChairs', 'changeSeat', 'changeSeatRow', 'changeSeatColumn'];


    public $chair_per_row = 0;
    public $rows = 0;
    public $is_couple = false;
    public $couple_chair_count = 0;
    public $couple_chair_rows = 0;
    public $encoded_chairs;
    public $max_col_count = 0;

    public function boot(TheaterService $theaterService): void
    {
        $this->theaterService = $theaterService;
    }

    public function updatingIsCouple()
    {
        $this->is_couple = !$this->is_couple;
    }

    public function generateChairs(): void
    {
        sleep(1);

        $this->theaterService->generateChairs($this->chair_per_row, $this->rows, $this->is_couple);
    }

    public function changeSeat(string $row, string $name, int $price, string $type, string $space_type): void
    {
        sleep(1);

        $this->theaterService->updateChair($this->encoded_chairs, $row, $name, $price, $type, $space_type);
    }

    public function changeSeatRow(string $row, int $price, string $type, string $space_type): void
    {
        sleep(1);

        $this->theaterService->updateRow($this->encoded_chairs, $row, $price, $type, $space_type);
    }

    public function changeSeatColumn(int $col, int $price, string $space_type): void
    {
        sleep(1);

        $this->theaterService->updateColumn($this->encoded_chairs, $col-1, $price, $space_type);
    }

    public function render(): View
    {
        $chairs = $this->theaterService->getChairs();
        $this->encoded_chairs = $chairs;
        $this->max_col_count = $this->theaterService->getRowCounts($chairs);

        return view('livewire.theaters.theater-seat-generator', compact('chairs'));
    }
}
