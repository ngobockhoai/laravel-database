<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function imageable()
    {
        return $this->morphTo();
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
