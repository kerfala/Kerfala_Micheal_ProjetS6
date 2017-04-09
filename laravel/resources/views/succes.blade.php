@if(Session::has('succes'))		
		<div class="alert alert-success">
			{{Session::get('succes')}}
		</div>
@endif
@if(Session::has('probleme'))		
		<div class="alert alert-danger">
			{{Session::get('probleme')}}
		</div>
@endif