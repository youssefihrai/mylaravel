<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedagogiqueencadrant extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','name', 'email', 'matricule','date_naissance','sexe','telephonne','password','adresse','grade','matiere','departement','etablissement_id'
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
    public function image(){
        return $this->morphOne('App\Image','imageable');
    }
    public  function   etudiants(){
        return $this->belongsToMany(Etudiant::class,'affectations')->withPivot(['classe','horaire','id','seance1','seance2','seance3','seance4']);
    }
    public  function   affectations(){
        return $this->belongsTo('App\Affectation','pedagogiqueencadrant_id');
    }
    public  function   etudiant(){
        return $this->belongsToMany(Etudiant::class,'soutenances','id','etudiant_id')->withPivot(['classe','date','id']);;
    }
    public function  jury2(){
        return $this->belongsToMany(Etudiant::class,'soutenances','jury2','id')->withPivot(['classe','date','jury2','id']);;
    }
    public function  jury1(){
        return $this->belongsToMany(Etudiant::class,'soutenances','jury1','id')->withPivot(['classe','date','jury1','id']);;
    }


}
