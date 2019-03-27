@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>

@section('content')
<div class="panel-body">
    <div class="float-left"><a href="/admin/materias/nueva"><span class="fa fa-plus"></span> Nueva</a> | <a href="/admin/materias"><span class="fa fa-book"></span> Ver todas las materias </a> | <a href="/admin/materias/eliminadas"><span class="fa fa-trash"></span> Materias eliminadas</a> </div>
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

  <div class="box-header with-border"><h3 class="box-title">Modificar materia</h3></div>
{!!Form::open(['route' => ['modificarmateria', $materia], 'method' => 'PUT', 'id' => 'formulario'])!!}
{{Form::token()}}
  <div class="box body">

    <br>
    <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" maxlength="100" required  name="nombre" class="form-control" id="txtNombre" placeholder="Ingrese el nombre del curso"  value="{{$materia->nombre}}">
    </div>
    <div class="form-group">
          <label for="nombre">Acrónimo</label>
          <input type="text" maxlength="100" required  name="acronimo" class="form-control" id="txtNombre" placeholder="Ingrese el nombre del curso"  value="{{$materia->acronimo}}">
    </div>
  <div class="box-footer">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>
{!!Form::close()!!}
</div>
@endsection('content')