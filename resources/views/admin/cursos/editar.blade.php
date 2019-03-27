@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>

@section('content')
<div class="panel-body">
    <div class="float-left"><a href="/admin/cursos/nuevo"><span class="fa fa-plus"></span> Nuevo</a> | <a href="/admin/cursos"><span class="fa fa-book"></span> Ver todos los cursos </a> | <a href="/admin/cursos/eliminados"><span class="fa fa-trash"></span> Cursos eliminados</a> </div>
</div>
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

  <div class="box-header with-border"><h3 class="box-title">Modificar usuario</h3></div>
{!!Form::open(['route' => ['modificarcurso', $curso], 'method' => 'PUT', 'id' => 'formulario'])!!}
{{Form::token()}}
  <div class="box body">

    <br>
    <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" maxlength="100" required  name="nombre" class="form-control" id="txtNombre" placeholder="Ingrese el nombre del curso"  value="{{$curso->nombre}}">
    </div>
    <div class="form-group">
          <label for="nombre">Descripción</label>
            <textarea class="form-control" rows="3" placeholder="Describa el curso" required name="descripcion"> {{ $curso->descripcion }}</textarea>
        </div>
    
  <div id="fechas"></div>
  <div class="form-group">
    <label for="txtHasta">Inicio del curso</label>

    <input type="text" name="desde" readonly required dissabled class="form-control" id="datepickerDesde" value="{{ \Carbon\Carbon::parse($curso->inicio)->format('d/m/Y')}}" style="background-color:#fff;"></p>
  </div>                   
  <div class="form-group">
    <label for="txtHasta">Fin del curso</label>

    <input type="text" name="hasta" readonly required dissabled class="form-control" id="datepickerHasta" value="{{ \Carbon\Carbon::parse($curso->finalizacion)->format('d/m/Y')}}" style="background-color:#fff;"></p>
  </div>
  <div class="form-group">
    <label for="txtPrecio" >Precio</label>
    <input type="text" required name="precio" class="form-control" id="txtPrecio" value="{{$curso->precio}}"></p>
  </div>


  <div class="box-footer">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>
{!!Form::close()!!}
</div>
@endsection('content')

@section('script')
  <script src="/datepicker/jquery-ui.js"></script>
  <link rel="stylesheet" href="/datepicker/jquery-ui.css">
<script>
  $( document ).ready(function() {
    $('.js-example-basic-single').select2();
    $( "#datepickerDesde" ).datepicker();
    $( "#datepickerHasta" ).datepicker();
    $(".datepicker").each(function() {    
    $(this).datepicker('setDate', $(this).val());
    });
    var universidad = $('#hiddenuniversidad').data('universidad');
    $("#div_rol select").val(universidad).change();
        });
    var dateString = $('#datepickerDesde').val();

    $("#txtPrecio").keydown(function (e) {
      var fechaInicial="27/11/2013";
        var fechaFinal="28/11/2013";
        if(validate_fechaMayorQue(fechaInicial,fechaFinal))
        {
            console.log("La fecha "+fechaFinal+" es superior a la fecha "+fechaInicial);
        }else{
            console.log("La fecha "+fechaFinal+" NO es superior a la fecha "+fechaInicial);
        }
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
        function validate_fechaMayorQue(fechaInicial,fechaFinal)
        {
            valuesStart=fechaInicial.split("/");
            valuesEnd=fechaFinal.split("/");
 
            // Verificamos que la fecha no sea posterior a la actual
            var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);
            var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);
            if(dateStart>=dateEnd)
            {
                return 0;
            }
            return 1;
        }
        
    });
 </script>
 <script type="text/javascript" src="/datepicker/datepicker_es.js"></script>
 <script type="text/javascript">
   

 </script>
@endsection('script')
