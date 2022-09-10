<?php

namespace App\Repositories\Genres;

use App\Models\Genre;
use Illuminate\Pagination\LengthAwarePaginator;

class GenreRepository implements GenreRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Genre::latest()->paginate(10);
    }

    public function filteredGenres($search): LengthAwarePaginator
    {
        return Genre::where('name', 'LIKE', "%$search%")->latest()->paginate(10);
    }

    public function save(Genre $genre): Genre
    {
        $genre->save();

        return $genre;
    }

    public function update(Genre $genre): Genre
    {
        $genre->save();

        return $genre;
    }

    public function delete(Genre $genre): string
    {
        $genre->delete();

        return 'success';
    }
}
