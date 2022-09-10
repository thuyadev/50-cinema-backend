<?php

namespace App\Repositories\Movies;

use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieRepository implements MovieRepositoryInterface
{

    public function getAll(): LengthAwarePaginator
    {
        return Movie::latest()->paginate(10);
    }

    public function filteredMovies($search): LengthAwarePaginator
    {
        return Movie::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Movie $movie): Movie
    {
        $movie->save();

        return $movie;
    }

    public function update(Movie $movie): Movie
    {
        $movie->save();

        return $movie;
    }

    public function delete(Movie $movie): string
    {
        $movie->delete();

        return 'success';
    }
}
