
@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>

@section('content')
<div class="panel-body">
    <p><span id="users-total"></span></p>
</div>

<div  id="alert">
</div>
<div class="container-fluid">
 <table id="tablaGrupo" style="cursor:pointer" class="display">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Rol de usuario</th>
                                    <th>Fecha de eliminación</th>
                                    <th>Rol de usuario</th>
                                </tr>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->nombre}}</td>
                                        <td>{{$user->apellido}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->telefono}}</td>
                                        <td>
                                            @switch($user->id_rol)
                                            @case(1)
                                                Admin
                                                @break
                                             @case(2)
                                                 Docente
                                                @break
                                            @case(3)
                                                 Docente inhabilitado
                                                @break
                                            @case(4)
                                                 Alumno
                                                @break
                                            @case(5)
                                                 Alumno inactivo
                                                @break
                                        @endswitch
                                        </td>
                                        <td>{{$user->deleted_at}}</td>
                                        
                                        <td>
                                        <button class="restablecer-usuario btn btn-success" class="btn btn-success" data-id="{{ $user->id }}" data-nombre="{{$user->nombre}} {{$user->apellido}}" data-token="{{ csrf_token() }}" >Recuperar</button>
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </thead>
                            </table>

</div>

@endsection('content')

@section('script')

<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/datatables_to_spanish.js"></script>
<script src="{{ asset('js/restablecer_usuario.js')}}"></script>

<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
@endsection('script')