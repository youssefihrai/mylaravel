<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //chaque authe a un est un seul pofile
    public function profile(){
        return $this->hasOne('App\Profile');
    }
}
