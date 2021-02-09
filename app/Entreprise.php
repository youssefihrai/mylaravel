<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Entreprise extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public const language=[
        'eng'=>'english',
        'fr'=>'français',
        'ar'=>'arabe'
    ];
    protected $fillable = [
        'name', 'email', 'password'
    ];
    protected $guard = 'etablissement';
    /**
     * The attributes that should be hidden for arrays.

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
    public function posts() {
        return $this->hasMany('App\Post');
    }
    public function comments()
    {
       // return $this->hasMany('App\Comment','commentable')
        return $this->morphMany('App\Comment','commentable')
        ->dernier()
        ;
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

}
