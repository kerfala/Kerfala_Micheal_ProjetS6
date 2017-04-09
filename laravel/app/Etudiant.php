<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['utilisateur_id','contrat_id'];
    //la liaison contrat etudiant 3
    public function contrat(){
    	return $this->belongsTo('App\Contrat');
    }
    //la liaison horaire etudiant 4
    public function horaire(){
    	 return $this->belongsToMany('App\Horaire');
    }
    public function jours(){
         return $this->belongsToMany('App\Jour');
    }
    
    //heritage
    public function utilisateur(){
        return $this->belongsTo('App\Utilisateur');
    }
    //requete
     public function scopeSearchByUtilisateurId($query,$q){
        return $query->where('utilisateur_id',$q)->value('id');
    }
    public function scopeSearchByContratId($query,$q){
        return $query->where('contrat_id',$q);
    }

}
