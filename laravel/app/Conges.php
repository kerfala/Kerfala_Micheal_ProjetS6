<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    protected $fillable = ['dateDebut','dateFin','validation','utilisateur_id'];
    //la liaison conges utilisateur 2
    public function utilisateur(){
    	return $this->belongsTo('App\Utilisateur');
    }
    //requete
    public function scopeNonValide($query,$q){
    	return $query->where('validation',false)->where('utilisateur_id',$q);
    }
    public function scopeIdConge($query,$q){
        return $query->where('id_conges',$q);
    }
    public function scopeIdCongevaleur($query,$q){
        return $query->where('id_conges',$q)->value('id_conges');
    }
    //les dates
    public function getDates(){
    	return ['created_at','updated_at','dateDebut','dateFin'];
    }
}
