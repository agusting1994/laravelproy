@extends('layouts/admin')
@section('content')

	

	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
				@if(count($errors)>0)
				<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
				</div>
				@endif
				<div class="container box box-primary">
				<div class="box-header with-border"><h3 class="box-title">Registrar usuario</h3></div>
				{!!Form::open(array('url'=>'admin/usuarios', 'method'=>'POST', 'autocomplete'=>'off'))!!}
				{{Form::token()}}
				<div class="box body">
					<br>
					<div class="form-group">
       			   <label for="email">Correo electrónico</label>
         			 <input type="email"  required name="email" class="form-control" id="txtEmail" placeholder="Ingrese el correo electrónico">
   				 </div>

   				 <div class="form-group">
       			   <label for="telefono">Teléfono</label>
         			 <input type="tel" pattern = "[0-9]{1,15}" required name="telefono" class="form-control" id="txtEmail" placeholder="Ingrese número telefónico">
   				 </div>
				
   				 <div class="form-group">
       			   <label for="nombre">Nombre</label>
         			 <input type="text" required name="nombre" class="form-control" id="txtEmail" placeholder="Ingrese nombre">
   				 </div>
					
					<div class="form-group">
       			   <label for="apellido">Apellido</label>
         			 <input type="text" required name="apellido" class="form-control" id="txtEmail" placeholder="Ingrese apellido">
   				 </div>
					
				<div class="form-group">
                  <label for="rol">Rol de Usuario</label>
                   <div id="div_rol">
                  <select class="form-control" required name="rol" id="cbUsuario">
                    <option value="1">Administrador</option>
                    <option value="2">Docente</option>
                    <option value="3">Docente Inactivo</option>
                    <option  value="4">Alumno</option>
                    <option  value="5">Alumno Inactivo</option>
                  </select>
                  </div>
  				  </div>

				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>
				{!!Form::close()!!}
			</div>
			</div>
		</div>		
	</div>
	
@stop

@section('script')
<script type="text/javascript">
	$( document ).ready(function() {
		$('#txtEmail').focus();
		$(this).addClass('fooo');
		$('form').submit(function() {
    	$('.prueba').addClass('fooo');
    	$(':input[type="submit"]').prop('disabled', false);
		});
	});

</script>
@endsection('script')