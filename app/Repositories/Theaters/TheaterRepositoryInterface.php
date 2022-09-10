<?php

namespace App\Repositories\Theaters;

use App\Models\Cinema;
use App\Models\Theater;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TheaterRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function getTheatersByCinema(Cinema $cinema): Collection;

    public function filteredTheaters($search): LengthAwarePaginator;

    public function save(Theater $theater): Theater;

    public function update(Theater $theater): Theater;

    public function delete(Theater $theater): string;
}
