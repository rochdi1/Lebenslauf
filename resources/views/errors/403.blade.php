@extends('layouts.app')


@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<h2>Fehler <span class="text-danger"> 403 </span>Zugriff verweigert/verboten</h2>
			<a href="{{ url('cvs') }}">Retour</a>
		</div>
	</div>
</div>

@endsection