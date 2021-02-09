<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//// relation entre image ,user  et post   one to one polymorph

class Utilisateur extends Authenticatable
{
    use HasApiTokens, Notifiable;
    public const language=[
        'eng'=>'english',
        'fr'=>'français',
        'ar'=>'arabe'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'email', 'password','type'
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
    ];
    //relation one to many
    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function scopeuserpost( Builder $query)
    {
        return $query->withCount('posts')->orderBy('posts_count','desc');
    }
    public function scopeuserlastmonth(Builder $query){
        return $query->withCount(['posts'=>function(Builder $query){
            return $query->wherebetween(static::CREATED_AT,[now()->subMonth(1),now()]);
        }])
        ->having('posts_count','>',2)
        ->orderBy('posts_count','desc');    }
        public function image(){
            //return $this->hasOne('App\Image','imageable');
            return $this->morphOne('App\Image','imageable');
        }
        public function comments()
    {
       // return $this->hasMany('App\Comment','commentable')
        return $this->morphMany('App\Comment','commentable')
        ->dernier()
        ;
    }
    }
