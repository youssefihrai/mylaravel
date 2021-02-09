<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model
{

        protected $fillable = [
           'etudiant_id','company_encadrants_id','jury1','jury2'
           ,'classe','date','etat','pedagogiqueencadrant_id','livrable','noteRapportjury1','noteRapportjury1',
           'noteRapportencadrant','noteRapport','notejury1','notejury2','notejury'
        ];
        public  function   pedagogiqueencadrant(){
            return $this->hasMany('App\Pedagogiqueencadrant');
        }
        public  function   etudiant(){
            return $this->hasMany(Etudiant::class);
        }
        public  function   companyencadrant(){
            return $this->hasMany('App\companyencadrant');
        }
    }

