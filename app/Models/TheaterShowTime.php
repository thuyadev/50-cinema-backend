<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class TheaterShowTime extends Model
{
    use HasFactory;

    protected $table = 'theater_show_times';

    protected $fillable = ['show_time_id', 'cinema_id', 'theater_id', 'time'];

    public function showTime(): BelongsTo
    {
        return $this->belongsTo(ShowTime::class, 'show_time_id');
    }

    public function movie(): HasOneThrough
    {
        return $this->hasOneThrough(ShowTime::class, Movie::class);
    }

    public function cinema(): BelongsTo
    {
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }

    public function theater(): BelongsTo
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }
}
