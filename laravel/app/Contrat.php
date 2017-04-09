<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable = ['type'];
    //la liaison contrat etudiant 3
    public function etudiant(){
    	return $this->hasOne('App\Etudiant');
    }
    //la liaison contrat disponibilite 1
    public function disponibilite(){
   		return $this->belongsToMany('App\Disponibilite');
   	}
   	//requete
   	 public function scopeSearchByContratId($query,$q){
        return $query->where('id',$q);
    }
    /*static public function getAll() {
        return Contrat::get();
    }*/
    public function scopeContratEtudiant($query){
        return $query->type;
    }
    static public function getidAttribute($q){
      return Contrat::get()->where('id',$q);
    }
  
}
