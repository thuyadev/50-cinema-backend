<?php

namespace App\Repositories\ShowTimes;

use App\Models\ShowTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ShowTimeRepository implements ShowTimeRepositoryInterface
{
    public function all(): Collection
    {
        return ShowTime::all();
    }

    public function getAll(): LengthAwarePaginator
    {
        return ShowTime::latest()->paginate(10);
    }

    public function filteredShowTimes($search): LengthAwarePaginator
    {
        return ShowTime::whereHas('movie', function (Builder $query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->latest()->paginate(10);
    }

    public function save(ShowTime $showTime): ShowTime
    {
        $showTime->save();

        return $showTime;
    }

    public function update(ShowTime $showTime): ShowTime
    {
        $showTime->save();

        return $showTime;
    }

    public function delete(ShowTime $showTime): string
    {
        $showTime->delete();

        return 'success';
    }
}
