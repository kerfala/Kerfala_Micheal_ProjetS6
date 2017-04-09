<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = ['nom','prenom','email','motDePasse'];
    //la liaison conges utilisateur 2
    public function conges(){
    	return $this->hasMany('App\Conges');
    }
    //gestion des heritages
    public function etudiant(){
    	return $this->hasOne('App\Etudiant');
    }
    public function salarie(){
    	return $this->hasOne('App\Salarie');
    }
    public function responsable(){
    	return $this->hasOne('App\Responsable');
    }
    //************
    public function scopeSearchByNom($query,$q){
        return $query->where('nom','LIKE','%'.$q.'%');
    }
    public function scopeSearchByPrenom($query,$q){
        return $query->where('prenom','LIKE','%'.$q.'%');
    }
    public function scopeSearchByNomPrenom($query,$q){
        return $query->where('prenom','LIKE','%'.$q.'%')->orWhere('nom','LIKE','%'.$q.'%');
    }

}
