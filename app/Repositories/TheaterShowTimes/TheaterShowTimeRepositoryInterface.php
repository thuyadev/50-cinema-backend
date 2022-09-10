<?php

namespace App\Repositories\TheaterShowTimes;

use App\Models\ShowTime;
use App\Models\TheaterShowTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TheaterShowTimeRepositoryInterface
{
    public function all(): Collection;

    public function getAll(): LengthAwarePaginator;

    public function filteredTheaterShowTimes($search): LengthAwarePaginator;

    public function save(TheaterShowTime $theaterShowTime): TheaterShowTime;

    public function update(TheaterShowTime $theaterShowTime): TheaterShowTime;

    public function delete(TheaterShowTime $theaterShowTime): string;

    public function deleteRelatedShowTime(ShowTime $showTime): string;
}
