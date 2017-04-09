<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Utilisateur;
use App\Conges;
class RechercheController extends Controller
{
    //
    public function index(){
    	return view('pages.validation');
    }
    public function store(Request $requests){
    	//dd($requests->all());
        if ($requests->get('identifiant')){//validation congé
            $rechercher = $requests->get('recherche');
            $users = Utilisateur::with('conges')->SearchByNomPrenom($requests->get('recherche'))->get();
            $conges = Conges::get();
            $connecter = Utilisateur::findOrFail($requests->get('identifiant'));
            return view('pages.validation',compact('users','connecter','conges','rechercher'));
        }
        else{//modifier dispo (creation d'une vue)
            dd("disponibilite");
        }    	
    }
   
    public function show(){

    	//dd($id);
    }
}
