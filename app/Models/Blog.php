<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = ['title', 'status', 'description', 'image'];

    protected function statusType(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status == 1 ? 'News' : ($this->status == 2 ? 'Events' : 'Activity')
        );
    }
}
