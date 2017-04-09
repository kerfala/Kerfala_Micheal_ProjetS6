<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utilisateur;
use App\Etudiant;
use App\Conges;
use App\Propo_disponibilite;
use Carbon\Carbon;
use Illuminate\Support\Str;
class CongesController extends Controller
{
    //
    public function index(){
       
        //Conges::destroy()
        //$conge = Conges::IdConge()->get();
        //dd($conge);
    }
    
    public function store(Request $requests){
        if ($requests->get('identifiant')){
        	$etudiants = Etudiant::get();
        	$users     = Utilisateur::get();
        	$connecter = Utilisateur::findOrFail($requests->get('identifiant'));
        	$etudiant  = Etudiant::SearchByUtilisateurId($requests->get('identifiant'))->get();
        	$user      = Utilisateur::findOrFail($requests->get('identifiant'));
        
        	/*conversion des donnees type date*/ 
        	$d     = str_limit($requests->get('debut'),$limit=10,$end='');
            $debut = date('Y-m-d',strtotime($d));
           
            $d     = str_limit($requests->get('fin'),$limit=10,$end='');
            $fin   = date('Y-m-d',strtotime($d));
            //********
        	$conge = Conges::create(['dateDebut' => $debut,
        							  'dateFin' => $fin,
        							  'validation',false,
        							  'utilisateur_id' => $user->id,
        							  ]);
        	//message flash
         	return redirect(route('connexion.show',compact('user')))->with('succes','congé pris en compte');
        }
        else{
            $conge = Conges::IdConge($requests->get('idconge'))->get();
            //dd($conge);
            $idc = Conges::IdCongevaleur($requests->get('idconge'));
            //dd($idc);
            return redirect(route('conges.show',compact('idc')));
            //$conge = Conges::destroy($idc);
            //Conges::destroy($requests->get('idconge'));
            $rechercher = $requests->get('recherche');
            $users = Utilisateur::with('conges')->SearchByNomPrenom($requests->get('recherche'))->get();
            $conges = Conges::get();
            $connecter = Utilisateur::findOrFail($requests->get('identifiant'));
            return view('pages.validation',compact('users','connecter','conges','rechercher'));
        }
    }
    public function edit($id){
    	dd($id);
    }
    public function show($id){
    	//dd("suppression kerfala camara");
         //dd($id);
         Conges::destroy($id);
    }
    public function update($id,Request $requests){
        //dd($requests->get('idconges'));
        $connecter   = Utilisateur::find($id);
        $conge = Conges::IdConge($requests->get('idconge'))->get();
        
        if ($requests->get('validation') != null){
             $conge->update(['dateDebut' => $requests->get('debut'),
                             'dateFin' => $requests->get('fin'),
                             'validation' => $requests->get('validation'),
                             'utilisateur_id' => $requests->get('pers'),
                           ]);
        }
        //dd("kerfala");
        //faire toutes les operations necessaire pour ca
        $rechercher = $requests->get('recherche');
        $users = Utilisateur::with('conges')->SearchByNomPrenom($requests->get('recherche'))->get();
        $conges = Conges::get();
        $connecter = Utilisateur::findOrFail($requests->get('identifiant'));
        return view('pages.validation',compact('users','connecter','conges','rechercher'));
         //return redirect(route('recherche.store'))->with('succes','ce congé est validé');
         
         
    }
    public function destroy($id){
        dd("suppresion");
    }
}
