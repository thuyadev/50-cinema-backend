<?php

namespace App\Repositories\ShowTimes;

use App\Models\ShowTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ShowTimeRepositoryInterface
{
    public function all(): Collection;

    public function getAll(): LengthAwarePaginator;

    public function filteredShowTimes($search): LengthAwarePaginator;

    public function save(ShowTime $showTime): ShowTime;

    public function update(ShowTime $showTime): ShowTime;

    public function delete(ShowTime $showTime): string;
}
