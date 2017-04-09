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
	{{ Html::script('web_page/script/panel.js') }}
	<style type="text/css">
		.row{
		    margin-top:40px;
		    padding: 0 10px;
		}

		.clickable{
		    cursor: pointer;   
		}

		.panel-heading span {
			margin-top: -20px;
			font-size: 15px;
		}
	</style>
	<ul class="list-inline">
        <li ><span class="glyphicon glyphicon-user"></span></li>
			<li>{{ $personne->nom }}</li> 
			<li>{{ $personne->prenom }}</li>
	</ul>
    <ul class="nav nav-tabs" id="myTab">
	     <li class="active"><a data-toggle="tab" href="#menu1">Ces Congés</a></li>
		 <li><a data-toggle="tab" href="#menu2">Diponibilité</a></li>
		 <li><a data-toggle="tab" href="#menu3">Modifier</a></li>	 
	</ul>
	 <div class="tab-content" id="myTabContent">
	 	<div id="menu1" class="tab-pane fade active in">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								Conge
							</h3>
							<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
						</div>
						@if ($personne->conges)
							@foreach($conges as $conge) 
								
								<div class="panel-body">
									{{Form::model($connecter,['method' => 'put','url' => route('conges.update',compact("connecter"))])}}
										{{ Form::hidden('idconges',$conge->id_conges,['class' => 'form-control','name' => 'con']) }}
										<input name="identifiant" type="hidden" value="{{$connecter->id}}">
										<input name="debut" type="hidden" value="{{$conge->dateDebut}}">
										<input name="fin" type="hidden" value="{{$conge->dateFin}}">
										<input name="user_id" type="hidden" value="{{$conge->utilisateur_id}}">
										<div class="form-group">
											<label >Date Debut Congé :</label>
											<label >{{ $conge->dateDebut->format('d/m/Y') }}</label><br>
											<label >Date Fin Congé :</label>
											<label >{{ $conge->dateFin->format('d/m/Y') }}</label><br>
											<label >Valider ?</label>
											{{ Form::checkbox('validation',1) }} <br>
											<button class="btn btn-primary" type="submit" ><span class="glyphicon glyphicon-pencil"></span></button>
										</div>
									{{Form::close()}}
									{{Form::open(['method' => 'put','url' => route('conges.destroy',compact("connecter"))])}}
										{{ Form::hidden('idconges',$conge->id_conges,['class' => 'form-control','name' => 'idconges']) }}
										<button class="btn btn-primary" type="submit" onclick="window.location='{{route("conges.destroy",compact("conge"))}}'"><span class="glyphicon glyphicon-remove"></span></button>
									{{Form::close()}}
									<hr>
								</div>				
								
							@endforeach
						@endif
 	 			</div>
 	 		</div>
	 	</div>
	 	
	</div>
	 <div id="menu2" class="tab-pane fade">
		 <p><br>Texte Messages</p>
		
	 </div>
	 <div id="menu3" class="tab-pane fade">
		 <p><br>Texte Messages3</p>
		 
	 </div>
		 
		 
	</div>

@endsection