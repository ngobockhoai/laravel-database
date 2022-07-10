<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    // protected $with = ['address'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'meta' => 'json',
    ];

    public function address (){
        return $this->hasOne('App\Address','user_id','id')->withDefault(['country'=>'no addrees attached yet']); //2nd 3rd args optional
        // withDefault() only for: belongsTo, hasOne, hasOneThrough, and morphOne relations
    }

    public function comments(){
        return $this->hasMany('App\Comment','user_id','id');
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
    public function likedImages()
    {
        return $this->morphedByMany('App\Image', 'likeable');
    }

    public function likedRooms()
    {
        return $this->morphedByMany('App\Room', 'likeable');
    }
}
