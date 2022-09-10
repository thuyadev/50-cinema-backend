<?php

namespace App\Adapters\Movies;

use App\Models\Movie;
use App\Repositories\Movies\MovieRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieTableAdapter implements MovieAdapterInterface
{
    protected $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getMovies(string $search): LengthAwarePaginator
    {
        return $this->movieRepository->filteredMovies($search);
    }

    public function getMovie(int $id, $data = null): Movie
    {
        $movie = new Movie($data);

        return $movie;
    }
}
