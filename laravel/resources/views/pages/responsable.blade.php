@extends('default')
@section('button')
	<ul class="nav masthead-nav">
        <li ><span class="glyphicon glyphicon-user"></span></li>
			<li>{{ $connecter->nom }}</li> 
			<li>{{ $connecter->prenom }}</li>
			<li>
				 <div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
				  		<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				   	 <li><a href="{{route('new.index')}}">Deconnexion</a></li>
				   	 <li><a href="{{route('new.edit',compact("connecter"))}}">Modifier Profil</a></li>
				  </ul>
				</div> 
			</li>
	</ul>
@endsection

@section('content')
     <ul class="nav nav-tabs" id="myTab">
	     <li class="active"><a data-toggle="tab" href="#menu1">Creer Utilisateur</a></li>
		 <li><a data-toggle="tab" href="#menu2">Valider Congé</a></li>
		 <li><a data-toggle="tab" href="#menu3">Modifier Dispo</a></li>
		 <li class="dropdown">
			 <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#">
				  Liste <b class="caret"></b>
			 </a>
			 <ul aria-labelledby="myTabDrop1" role="menu" class="dropdown-menu">
				 <li><a data-toggle="tab" href="#dropdown1">Liste Etudiants</a></li>
				 <li><a data-toggle="tab" href="#dropdown2">Liste Employés</a></li>
			 </ul>
		 </li>
	 </ul>
	 <div class="tab-content" id="myTabContent">
	 	 <div id="menu1" class="tab-pane fade active in">
				<!--p><br>Texte Accueil</p>-->
				 <!--form -->
			@if(Session::has('succes'))		
				<div class="alert alert-success">
					{{Session::get('succes')}}
				</div>
			@endif
			 {{Form::open(['url' => route('new.store')])}}
				 <div class="form-group">
				 	 {{ Form::hidden('identifiant',$connecter->id,['class' => 'form-control','name' => 'identifiant']) }}
					 {{ Form::text('nom',null,['class' => 'form-control','placeholder' => 'Nom','name' => 'nom']) }}
					 {{ Form::text('prenom',null,['class' => 'form-control','placeholder' => 'Prenom','name' => 'prenom']) }}
					 {{ Form::text('email',null,['class' => 'form-control','placeholder' => 'Email','name' => 'email']) }}
					 {{ Form::text('pass',null,['class' => 'form-control','placeholder' => 'Mot de Passe','name' => 'pass'])}}
				 </div>
				 <div class="form-group">
					 {{ form::label('admin','Admin') }}
					 {{ form::radio('optradio','admin')}}
					 {{ form::label('salarie','Salarie')}}
					 {{ form::radio('optradio','salarie')}}
					 {{ form::label('etudiant','Etudiant')}}
					 {{ form::radio('optradio','etudiant','true')}}
				 </div>
				 <div class="navbar-form navbar-left">
					 <!--{{Form::text('contrat',null,['class' => 'form-control','placeholder' => 'type','name' => 'contrat'])}}-->
					 <select name="contrat" class="form-control">
							<option>CDD</option>
							<option>CDI</option>
					</select>
				 </div>
				 <button type="submit" class="btn btn-default">Ajouter</button>
			 {{Form::close()}}				
	 	 </div>
		 <div id="menu2" class="tab-pane fade">
			 <p><br>Texte Messages</p>
			 {{Form::open(['url' => route('recherche.store'),'class' =>'navbar-form navbar-left'])}}
				 <div class="form-group">
					 {{ Form::hidden('identifiant',$connecter->id,['class' => 'form-control','name' => 'identifiant']) }}
					 <label><span class="glyphicon glyphicon-user"></span></label>
					 <input type="text" class="form-control" placeholder="Nom ou prenom" name="recherche">
					 <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
				 </div>
			 {{Form::close()}}
		 </div>
		 <div id="menu3" class="tab-pane fade">
			 <p><br>Texte Messages3</p>
			 {{Form::open(['url' => route('recherche.store'),'class' =>'navbar-form navbar-left'])}}
				 <div class="form-group">
					 {{ Form::hidden('identif',$connecter->id,['class' => 'form-control','name' => 'identif']) }}
					 <label><span class="glyphicon glyphicon-user"></span></label>
					 <input type="text" class="form-control" placeholder="Nom ou prenom" name="recherche">
					 <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
				 </div>
			 {{Form::close()}}
		 </div>
		 <div id="dropdown1" class="tab-pane fade">
				<p><br>la liste des Etudiants</p>
				@foreach ($etudiants as $etu)
					@foreach ($users as $user)
						@if ($user->id == $etu->utilisateur_id)
							{{Form::open(['url' => route('etudiant.store'),'class' =>'navbar-form navbar-left'])}}
								 <div class="form-group">
									 {{ Form::hidden('identif',$etu->id,['class' => 'form-control','name' => 'concerner']) }}
									 {{ Form::hidden('identif',$connecter->id,['class' => 'form-control','name' => 'identifiant']) }}
									<label>{{ $user->nom }}</label> 
									<label>{{ $user->prenom }}</label>
									<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
								</div>
							{{Form::close()}}
						@endif	
					@endforeach				
				@endforeach
		 </div>
		 <div id="dropdown2" class="tab-pane fade">
				<p><br>la liste des Employés</p>
				@foreach ($users as $user)
						
							{{Form::open(['url' => route('etudiant.store'),'class' =>'navbar-form navbar-left'])}}
								 <div class="form-group">
									 {{ Form::hidden('identif',$etu->id,['class' => 'form-control','name' => 'concerner']) }}
									 {{ Form::hidden('identif',$connecter->id,['class' => 'form-control','name' => 'identifiant']) }}
									<label>{{ $user->nom }}</label> 
									<label>{{ $user->prenom }}</label>
									<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
								</div>
							{{Form::close()}}
						
					@endforeach		
		 </div>
	</div>

@endsection