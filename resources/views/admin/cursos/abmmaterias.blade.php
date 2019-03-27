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

<h1 class="	text-primary">Materias del curso: {{ $curso->nombre }}</h1>
<br>	
	<form id="demoform" action="/admin/cursos/guardarcurso" method="post" onsubmit="return mifuncion()">
    <select multiple="multiple"  id="select-meal-type" size="30" name="duallistbox_demo1[]">
    	@foreach($materias as $materia)
    		@foreach($curso->materias() as $materiac)
    			@if($curso->materias()->find($materia->id))
    			<div name="asdsasd">
    			<option name="asdsad" value="{{ $materia->id }}" selected="selected">{{ $materia->nombre }}</option>
    			</div>
    			@else
    			<option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
    			@endif
				
    		@endforeach
    	
    	@endforeach
    </select >
		<input type="hidden" id="arreglo_materias" name="arreglo_materias" value="">
    <input type="hidden" id="curso_id" name="curso_id" value="{{ $curso->id}}">
    <br>
    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  </form>
  <button onclick="mifuncion()">assad</button>
  </div>
  </div>
  </div>
@endsection('content')


@section('script')

	<script type="text/javascript" src="/assets/bootstrap-dual-listbox/jquery.bootstrap-duallistbox.js"></script>
	<script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
    	nonSelectedListLabel: 'Materias disponibles',
 		 selectedListLabel: 'Materias asignadas',
 		 preserveSelectionOnMove: 'moved',
 		 infoText: 'Cantidad de materias disponbiles: {0}',
 		 infoTextEmpty: 'Vacio',
 		 filterPlaceHolder: 'Buscar materia',
 		 infoTextFiltered: '<span class="label label-warning">Filtrado</span> {0} de {1}',
 		 filterTextClear: 'ver todo',
 		 moveOnSelect: false,
    });

    function mifuncion(){
    	var str = "";
    	$('#select-meal-type option:selected').each(function() {
   		 str = str + $(this).val() + "-";
		});
		$('#arreglo_materias').val(str.slice(0, -1));
		
		return true;
    }

    

  </script>
@endsection('script')