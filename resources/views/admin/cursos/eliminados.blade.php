@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>
@section('pageHeader')
    Cursos
@endsection('pageHeader')
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
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<div  id="alert">
</div>
<div class="container-fluid">
 <table id="tablaGrupo" style="cursor:pointer" class="display">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Inicio</th>
                                    <th>Finalizacion</th>
                                    <th>Precio</th>
                                    <th>Materias</th>

                                    <th>Acciones</th>
                                </tr>
                                <tbody>
                                @foreach($cursos as $curso)
                                    <tr>
                                        <td>{{$curso->nombre}}</td>
                                         <td>{{$curso->inicio}}</td>
                                        <td>{{$curso->finalizacion}}</td>
                                        <td>{{$curso->precio}}</td>
                                        <td>
                                            <ul>
                                            @foreach($curso->materias()->get() as $materia)
                                                <li>{{ $materia->nombre }}</li>
                                            @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                       
                                        <button class="restablecer-curso btn btn-success" class="btn btn-success" data-id="{{ $curso->id }}" data-nombre="{{$curso->nombre}}" data-token="{{ csrf_token() }}" >Recuperar</button>
                                        
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </thead>
                            </table>

</div>
@endsection('content')

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/datatables_to_spanish.js"></script>
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
<script src="{{ asset('js/restablecer_curso.js')}}"></script>
@endsection('script')