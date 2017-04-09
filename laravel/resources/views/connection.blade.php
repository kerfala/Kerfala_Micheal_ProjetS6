@extends('default')

@section('content')
	@foreach ($users as $user)
		 <span>{{ $user->nom 		}}</span> 
		 <span>{{ $user->prenom 	}}</span>
		 <span>{{ $user->email		}}</span>
		 <span>{{ $user->motDePasse }}</span><br/>
	@endforeach
@endsection
@section('connexion')	
	@if(Session::has('probleme'))		
		<div class="alert alert-danger">
			{{Session::get('probleme')}}
		</div>
	@endif
	<!--div class="well"-->
	<!--on modifier en model en inserant $post vide)-->
	{{Form::model($connecter,['class' => 'navbar-form navbar-left','url' => route('connexion.store')]) }}
		<input type="hidden" name="_token" value="{{ csrf_token()}}"> 
		<div class="form-group">
			<input class="form-control" name="email"  type="text">
		</div>
		<div class="form-group">
			<input class="form-control"  name="pass"  type="password">
		</div>
		<button type="submit" class="btn btn-primary" >Connecter</button>
	{{Form::close()}}
	<!--div-->
@endsection