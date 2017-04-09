<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/kerfala', function () {
    return 'licence 3 informatique';
});
Route::get('/salut', function () {
    return 'oui tu vas bien';
});
Route::resource('new','UtilisateursController');
Route::resource('connexion','ConnexionController');
Route::resource('etudiant','EtudiantController');
Route::resource('conges','CongesController');
Route::resource('recherche','RechercheController');
Route::resource('disponibilite','DisponibleController');



Route::get('/connexion{id}','ConnexionController@show');

Route::post('/utilise','UtilisateursController@connection')->name('utilise');
Route::get('/utilise','UtilisateursController@connection')->name('utilise');

Route::get('/search{id}','RechercheController@show');

Route::get('/', function () {
    return view('index');
});

