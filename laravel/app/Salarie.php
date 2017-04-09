<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salarie extends Model
{
     protected $fillable = ['utilisateur_id'];
     //heritage
    public function utilisateur(){
        return $this->belongsTo('App\Utilisateur');
    }
}
