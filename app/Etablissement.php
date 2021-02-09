<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Etablissement extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    //relation one to many
    public  function   etudiants(){
        return $this->hasMany('App\Etudiant');
    }
    public  function   encadrants(){
        return $this->hasMany('App\Encadrant');
    }

    public  function   companyencadrant(){
        return $this->hasMany('App\CompanyEncadrant');
    }
    public  function   pedagogiqueencadrant(){
        return $this->hasMany('App\Pedagogiqueencadrant');
    }
    }
