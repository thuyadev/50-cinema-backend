<?php

namespace App\Adapters\Movies;

use App\Models\Movie;
use App\Services\ImdbService;

class ImdbAdapter implements MovieAdapterInterface
{
    protected $imdbService;

    public function __construct(ImdbService $imdbService)
    {
        $this->imdbService = $imdbService;
    }

    public function getMovies(string $search): array
    {
        return $this->imdbService->searchMovie($search);
    }

    public function getMovie(int $id, $data = null): Movie
    {
        $imdb_movie = $this->imdbService->getMovieDetail($id);

        $movie = new Movie();
        $movie['name'] = $imdb_movie['title'];
        $movie['description'] = $imdb_movie['overview'];
        $movie['initial_release_date'] = $imdb_movie['release_date'];
        $movie['production_company'] = $imdb_movie['production_companies'][0]['name'];
        $movie['movie_length'] = $imdb_movie['runtime'];
        $movie['trailer'] = 'https://www.youtube.com/embed/' . $imdb_movie['videos']['results'][0]['key'];
        $movie['movie_poster'] = 'https://image.tmdb.org/t/p/w500' . $imdb_movie['poster_path'];
        $movie['language'] = $imdb_movie['original_language'];

        $movie['genres'] = $imdb_movie['genres'];

        $movie['images'] = array_slice($imdb_movie['images']['backdrops'], 0, 5);

        $casts = array_slice($imdb_movie['credits']['cast'], 0, 5);

        $movie['crews'] =  $casts;

        $imdb_crews = $imdb_movie['credits']['crew'];
        $director = null;

        foreach ($imdb_crews as $imdb_crew)
        {
            if ($imdb_crew['job'] == 'Director')
            {
                $director = $imdb_crew;
                break;
            }
        }
        $movie['director'] = $director;

        return $movie;
    }
}
