
@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>
@section('pageHeader')
    Usuarios Activos
@endsection('pageHeader')
@section('content')

<div class="panel-body">
    <a href="/admin/usuarios/registrar" class="btn btn-success"><span class="fa fa-user-plus"></span> Nuevo usuario</a>
</div>
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<div  id="alert">
</div>
<div class="container-fluid table-responsive">
 <table id="tablaGrupo" style="cursor:pointer" class="display">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Email confirmado</th>
                                    <th>Teléfono</th>
                                    <th>Rol de usuario</th>

                                    <th>Acciones</th>
                                </tr>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->nombre}}</td>
                                        <td>{{$user->apellido}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        @switch($user->email_confirmado)
                                            @case(1)
                                                Confirmado
                                                @break
                                             @case(0)
                                                 No confirmado
                                                @break
                                        @endswitch
                                        </td>
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
                                        <td>
                                        <a href="/admin/usuarios/editar/{{$user->id}}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                                       @if ($user->id != Auth::user()->id)
                                           <button class="eliminar-usuario btn btn-danger" data-nombre="{{$user->nombre}} {{$user->apellido}}" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}" ><span class="fa fa-trash"></span></button>
                                       @endif
                                        

                                        
                                        @if ($user->id_rol==2)
                                            <a href="/admin/usuarios/abmmaterias/{{$user->id}}" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                        @endif
                                        @if ($user->id_rol==4 || $user->id_rol==5 )
                                            <a href="/admin/usuarios/abmcursos/{{$user->id}}" class="btn btn-primary"><span class="fa fa-indent"></span></a>
                                        @endif
                                        
                                        
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </thead>
                            </table>

</div>

@endsection('content')

@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/datatables_to_spanish.js"></script>
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
<script src="{{ asset('js/eliminar_usuario.js')}}"></script>
@endsection('script')