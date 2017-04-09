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
	<h1> Pour la liste</h1>
	@foreach ($users as $user)
		<!--ul class="list-inline" class="left-aligned">
			<li><span class="glyphicon glyphicon-user"></span></li>
			<li>{{ $user->nom }}</li>
			<li>{{ $user->prenom }}</li>
		</ul></br-->
	<div class="row">
	<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<ul class="list-inline" class="left-aligned">
					<li><span class="glyphicon glyphicon-user"></span></li>
					<li>{{ $user->nom }}</li>
					<li>{{ $user->prenom }}</li>
				</ul>
			</h3>
			<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
		</div>
		@if ($user->conges)
			@foreach($conges as $conge) 
				@if($user->id == $conge->utilisateur_id)
					<div class="panel-body">
						{{Form::open(['method' => 'put','url' => route('conges.update',$connecter->id)])}}
							{{ Form::hidden('idconges',$conge->id_conges,['class' => 'form-control','name' => 'idconge']) }}
							{{ Form::hidden('ident',$conge->utilisateur_id,['class' => 'form-control','name' => 'pers']) }}
							{{ Form::hidden('recherche',$rechercher,['class' => 'form-control','name' => 'recherche']) }}
							 <div class="form-group">
								<label >Date Debut Congé :</label>
								{{ Form::text('debut',$conge->dateDebut->format('d/m/Y'),['class' => 'form-control','name' => 'debut','readonly' => 'true']) }}
								
								<label >Date Fin Congé :</label>
								{{ Form::text('fin',$conge->dateFin->format('d/m/Y'),['class' => 'form-control','name' => 'fin','readonly' => 'true']) }}
								
								<label >Valider ?</label>
								<input type="checkbox" name="validation"> <br>
								<button class="btn btn-primary"  type="submit"  ><span class="glyphicon glyphicon-pencil"></span></button>
						{{Form::close()}}
						<!--button class="btn btn-primary" type="button" onclick="window.location='{{route("conges.store",compact("conge"))}}'"><span class="glyphicon glyphicon-remove"></span></button>-->
						{{Form::open(['url' => route('conges.store',$conge)])}}
							{{ Form::hidden('idconges',$conge->id_conges,['class' => 'form-control','name' => 'idconge']) }}
							{{ Form::hidden('recherche',$rechercher,['class' => 'form-control','name' => 'recherche']) }}
								<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
								
						{{Form::close()}}
							</div>
						<hr>
					</div>				
				@endif
			@endforeach
		@endif
	</div>
	</div>
	</div>
	@endforeach
@endsection