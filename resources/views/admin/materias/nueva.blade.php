@extends('layouts/admin')
@section('content')
	
  <div class="panel-body">
    <div class="float-left"><a href="/admin/materias/nueva"><span class="fa fa-plus"></span> Nueva</a> | <a href="/admin/materias"><span class="fa fa-book"></span> Ver todas las materias </a> | <a href="/admin/materias/eliminadas"><span class="fa fa-trash"></span> Materias eliminadas</a> </div>
</div>
<div class="container box box-primary">
	<div class="box-header with-border"><h3 class="box-title">Crear nueva materia</h3></div>

  <div class="box body">
<br>

	{!!Form::open(array('url'=>'admin/materias', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
		<div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" maxlength="50" required  name="nombre" class="form-control" id="txtNombre" placeholder="Ingrese el nombre de la materia">
    	</div>
        <div class="form-group">
          <label for="acronimo">Acrónimo</label>
            <input type="text" maxlength="10" required  name="acronimo" class="form-control" id="txtAcronimo" placeholder="Ingrese el acrónimo de la materia">
        </div>
    		
      	
  </div>
    
  		
	<div class="box-footer">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>

  {!! Form::close() !!}
    </div>
  </div>	
</div>
	
	
@endsection