@extends('default')
@section('content')

<h1>Editer Utilisateur</h1>
@include('succes')
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <span style="font-size:6em;"class="glyphicon glyphicon-user"></span>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Info <strong>. Attention</strong>. Information modifie l'utlisateur concerné.
        </div>
        <h3>Information Utilisateur</h3>
        {{Form::model($connecter,['method' => 'put','class' => 'form-horizontal','url' => route('new.update',$connecter)])}}
        <!--form class="form-horizontal" role="form"-->
          <div class="form-group">
            <label class="col-lg-3 control-label">Nom:</label>
            <div class="col-lg-8">
              <input class="form-control" name="nom"  value={{$connecter->nom}} type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Prenom:</label>
            <div class="col-lg-8">
              <input class="form-control" name="prenom"  value={{$connecter->prenom}} type="text">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" value={{$connecter->email}} type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Pass:</label>
            <div class="col-md-8">
              <input class="form-control" name="pass1"  value={{$connecter->motDePasse}} type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirmer:</label>
            <div class="col-md-8">
              <input class="form-control"  name="pass2" value={{$connecter->motDePasse}} type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input class="btn btn-primary" value="Modifier" type="submit">
              <span></span>
              <input class="btn btn-default" value="Retour" type="reset">
            </div>
          </div>
        <!--/form-->
        {{Form::close()}}
      </div>
 
<hr>
@endsection