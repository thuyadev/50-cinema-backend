<?php

namespace App\Repositories\Theaters;

use App\Models\Cinema;
use App\Models\Theater;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TheaterRepository implements TheaterRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Theater::latest()->paginate(10);
    }

    public function getTheatersByCinema(Cinema $cinema): Collection
    {
        return Theater::where('cinema_id', $cinema['id'])->get();
    }

    public function filteredTheaters($search): LengthAwarePaginator
    {
        return Theater::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Theater $theater): Theater
    {
        $theater->save();

        return $theater;
    }

    public function update(Theater $theater): Theater
    {
        $theater->save();

        return $theater;
    }

    public function delete(Theater $theater): string
    {
        $theater->delete();

        return 'success';
    }
}
