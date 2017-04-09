<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utilisateur;
use App\Etudiant;
use App\Conges;
use App\Disponibilite;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;

class EtudiantController extends Controller
{
    //
    public function index(){  
        $etudiants = Etudiant::get();
        $users = Utilisateur::get();
        //$connecter = Utilisateur::findOrFail($id);
        //$responsables = Responsable::get();
       
        /*"2017-03-20T08:00:00+00:00",
            "2017-03-20T15:00:00+00:00",*/

        $debut = Carbon::create(2017,03,20,08,0,0);
        $fin= Carbon::create(2017,03,20,15,0,0);
        $debut = "2017-03-20 08:00:00+00:00";
           $fin= "2017-03-20 15:00:00+00:00";
           $format = "Y-m-d H:i:s";
           //dd($propo->jour);
       // $debut = $propo->created_at;
        //$debut = $propo->updated_at;
          // new DateTime::createFromFormat("Y-m-d H:i:s",date($debut));
           //new DateTime::createFromFormat("Y-m-d H:i:s",date($fin));
        $events = [];
        $events = Calendar::event (
            "nom event 0",
            true,
            $debut,
            '2017-03-21T15:00:00+00:00',
            0
            );
        $calendar = Calendar::addEvent($events);
                               /* ->setOptions([
                                            'firstday'=>1
                                    ])->setCallbacks([]);*/
        //Interface etudiant
        foreach ($etudiants as $etu){
            foreach ($users as $user){
                if ($user->id == $etu->utilisateur_id)
                    return view('pages.etudiant',compact('connecter','users','etudiants','calendar'));
            }
        }     
    }

    public function create(){
    	
    }

     public function store(Request $requests){     
       	//dd($requests->all());
        $connecter = Utilisateur::findOrFail($requests->get('identifiant'));
        $etudiant = Etudiant::findOrFail($requests->get('concerner'));
        $personne = Utilisateur::findOrFail($etudiant->utilisateur_id);
        $conges = Conges::NonValide($etudiant->utilisateur_id)->get();
        $dispos = Disponibilite::NonValidedisponible($etudiant->id)->get();
        return view('pages.modifieEtudiant',compact('connecter','personne','conges','dispos'));
        //dd($etudiant->utilisateur_id);

    }
   
    public function update($id,Request $requests){
       
    }
    public function show($id){
        dd($id);

    }
    
    public function edit($id){
    	

    }
    public function destroy($id){

    }
}
