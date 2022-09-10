<?php

namespace App\Repositories\Crews;

use App\Models\Crew;
use Illuminate\Pagination\LengthAwarePaginator;

interface CrewRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function filteredCrews(string $search): LengthAwarePaginator;

    public function save(Crew $crew): Crew;

    public function update(Crew $crew): Crew;

    public function delete(Crew $crew): string;
}
