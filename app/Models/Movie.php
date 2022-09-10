<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Movie extends Model
{
    use HasFactory, HasPhoto;

    protected $table = 'movies';

    protected $fillable = ['name', 'description', 'initial_release_date',  'production_company', 'distributed_by',  'movie_length',  'trailer',  'movie_poster',  'language'];

    public function movie_genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }

    public function movie_crews(): BelongsToMany
    {
        return $this->belongsToMany(Crew::class, 'movie_crews', 'movie_id', 'crew_id');
    }

    protected function initialReleaseDate(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
        );
    }

    protected function directorName(): Attribute
    {
        $director = null;

        foreach ($this->movie_crews as $crew)
        {
            if ($crew['status'] == 2)
            {
                $director = $crew['name'];
            }
        }
        return Attribute::make(
            get: fn() => $director
        );
    }
}
