<?php

namespace App\Repositories;

use App\Models\Cinema;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CinemaRepositoryInterface
{
    public function all(): Collection;

    public function getAll(): LengthAwarePaginator;

    public function filteredCinemas($search): LengthAwarePaginator;

    public function save(Cinema $cinema): Cinema;

    public function update(Cinema $cinema): Cinema;

    public function delete(Cinema $cinema): string;
}
