<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShowTime extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'show_times';

    /**
     * @var string[]
     */
    protected $fillable = ['movie_id', 'start_date', 'end_date'];

    /**
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    /**
     * @return HasMany
     */
    public function theaterShowTimes(): HasMany
    {
        return $this->hasMany(TheaterShowTime::class, 'show_time_id');
    }

    /**
     * @return Attribute
     */
    public function startDate(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
        );
    }

    /**
     * @return Attribute
     */
    public function endDate(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
        );
    }
}
