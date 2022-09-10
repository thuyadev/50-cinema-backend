<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Genre;
use App\Repositories\Genres\GenreRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GenreService
{
    protected  $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getGenres($search): LengthAwarePaginator
    {
        try {

            if (is_null($search))
            {
                $genres = $this->genreRepository->getAll();
            } else {
                $genres = $this->genreRepository->filteredGenres($search);
            }

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $genres;
    }

    public function create($request): Genre
    {
        try {

            $data = $request->validated();

            $to_genre = new Genre($data);

            $genre = $this->genreRepository->save($to_genre);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $genre;
    }

    public function update($request, Genre $genre): Genre
    {
        try {

            $data = $request->validated();

            $genre['name'] = $data['name'];

            $genre = $this->genreRepository->update($genre);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return $genre;
    }

    public function delete(Genre $genre): string
    {
        try {

            $this->genreRepository->delete($genre);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }
}
