<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //protected $table = 'my_rooms';
    //protected $primaryKey = 'room_id';
    //public $timestamps = false;
    //protected $connection = 'sqlite';
    public function cities()
    {
        return $this->belongsToMany('App\City','room_city','room_id','city_id')->using('App\CityRoom'); //2nd 3rd 4th args are optional;
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable');
    }
}
