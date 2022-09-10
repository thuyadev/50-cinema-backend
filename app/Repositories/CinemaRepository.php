<?php

namespace App\Repositories;

use App\Models\Cinema;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class CinemaRepository implements CinemaRepositoryInterface
{
    public function all(): Collection
    {
        return Cinema::all();
    }

    public function getAll(): LengthAwarePaginator
    {
        return Cinema::latest()->paginate(10);
    }

    public function filteredCinemas($search): LengthAwarePaginator
    {
        return Cinema::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Cinema $cinema): Cinema
    {
        $cinema->save();

        return $cinema;
    }

    public function update(Cinema $cinema): Cinema
    {
        $cinema->save();

        return $cinema;
    }

    public function delete(Cinema $cinema): string
    {
        $cinema->delete();

        return 'success';
    }
}
