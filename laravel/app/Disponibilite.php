<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Disponibilite extends Model
{
   	protected $fillable = ['jour_id','etudiant_id','heureDebut','heureFin','valider'];
   	//la liaison contrat disponibilite 1
   	/*public function contrat(){
   		return $this->belongsToMany('App\Contrat')
   	}*/
   	public function convertir($jour){
   		if($jour == "Lundi")
   			return 1;
   		else if ($jour == "Mardi")
   				return 2;
		else if ($jour == "Mercredi")
				return 3;
		else if ($jour == "Jeudi")
				return 4;
		else if ($jour == "Vendredi")
				return 5;
		else if ($jour == "Samedi")
				return 6;
		else if ($jour == "Dimanche")
				return 7;
   	}
      public function db_calendrier($numero_jour){
         $la_date = carbon::now();
         if ($numero_jour =="1")
            return $la_date->next(carbon::MONDAY);
            else if ($numero_jour == "2")
                  return $la_date->next(carbon::TUESDAY);
            else if ($numero_jour == "3")
                  return $la_date->next(carbon::WEDNESDAY);
            else if ($numero_jour == "4")
                  return $la_date->next(carbon::THURSDAY);
            else if ($numero_jour == "5")
                  return $la_date->next(carbon::FRIDAY);
            else if ($numero_jour == "6")
                  return $la_date->next(carbon::SATURDAY);
            else if ($numero_jour == "7")
                  return $la_date->next(carbon::SUNDAY);
         
      }
      public function scopeNonValidedisponible($query,$q){
         return $query->where('valider',false)->where('etudiant_id',$q);
    }
}
