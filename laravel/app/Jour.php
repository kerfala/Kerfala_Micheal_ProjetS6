<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    //
    protected $fillable = ['nom_jour'];
    public function etudiants(){
         return $this->belongsToMany('App\Jour');
    }
}
