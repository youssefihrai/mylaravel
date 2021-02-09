<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $fillable=['content','entreprise_id'];
    use SoftDeletes;
    public function commentable(){
        ///return $this->BeloongTo();
        return $this->morphTo();
    }
  /*  public function post()
    {
        return $this->belongsTo('App\Post');
    }*/

    public function scopedernier(Builder $query){
        return $query->orderBy(static::CREATED_AT,'desc');
    }
    public function comment(){
        return $this->belongsTo('App\Entreprise');
    }
    public function tags(){
        //return $this->belongsToMany('App\Tag')->withTimestamps();
        return $this->morphToMany('App\Comment','taggable')->withTimestamps();
    }
    public static function boot()
    {

        parent::boot();

        static::deleting(function (Post $post) {
            $post->comments()->delete();
        });

    }
}
