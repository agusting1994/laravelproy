@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="container text-center">
	<div class="alert alert-info">
	<h1><span class="fa fa-video"></span>Confirmar E-mail</h1>
		<p>Tu cuenta no se encuentra activa. Para activarla ingresa a tu mail y busca el mensaje que se te envió.</p>
		<br>
		<button class="btn btn-danger" onclick="goBack()" > <span class="fa fa-arrow-alt-circle-left"></span>Volver atrás</button>
	</div>
</div>
@endsection

<script>
function goBack() {
    window.history.back();
}
</script>