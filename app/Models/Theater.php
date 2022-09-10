<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Theater extends Model
{
    use HasFactory;

    protected  $table = 'theaters';

    protected  $fillable = ['name', 'cinema_id', 'seat'];

    public function cinema(): BelongsTo
    {
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }

    protected function cinemaName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->cinema->name
        );
    }
}
