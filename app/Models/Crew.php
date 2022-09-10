<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected  $table = 'crews';

    protected  $fillable = ['name', 'status'];

    protected function role(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->status == 1 ? 'cast' : 'director'
        );
    }
}
