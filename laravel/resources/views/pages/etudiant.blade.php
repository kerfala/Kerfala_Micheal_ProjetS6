@extends('default')
@section('button')
	<ul class="nav masthead-nav">
        <li ><span class="glyphicon glyphicon-user"></span></li>
			<li id="nom">{{ $connecter->nom }}</li> 
			<li id="prenom">{{ $connecter->prenom }}</li>
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
	 <!--script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js'></script-->
	 @include('succes')
	<ul class="nav nav-tabs" id="myTab">
		 <li class="active"><a data-toggle="tab" href="#menu1">Voir Planning</a></li>
		 <li><a data-toggle="tab" href="#menu2">Nouveau Congé</a></li>
		 <li><a data-toggle="tab" href="#menu3">Nouvelle Disponibilité</a></li>
	</ul>
	<div class="tab-content" id="myTabContent">
		 <div id="menu1" class="tab-pane fade active in">
			<p><br>Planning de la semaine</p> 
			{!! $calendar -> calendar()!!}
			{!! $calendar -> script() !!}
	     </div>
		 <div id="menu2" class="tab-pane fade">
			 <p><br>Texte Messages</p>
			 {{Form::open(['url' => route('conges.store')])}}
				<div class="form-group">
					{{ Form::hidden('identifiant',$connecter->id,['class' => 'form-control','name' => 'identifiant']) }}
					<label><span class="glyphicon glyphicon-user"></span></label>
					<input type="text" id="datetimepicker" class="form-control" placeholder="Date Debut " name="debut" >
					<input type="text" id="datetimepicker2" class="form-control" placeholder="Date Fin" name="fin" >
					<button type="submit" class="btn btn-primary">Envoyer</span></button>
				</div>
			 {{Form::close()}}

		 </div>
			 <div id="menu3" class="tab-pane fade">
				<p><br>Texte Messages3</p>
				{{Form::open(['url' => route('disponibilite.store'),'class' => 'navbar-form navbar-left'])}}
					<div class="form-group">
						{{ Form::hidden('identifiant',$connecter->id,['class' => 'form-control','name' => 'identifiant']) }}
						<label><span class="glyphicon glyphicon-user"></span></label>
						<!--input type="text"  class="form-control" placeholder="Jour Semaine" name="jour" -->
						<select name="jour" class="form-control">
							<option>Lundi</option>
							<option>Mardi</option>
							<option>Mercredi</option>
							<option>Jeudi</option>
							<option>Vendredi</option>
							<option>Samedi</option>
						</select>
						<input type="text" required pattern="[0-9]{2}\:[0-9]{2}"  class="form-control" placeholder="Debut (HH:MM)" name="debut">
						<input type="time" required pattern="[0-9]{2}\:[0-9]{2}" class="form-control"  placeholder="Fin (HH:MM)" name="fin">
						
						
						
						<button class="btn btn-primary">Envoyer</span></button>
					</div>
				{{Form::close()}}
			 </div>
			  {{ Html::script('web_page/script/jquery.datetimepicker.full.js') }}
			  {{ Html::script('web_page/script/jquery.datetimepicker.full.min.js') }}
			  <script type="text/javascript">
				$("#datetimepicker").datetimepicker();
				$("#datetimepicker2").datetimepicker();
				
			</script>
@endsection