<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    protected $fillable = ['jour','heureDebut','heureFin'];
    //la liaison horaire etudiant 4
    public function etudiant(){
    	 return $this->belongsToMany('App\Etudiant');
    }
}
