<?php

namespace App\Adapters\Movies;

use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;

interface MovieAdapterInterface
{
    public function getMovies(string $search): array|LengthAwarePaginator;

    public function getMovie(int $id, $data): Movie;
}
