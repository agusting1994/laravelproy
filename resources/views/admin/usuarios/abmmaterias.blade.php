@extends('layouts/admin')
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-dual-listbox/bootstrap-duallistbox.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script>
@section('content')
<div class="panel-body">
    <div class="float-left"><a href="/admin/cursos/nuevo"><span class="fa fa-plus"></span> Nuevo</a> | <a href="/admin/cursos"><span class="fa fa-book"></span> Ver todos los cursos </a> | <a href="/admin/cursos/eliminados"><span class="fa fa-trash"></span> Cursos eliminados</a> </div>
</div>
{{ csrf_field() }}
<div>	
</div>
<div>	
<div class="row">	

<div class="col-lg-8 col-md-8 col-lg-offset-2">	

<h2 class="	text-primary">Materias del docente: {{ $user->nombre . " " . $user->apellido . " (". $user->email . ")" }}</h2>
<br>	
	<form id="demoform" action="/admin/usuarios/guardarmaterias" method="post" onsubmit="return mifuncion()">
    <select multiple="multiple"  id="select-meal-type" size="30" name="duallistbox_demo1[]">
    	@foreach($cursos as $curso)
    		@foreach($user->materias() as $cursou)
    			@if($user->materias()->find($curso->id))
    			<div name="asdsasd">
    			<option name="asdsad" value="{{ $curso->id }}" selected="selected">{{ $curso->nombre }}</option>
    			</div>
    			@else
    			<option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
    			@endif
				
    		@endforeach
    	
    	@endforeach
    </select >
		<input type="hidden" id="arreglo_cursos" name="arreglo_cursos" value="">
    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id}}">
    <br>
    <div class="btn-toolbar">
        <button type="submit" class="btn btn-primary pull-right">Guardar</button> 
     <a class="btn btn-danger pull-right" href="/admin/usuarios/abmcursos/{{ $user->id }}">Reiniciar</a>
    </div>
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  </form>
  </div>
  </div>
  </div>
@endsection('content')


@section('script')

	<script type="text/javascript" src="/assets/bootstrap-dual-listbox/jquery.bootstrap-duallistbox.js"></script>
	<script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
    	nonSelectedListLabel: 'Cursos disponibles',
 		 selectedListLabel: 'Cursos asignados',
 		 preserveSelectionOnMove: 'moved',
 		 infoText: 'Cantidad de cursos disponbiles: {0}',
 		 infoTextEmpty: 'Vacio',
 		 filterPlaceHolder: 'Buscar curso',
 		 infoTextFiltered: '<span class="label label-warning">Filtrado</span> {0} de {1}',
 		 filterTextClear: 'ver todo',
 		 moveOnSelect: false,
    });

    function mifuncion(){
    	var str = "";
    	$('#select-meal-type option:selected').each(function() {
   		 str = str + $(this).val() + "-";
		});
		$('#arreglo_cursos').val(str.slice(0, -1));
		return true;
    }

    

  </script>
@endsection('script')