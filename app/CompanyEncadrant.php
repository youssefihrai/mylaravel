<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CompanyEncadrant extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','name', 'email', 'matricule','date_naissance','sexe','telephonne','password','adresse','etablissement_id'
    ];

    protected $guard = 'encadrant';
    /**
    * The attributes that should be hidden for arrays.

    * @var array
    */
    protected $hidden = [
        'password',
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

    public  function   etablissement(){
        return $this->belongsTo('App\Etablissement','etablissement_id');
    }
    public function  etudiants(){
        return $this->belongsToMany(Etudiant::class,'soutenances','company_encadrants_id')->withPivot(['classe','date','id','noteencadrant','livrable']);
    }
    public  function   etudiant(){
        return $this->belongsToMany(Etudiant::class,'soutenances','id','etudiant_id');
    }

}
