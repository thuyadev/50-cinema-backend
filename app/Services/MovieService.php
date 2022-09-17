<?php

namespace App\Services;

use App\Adapters\Movies\MovieAdapterInterface;
use App\Exceptions\CustomException;
use App\Http\Requests\Api\MovieCollectionRequest;
use App\Models\Crew;
use App\Models\Genre;
use App\Utils\ImageManagementUtil;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Movies\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MovieService
{
    /**
     * @param MovieRepositoryInterface $movieRepository
     * @param MovieAdapterInterface $movieAdapter
     * @param ImageManagementUtil $imageManagementUtil
     */
    public function __construct(
        private MovieRepositoryInterface $movieRepository,
        private MovieAdapterInterface $movieAdapter,
        private ImageManagementUtil $imageManagementUtil,
    )
    {}

    /**
     * @param $search
     * @return LengthAwarePaginator
     * @throws CustomException
     */
    public function getMovies($search): LengthAwarePaginator
    {
        try {

            $movies = $this->movieRepository->filteredMovies($search);

        } catch (\Exception $e)
        {

            throw new CustomException($e->getMessage(), 500);

        }

        return $movies;
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getMovieList(Request $request): LengthAwarePaginator
    {
        $movies = $this->movieRepository->getMovieList($request);

        return $movies;
    }

    /**
     * @param MovieCollectionRequest $request
     * @return Collection
     */
    public function getByCollection(MovieCollectionRequest $request): Collection
    {
        $data = $request->validated();

        $movies = $this->movieRepository->collectionMovies($data['collection']);

        return $movies;
    }

    /**
     * @param $movie_data
     * @return Movie
     * @throws CustomException
     */
    public function create($movie_data): Movie
    {
        try {

            DB::beginTransaction();

            $to_movie = new Movie($movie_data);

            $movie = $this->movieRepository->save($to_movie);

            $this->createImagesFromImdb($movie_data['images'], $movie);

            $this->createMovieGenre($movie, $movie_data['genres']);

            $this->createMovieCrews($movie, $movie_data['crews'], $movie_data['director']);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            throw new CustomException($e->getMessage(), 500);

        }

        return $movie;
    }

    /**
     * @param $request
     * @return Movie
     * @throws CustomException
     */
    public function createManual($request): Movie
    {
        try {

            DB::beginTransaction();

            $data = $request->validated();

            $poster = $this->imageManagementUtil->upload($data['movie_poster']);

            $data['movie_poster'] = asset($poster);

            $to_movie = new Movie($data);

            $movie = $this->movieRepository->save($to_movie);

            $genres = Genre::whereIn('id', $data['genre_ids'])->get();

            $this->createMovieGenre($movie, $genres);

            $crews = Crew::whereIn('id', $data['crew_ids'])->get();

            $this->createCrewsManual($movie, $crews);

            $this->createManualImages($data['images'], $movie);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            throw new CustomException($e->getMessage(), 500);

        }

        return $movie;
    }

    /**
     * @param $request
     * @param Movie $movie
     * @return Movie
     * @throws CustomException
     */
    public function update($request, Movie $movie): Movie
    {
        try {

            DB::beginTransaction();

            $data = $request->validated();

            if (isset($data['movie_poster']))
            {
                $poster = $this->imageManagementUtil->upload($data['movie_poster']);

                $data['movie_poster'] = asset($poster);
            } else
            {
                $data['movie_poster'] = $movie['movie_poster'];
            }

            $movie['name'] = $data['name'];
            $movie['description'] = $data['description'];
            $movie['initial_release_date'] = $data['initial_release_date'];
            $movie['production_company'] = $data['production_company'];
            $movie['movie_length'] = $data['movie_length'];
            $movie['trailer'] =  $data['trailer'];
            $movie['movie_poster'] = $data['movie_poster'];
            $movie['language'] = $data['language'];

            $movie_data = $this->movieRepository->update($movie);

            $movie_data->movie_genres()->sync($data['genre_ids']);

            $movie_data->movie_crews()->sync($data['crew_ids']);

            if (isset($data['images']))
            {
                $this->createManualImages($data['images'], $movie_data);
            }

            if (isset($data['delete_photo_ids']))
            {
                $this->deleteImages($movie_data, $data['delete_photo_ids']);
            }

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            throw new CustomException($e->getMessage(), 500);

        }

        return $movie_data;
    }

    /**
     * @param Movie $movie
     * @return string
     * @throws CustomException
     */
    public function delete(Movie $movie): string
    {
        try {

            $photo_ids = $movie->photos()->pluck('id')->toArray();

            $this->deleteImages($movie, $photo_ids);

            $this->deleteRelationsData($movie);

            $this->movieRepository->delete($movie);

        } catch (\Exception $e) {

            throw new CustomException($e->getMessage(), 500);

        }

        return 'success';
    }

    /**
     * @param Movie $movie
     * @param $genres
     * @return void
     */
    public function createMovieGenre(Movie $movie, $genres): void
    {
        foreach ($genres as $genre)
        {
            $genre = Genre::where('name', $genre['name'])->first();

            $movie->movie_genres()->attach($genre['id']);
        }
    }

    /**
     * @param Movie $movie
     * @param $crews
     * @param $director
     * @return void
     */
    public function createMovieCrews(Movie $movie, $crews, $director): void
    {
        foreach ($crews as $crew)
        {
            $cr = new Crew();
            $cr['name'] = $crew['original_name'];
            $cr['status'] = 1;
            $cr->save();

            $movie->movie_crews()->attach($cr['id']);
        }

        $cr = new Crew();
        $cr['name'] = $director['original_name'];
        $cr['status'] = 2;
        $cr->save();

        $movie->movie_crews()->attach($cr['id']);
    }

    /**
     * @param $images
     * @param Movie $movie
     * @return void
     */
    public function createImagesFromImdb($images, Movie $movie): void
    {
        foreach ($images as $image)
        {
            $movie->photos()->create([
               'photo_path' => 'https://image.tmdb.org/t/p/w500/' . $image['file_path'],
            ]);
        }
    }

    /**
     * @param $images
     * @param Movie $movie
     * @return void
     */
    public function createManualImages($images, Movie $movie): void
    {
        foreach ($images as $image)
        {
            $img_path = $this->imageManagementUtil->upload($image);
            $movie->photos()->create([
                'photo_path' => asset($img_path),
            ]);
        }
    }

    /**
     * @param Movie $movie
     * @param $crews
     * @return void
     */
    public function createCrewsManual(Movie $movie, $crews): void
    {
        foreach ($crews as $crew)
        {
            $movie->movie_crews()->attach($crew['id']);
        }
    }

    /**
     * @param Movie $movie
     * @param array $delete_ids
     * @return void
     */
    public function deleteImages(Movie $movie, array $delete_ids): void
    {
        foreach ($movie->photos as $photo)
        {
            $this->imageManagementUtil->delete($photo['photo_path']);
        }

        $movie->photos()->whereIn('id', $delete_ids)->delete();
    }

    /**
     * @param Movie $movie
     * @return void
     */
    public function deleteRelationsData(Movie $movie): void
    {
        $movie->movie_genres()->delete();
        $movie->movie_crews()->delete();
    }

}
