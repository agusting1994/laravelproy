@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>
@section('pageHeader')
    Cursos
@endsection('pageHeader')
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
                                    <th>Acrónimo</th>
                                    <th>Acciones</th>
                                </tr>
                                <tbody>
                                @foreach($materias as $materia)
                                    <tr>
                                        <td>{{$materia->nombre}}</td>
                                         <td>{{$materia->inicio}}</td>

                                        <td>
                                       
                                        <button class="restablecer-materia btn btn-success" class="btn btn-success" data-id="{{ $materia->id }}" data-nombre="{{$materia->nombre}}" data-token="{{ csrf_token() }}" >Recuperar</button>
                                        
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
<script src="{{ asset('js/restablecer_materia.js')}}"></script>
@endsection('script')