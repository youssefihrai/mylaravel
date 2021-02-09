<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Authenticatable
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
        'id','name', 'email', 'matricule','date_naissance','sexe','password','adresse','typegroupe','etablissement_id'
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

    public  function   etablissement(){
        return $this->belongsTo('App\Etablissement','etablissement_id');
    }
    public function image(){
        return $this->morphOne('App\Image','imageable');
    }
    public function  pegaogiqueencadrants(){
        return $this->belongsToMany(Pedagogiqueencadrant::class,'affectations')->withPivot(['classe','horaire','id']);;
    }
    public function  jury2(){
        return $this->belongsToMany(Pedagogiqueencadrant::class,'soutenances','etudiant_id','jury2')->withPivot(['classe','date','jury2','id']);;
    }
    public function  jury1(){
        return $this->belongsToMany(Pedagogiqueencadrant::class,'soutenances','etudiant_id','jury1')->withPivot(['classe','date','jury2','id']);;
    }

    public function  affectation(){
        return $this->belongsTo(Affectation::class);
    }
    public function  encadre(){
        return $this->belongsToMany(CompanyEncadrant::class,'soutenances')->withPivot(['classe','date','jury2','id']);;
    }
    public function  encadres(){
        return $this->belongsToMany(CompanyEncadrant::class,'soutenances','etudiant_id','company_encadrants_id')->withPivot(['classe','date','jury2','id','notglobale']);;
    }

}

