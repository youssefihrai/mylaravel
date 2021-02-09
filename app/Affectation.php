<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $fillable = [
       'etudiant_id','pedagogiqueencadrant_id','classe','horaire','id'
    ];
    public  function   pedagogiqueencadrant(){
        return $this->hasMany('App\Pedagogiqueencadrant');
    }
    public  function   etudiants(){
        return $this->hasMany(Etudiant::class);
    }

}
