@if(Auth::check() && Auth::user()->id_rol==1)
	@extends('layouts/admin')
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="row">
	<div class="col-lg-4 col-lg-offset-2">

<div  id="alert">
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cambiar contraseña</h3>
  </div>
  <input type="hidden" id="iduser" data-id="{{Auth::user()->id}}"/>
  <div class="panel-body">
  	{{Form::open()}}
  		<div class="form-group">
          <label for="actualpassword">Contraseña actual</label>
          <input type="password" required name="actualpass" class="form-control" id="actualpass" placeholder="Ingrese la contraseña actual"  autocomplete="off" />
  		</div>
  		<div class="form-group">
          <label for="nuevapassword">Nueva contraseña</label>
          <input type="password"  required name="nuevapassword" class="form-control" id="nuevapassword" placeholder="Ingrese la nueva contraseña" autocomplete="off">
  		</div>
  		<div class="form-group">
          <label for="confirmarnuevapassword">Repetir nueva contraseña</label>
          <input type="password" name="confirmarnuevapassword" class="form-control" id="confirmarnuevapassword" placeholder="Confirme la nueva contraseña"  value="" autocomplete="off">
  		</div>
  		<button class="btn btn-primary pull-right" type="button" data-token="{{ csrf_token() }}" id="guardar-password" >Guardar contraseña</button>
  		{{Form::close()}}
  		
</div>
</div>
</div>
<div class="col-lg-4 text-info">
	<h4>La contraseña debe cumplir con los siguientes requisitos de seguridad:</h4>
	<ul class="text-">
		<li>No puede ser igual a su contraseña original</li>
		<li>No puede ser igual a su contraseña original</li>
		<li>No puede ser igual a su contraseña anterior</li>
		<li>Debe contener entre 6 y 15 caracteres</li>
	</ul>
</div>
</div>	

@endsection('content')
@section('script')
<script type="text/javascript" src="{{ asset('js/cambiarpassword.js')}}"></script>
@endsection('script')