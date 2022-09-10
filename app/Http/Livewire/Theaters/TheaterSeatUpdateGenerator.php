<?php

namespace App\Http\Livewire\Theaters;

use App\Services\TheaterService;
use Livewire\Component;

class TheaterSeatUpdateGenerator extends Component
{
    protected $theaterService;
    protected $listeners = ['generateChairs', 'changeSeat', 'changeSeatRow', 'changeSeatColumn'];


    public $chair_per_row;
    public $rows;
    public $couple_chair_count = 0;
    public $couple_chair_rows = 0;
    public $seats;
    public $max_col_count = 0;

    public function boot(TheaterService $theaterService): void
    {
        $this->theaterService = $theaterService;
    }

    public function generateChairs(): void
    {
        sleep(1);

        $this->seats = $this->theaterService->generateChairs($this->chair_per_row, $this->rows);
    }

    public function changeSeat(string $row, string $name, int $price, string $type, string $space_type): void
    {
        sleep(1);

        $this->theaterService->updateChair($this->seats, $row, $name, $price, $type, $space_type);
    }

    public function changeSeatRow(string $row, int $price, string $type, string $space_type): void
    {
        sleep(1);

        $this->theaterService->updateRow($this->seats, $row, $price, $type, $space_type);
    }

    public function changeSeatColumn(string $col, int $price, string $type, string $space_type): void
    {
        sleep(1);

        $this->theaterService->updateColumn($this->seats, $col, $price, $type, $space_type);
    }

    public function render()
    {
        $chairs = $this->seats;
        $this->max_col_count = $this->theaterService->getRowCounts($chairs);

        return view('livewire.theaters.theater-seat-update-generator', compact('chairs'));
    }
}
