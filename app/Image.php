<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
//// relation entre image ,user  et post   one to one polymorph


class Image extends Model
{
protected $fillable=['path'];
//relation oneTo one
public function imageable(){
    //return $this->belongsToTo();
    return $this->morphTo();
}

}
