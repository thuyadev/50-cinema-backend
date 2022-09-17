<?php

namespace App\Repositories\Movies;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface MovieRepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * @param $search
     * @return LengthAwarePaginator
     */
    public function filteredMovies($search): LengthAwarePaginator;

    /**
     * @param string $collection
     * @return Collection
     */
    public function collectionMovies(string $collection): Collection;

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getMovieList(Request $request): LengthAwarePaginator;

    /**
     * @param Movie $movie
     * @return Movie
     */
    public function save(Movie $movie): Movie;

    /**
     * @param Movie $movie
     * @return Movie
     */
    public function update(Movie $movie): Movie;

    /**
     * @param Movie $movie
     * @return string
     */
    public function delete(Movie $movie): string;
}
