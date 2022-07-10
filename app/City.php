<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function rooms(){
        return $this->belongsToMany('App\Room','room_city','city_id','room_id')->withPivot('created_at','updated_at')->using('App\CityRoom'); //2nd 3rd 4th args are optional;
        // wherePivot() wherePivotNotIn() or wherePivotIn('priority', [1, 2]);
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
