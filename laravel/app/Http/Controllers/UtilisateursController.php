<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Ab;
use Illuminate\Support\Facades\Session;




use App\Http\Requests;
use App\Utilisateur;
use App\Contrat;
use App\Etudiant;
use App\Salarie;
use App\Responsable;

class UtilisateursController extends Controller
{
    public function index(){

    	$users = Utilisateur::get();
        $etudiants = Utilisateur::with('etudiant')->get();
        $responsables = Utilisateur::with('responsable')->get();
        $connecter = Utilisateur::first();//juste pour eviter les erreurs dans le travail:elle sera enlever
        return view('connection',compact('connecter','users','etudiants','responsables'));

    	
    }

    public function connection(Request $requests){

    	$etudiants = Etudiant::get();//a modifier mettre un scope
        $responsables = Utilisateur::with('responsable')->get();
        $users = Utilisateur::get();
        return view('pages.responsable',compact('users','etudiants','responsables'));
    }

    
     public function create(){
         

    }
     public function store(Request $requests){
       // return 'au niveau store';
        $etudiants = Etudiant::get();//a modifier mettre un scope
        $responsables = Utilisateur::with('responsable')->get();
        $users = Utilisateur::get();
        $connecter = Utilisateur::findOrFail($requests->get('identifiant'));
        //dd($requests->get('contrat'));
    //***************************CREATION D'UN UTILISATEUR
       $user = Utilisateur::create(['nom' => $requests->get('nom'),
                             'prenom' => $requests->get('prenom'),
                             'email' => $requests->get('email'),
                             'motDePasse' => $requests->get('pass'),
                            ]);
       
       //verification type d'utilisateur creé
       if ($requests->get('optradio')=='etudiant'){
            $contrat = Contrat::create(['type' => $requests->get('contrat')]);
            Etudiant::create(['utilisateur_id' => $user->id,
                              'contrat_id' => $contrat->id,
                            ]);
            Session::flash('succes','l\'étudiant à été sauvegardé');
             return view('pages.responsable',compact('users','connecter','etudiants','responsables'));
         }
        else if ($requests->get('optradio')=='admin'){
            Responsable::create(['utilisateur_id' => $user->id ]);
            Session::flash('succes','le responsable à été sauvegardé');
             return view('pages.responsable',compact('users','connecter','etudiants','responsables'));
        }
            
        else {
             Salarie::create(['utilisateur_id' => $user->id]);
             Session::flash('succes','le salarie à été sauvegardé');
             return view('pages.responsable',compact('connecter','users','etudiants','responsables'));
        }
           
        return redirect(route('utilise'));
    //************************************************************

    }
    
    public function update($id,Request $requests){
        //dd($requests->prenom);
        $utilisateur = Utilisateur::findOrFail($id);
        if ( $requests->get('pass1') == $requests->get('pass2')){
            $utilisateur->update(['nom' => $requests->get('nom'),
                                 'prenom' => $requests->get('prenom'),
                                 'email' => $requests->get('email'),
                                 'motDePasse' => $requests->get('pass1'),
                                 ]);
            $user = Utilisateur::findOrFail($id);
            return redirect(route('connexion.show',compact('user')))->with('succes','Modfication prise en compte');
        }
        else{
            $connecter = Utilisateur::findOrFail($id);
             return redirect(route('new.edit',compact("connecter")))->with('probleme','mot de Passe différent Veuillez resaisir pass identique');
        }

        
       
    }
    public function show(){

    }
    
    public function edit($id){
        //dd($id);
        $connecter = Utilisateur::findOrFail($id);
        return view('pages.editerUtilisateur',compact('connecter'));
       

    }
    public function destroy($id){

    }
}
