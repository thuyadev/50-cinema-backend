<?php

namespace App\Services;

use App\Repositories\Crews\CrewRepositoryInterface;
use App\Repositories\Genres\GenreRepositoryInterface;
use App\Repositories\Movies\MovieRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\Collection;

class GlobalSearchService
{
    protected $movieRepository;
    protected $genreRepository;
    protected $userRepository;
    protected $crewRepository;

    public function __construct(MovieRepositoryInterface $movieRepository, GenreRepositoryInterface $genreRepository, UserRepositoryInterface $userRepository, CrewRepositoryInterface $crewRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->genreRepository = $genreRepository;
        $this->userRepository = $userRepository;
        $this->crewRepository = $crewRepository;
    }

    public function globalSearch(string $search): Collection
    {
        $movies = $search == '' ? [] : $this->movieRepository->filteredMovies($search)->take(5);

        $genres = $search == '' ? [] : $this->genreRepository->filteredGenres($search)->take(5);

        $users = $search == '' ? [] : $this->userRepository->filteredUsers($search)->take(5);

        $crews = $search == '' ? [] : $this->crewRepository->filteredCrews($search)->take(5);

        $datas = collect([
            'movies' => $movies,
            'genres' => $genres,
            'users' => $users,
            'crews' => $crews
        ]);

        return $datas;
    }
}
