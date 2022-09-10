<?php

namespace App\Repositories\Movies;

use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;

interface MovieRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function filteredMovies($search): LengthAwarePaginator;

    public function save(Movie $movie): Movie;

    public function update(Movie $movie): Movie;

    public function delete(Movie $movie): string;
}
