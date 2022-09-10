<?php

namespace App\Repositories\TheaterShowTimes;

use App\Models\ShowTime;
use App\Models\TheaterShowTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TheaterShowTimeRepository implements TheaterShowTimeRepositoryInterface
{
    public function all(): Collection
    {
        return TheaterShowTime::all();
    }

    public function getAll(): LengthAwarePaginator
    {
        return TheaterShowTime::latest()->paginate(10);
    }

    public function filteredTheaterShowTimes($search): LengthAwarePaginator
    {
        return TheaterShowTime::whereHas('movie', function (Builder $query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->whereHas('cinema', function (Builder $query) use ($search) {
            $query->orWhere('name', 'LIKE', "%$search%");
        })->whereHas('theater', function (Builder $query) use ($search) {
            $query->orWhere('name', 'LIKE', "%$search%");
        })->latest()->paginate(10);
    }

    public function save(TheaterShowTime $theaterShowTime): TheaterShowTime
    {
        $theaterShowTime->save();

        return $theaterShowTime;
    }

    public function update(TheaterShowTime $theaterShowTime): TheaterShowTime
    {
        $theaterShowTime->save();

        return $theaterShowTime;
    }

    public function delete(TheaterShowTime $theaterShowTime): string
    {
        $theaterShowTime->delete();

        return 'success';
    }

    public function deleteRelatedShowTime(ShowTime $showTime): string
    {
        $showTime->theaterShowTimes()->delete();

        return 'success';
    }
}
