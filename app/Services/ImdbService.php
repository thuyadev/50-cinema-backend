<?php

namespace App\Services;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

class ImdbService
{
    public function searchMovie(string $search): array
    {
        $movies = [];

        try {
            if ($search != "")
            {
                $movies = Http::get(env('MOVIEDB_URL') . '/3/search/movie?api_key=' . env('MOVIEDB_API_KEY') . '&query=' . $search . '&language=en-US&page=1&include_adult=false')->json()['results'];
            }
        } catch (\Exception $e)
        {
            throw new CustomException($e->getMessage(), 500);
        }

        return $movies;
    }

    public function getMovieDetail(int $id): array
    {
        try {
            $movie = Http::get(env('MOVIEDB_URL') . '/3/movie/' . $id . '?api_key=' . env('MOVIEDB_API_KEY') . '&append_to_response=credits,videos,images')->json();

        } catch (\Exception $e)
        {
            throw new CustomException($e->getMessage(), 500);
        }

        return $movie;
    }

    public function getGenres(): array
    {
        $genres = Http::get(env('MOVIEDB_URL') . '/3/genre/movie/list?api_key=' . env('MOVIEDB_API_KEY') . '&language=en-US')->json()['genres'];

        return $genres;
    }
}
