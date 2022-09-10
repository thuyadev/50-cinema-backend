<?php

namespace App\Traits;

use App\Models\Photo;

trait HasPhoto
{

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
