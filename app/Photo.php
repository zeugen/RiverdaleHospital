<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    
    protected $uploads = '/images/';
    protected $fillable = ['file'];


    //create an accessor = used to echo out wiht image attached to file/path

    public function getFileAttribute($photo){
        return $this->uploads.$photo;
    }
}
