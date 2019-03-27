@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="container text-center">

	<div class="alert alert-danger">
	<h1><span class="fa fa-video"></span>Acceso denegado</h1>
		<p>Su cuenta no posee los permisos para acceder a esta sección.</p>
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