<?php

namespace App\Repositories\Movies;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MovieRepository implements MovieRepositoryInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return Movie::latest()->paginate(10);
    }

    /**
     * @param $search
     * @return LengthAwarePaginator
     */
    public function filteredMovies($search): LengthAwarePaginator
    {
        return Movie::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    /**
     * @param string $collection
     * @return Collection
     */
    public function collectionMovies(string $collection): Collection
    {
        if ($collection == 'coming_soon')
        {
            return Movie::whereHas('showTime', function ($q) {
                $q->where('start_date', '>', Carbon::now()->toDateString());
            })->take(8)->get();
        } else
        {
            return Movie::whereHas('showTime', function ($q) {
                $q->where('start_date', '<=', Carbon::now()->toDateString());
                $q->where('end_date', '>', Carbon::now()->toDateString());
            })->take(8)->get();
        }
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getMovieList(Request $request): LengthAwarePaginator
    {
        $order_by = $request['asc'] ? 'asc' : 'desc';

        $movies = Movie::where('name', 'LIKE', "%$request->search%");

        if (isset($request['filter_by']))
        {
            if ($request['filter_by'] == 'coming_soon')
            {
                $movies = $movies->whereHas('showTime', function ($q) {
                    $q->where('start_date', '>', Carbon::now()->toDateString());
                });
            } elseif ($request['filter_by'] == 'now_showing')
            {
                $movies = $movies->whereHas('showTime', function ($q) {
                    $q->where('start_date', '<=', Carbon::now()->toDateString());
                    $q->where('end_date', '>', Carbon::now()->toDateString());
                });
            }
        }

        if (isset($request['sort_by']))
        {
            if ($request['sort_by'] == 'date')
            {
                $movies = $movies->showTime()->orderBy('start_date', $order_by);
            } else
            {
                $movies = $movies->orderBy($request['sort_by'], $order_by);
            }
        }

        return $movies->paginate(10);
    }

    /**
     * @param Movie $movie
     * @return Movie
     */
    public function save(Movie $movie): Movie
    {
        $movie->save();

        return $movie;
    }

    /**
     * @param Movie $movie
     * @return Movie
     */
    public function update(Movie $movie): Movie
    {
        $movie->save();

        return $movie;
    }

    /**
     * @param Movie $movie
     * @return string
     */
    public function delete(Movie $movie): string
    {
        $movie->delete();

        return 'success';
    }
}
