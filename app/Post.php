<?php

namespace App;

use App\Scopes\AuthadminScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
//// relation entre image ,user  et post   one to one polymorph

class Post extends Model
{

    use SoftDeletes;
    protected $fillable = ['title', 'content', 'slug', 'active', 'entreprise_id'];
    protected $hidden = ['deleted_at'];//cacher au  niveau d'affichage d'api
    /// relation one to many  avec commentaire

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable')
        ->dernier()
        ;
    }
    public function scopemost(Builder $query)
{
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }

    public static function boot()
    {
        static::addGlobalScope(new AuthadminScope);
        parent::boot();

        static::addGlobalScope(new LatestScope);

    }
    //relation one to many
    public function entreprise(){
        return $this->belongsTo('App\Entreprise');
    }
    public function tags(){
        //return $this->belongsToMany('App\Tag')->withTimestamps();
        return $this->morphToMany('App\Tag','taggable')->withTimestamps();
    }
    //relation one to one
    public function image(){
        return $this->morphOne('App\Image','imageable');
    }
}
