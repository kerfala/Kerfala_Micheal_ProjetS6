<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;
use App\Contrat;
use App\Utilisateur;
use App\Etudiant;
use App\Disponibilite;

use Illuminate\Support\Str;

class DisponibleController extends Controller
{
    //
     //mettre code dans show et dans la table propo dispo
    public function index(){
    	
    }

    public function store(Request $requests){
    	
        //erreur ici:j'ai vu modifier la MIGRATION ou changer carrement le nom contrat_id et user_id
       //$la_requete =$requests->all();
       //dd($la_requete);
        $etudiant_id = Etudiant::SearchByUtilisateurId($requests->get('identifiant'));
        $user = Utilisateur::findOrFail($requests->get('identifiant'));
        //$user = $etudiants;
        //dd($etudiant_id);
        //dd($requests->get('jour'));
        $disp = new Disponibilite();
        //dd($disp->convertir($requests->get('jour')));

        //dd($etudiants);
        //$contrat = $etudiant->contrat;
        //$contrat = Contrat::get();//iyeah
        //$contrat = $etudiants->contrat;
        $contrat = Contrat::get();
        
        //dd($contrat);
        $debut=strtotime($requests->get('debut'));
        $fin=strtotime($requests->get('fin'));
       $disponible = Disponibilite::create(['jour_id' => $disp->convertir($requests->get('jour')),
                                            'etudiant_id' => $etudiant_id,
                                              'heureDebut' => $requests->get('debut'),
                                              'heureFin' => $requests->get('fin'),
                                              'valider' => false,
                                              ]);
        //Session::flash('succes','Disponibilité ajouter reste sa validation');
        return redirect(route('connexion.show',compact('user')))->with('succes','Disponibilité ajouter reste sa validation');
        /*$contrat_disp = new $this->disponibilite(['contrat_id' => $etudiant->contrat_id,
                                                    'disponibilite_id' => $disponible->id_dispo
                                                ]);*/
       
        //faire toutes les operations necessaire pour ca

        //$contrat = Contrat
       
    }
    public function edit($id){
        dd($id);
    }
    public function show($id){
        //dd($id);
    }
    public function update($id,Request $requests){
        
        dd($requests->all());
        
       
    }
}
