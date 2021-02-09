<?php
///relation  one to one
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
      //chaque profile a un est un seul author
      public function author(){
        return $this->belongsTo('App\Profile');// belogns  c'est a dire contient on 
        //l'a fait dans l'objet qui contient la clés etrangére
    }

}
