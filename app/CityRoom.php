<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CityRoom extends Pivot
{
    public $incrementing = true; // only if this pivot model has an auto-incrementing primary key

    protected static function booted()
    {
        static::created(function ($cityroom) {
            dump($cityroom);
        });
    }
}
