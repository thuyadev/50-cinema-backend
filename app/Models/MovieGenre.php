<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovieGenre extends Model
{
    use HasFactory;

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
