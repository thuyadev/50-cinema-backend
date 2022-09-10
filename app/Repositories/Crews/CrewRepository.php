<?php

namespace App\Repositories\Crews;

use App\Models\Crew;
use Illuminate\Pagination\LengthAwarePaginator;

class CrewRepository implements CrewRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Crew::latest()->paginate(10);
    }

    public function filteredCrews(string $search): LengthAwarePaginator
    {
        return Crew::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Crew $crew): Crew
    {
        $crew->save();

        return $crew;
    }

    public function update(Crew $crew): Crew
    {
        $crew->save();

        return $crew;
    }

    public function delete(Crew $crew): string
    {
        $crew->delete();

        return 'success';
    }
}
