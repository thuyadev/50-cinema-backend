<?php

namespace App\Repositories\Genres;

use App\Models\Genre;
use Illuminate\Pagination\LengthAwarePaginator;

interface GenreRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function filteredGenres($search): LengthAwarePaginator;

    public function save(Genre $genre): Genre;

    public function update(Genre $genre): Genre;

    public function delete(Genre $genre): string;
}
