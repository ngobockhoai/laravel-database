<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $touches = ['user'];
    /**
     * @var Casts
     */

    protected $casts = [
        'rating' => 'float',
    ];
    /**
     * @var SoftDeletes
     */
    // use SoftDeletes;
    /** 
     * retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
     * @var Guide
     * when issuing a mass update or delete via Eloquent, the saved, updated, deleting, and deleted
     * model events will not be fired for the affected models. 
     * This is because the models are never actually retrieved when issuing a mass update or delete.
     * 
     *  */ 
    // protected $dispatchesEvents = [
    //     'saved' => 'class to handle saved event',
    //     'deleted' => 'class to deleted saved event'
    // ];

    protected $fillable =['rating','content','user_id'];
    // protected static function booted(){
    //     static::addGlobalScope('rating',function(Builder $builder){
    //         $builder->where('rating','>',2);
    //     });
    // }

    public function scopeRating($query,int $value = 4){
        return $query->where('rating','>',$value);
    }
    /**
     * @var EventOn 
     * @var Laravel
     * @var Queries
     */
    // protected static function booted()
    // {
    //     static::retrieved(function ($comment) {
    //         echo $comment->rating;
    //     });
    // }
    /**
     * @var get[name]Attribute - To get
     * @var set[name]Attribute - To update
     */
    // public function getRatingAttribute($value)
    // {
    //     return $value + 10;
    // }

    public function getWhoWhatAttribute()
    {
        return "user {$this->user_id} rates {$this->rating}";
    }

    // public function setRatingAttribute($value)
    // {
    //     $this->attributes['rating'] = $value + 1;
    // }
    
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function country()
    {
        return $this->hasOneThrough('App\Address', 'App\User', 'id', 'user_id','user_id','id')->select('country as name');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
    
