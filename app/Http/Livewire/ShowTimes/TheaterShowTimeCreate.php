<?php

namespace App\Http\Livewire\ShowTimes;

use App\Models\Cinema;
use App\Models\Theater;
use App\Services\CinemaService;
use App\Services\TheaterService;
use Illuminate\View\View;
use Livewire\Component;

class TheaterShowTimeCreate extends Component
{
    protected $cinemaService;
    protected $theaterService;

    public $cinemas = [];
    public $cinema_id;
    public $cinema_name;

    public $theaters = [];
    public $theater_id;
    public $theater_name;

    public $time;

    public $show_times = [];

    protected $listeners = ['getTheaters', 'addShowTime', 'getTheaterName', 'deleteShowTime'];

    public function boot(CinemaService $cinemaService, TheaterService $theaterService): void
    {
        $this->cinemaService = $cinemaService;
        $this->theaterService = $theaterService;
    }

    public function mount(): void
    {
        $this->cinemas = $this->cinemaService->all();
    }

    public function getTheaters(): void
    {
        $cinema = Cinema::findorFail($this->cinema_id);
        $this->cinema_name = $cinema['name'];

        $this->theaters = $this->theaterService->getTheatersByCinema($cinema);
    }

    public function getTheaterName(): void
    {
        $theater = Theater::findorFail($this->theater_id);
        $this->theater_name = $theater['name'];
    }

    public function addShowTime(): void
    {
        $show_time = [];

        $show_time['cinema_id'] = $this->cinema_id;
        $show_time['cinema_name'] = $this->cinema_name;
        $show_time['theater_id'] = $this->theater_id;
        $show_time['theater_name'] = $this->theater_name;
        $show_time['time'] = $this->time;

        array_push($this->show_times, $show_time);

        $this->reset(['cinema_id', 'cinema_name', 'theater_id', 'theater_name', 'time']);
    }

    public function deleteShowTime(int $index): void
    {
        array_splice($this->show_times, $index, 1);
    }

    public function render(): View
    {
        return view('livewire.show-times.theater-show-time-create');
    }
}
