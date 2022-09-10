<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Services\ImdbService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    protected $imdbService;

    public function __construct(ImdbService $imdbService)
    {
        $this->imdbService = $imdbService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $imdb_genres = $this->imdbService->getGenres();

        foreach ($imdb_genres as $imdb_genre)
        {
            $genre = new Genre();
            $genre['name'] = $imdb_genre['name'];
            $genre->save();
        }
    }
}
