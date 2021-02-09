<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //relation many to many
    public function posts(){
        //return $this->belongsToMany('App\Post')->withTimestamps();
        return $this->morphedByMany('App\Post','taggable')->withTimestamps();
    }
    public function userss(){
        //return $this->belongsToMany('App\Post')->withTimestamps();
        return $this->morphedByMany('App\User','taggable')->withTimestamps();
    }

}
