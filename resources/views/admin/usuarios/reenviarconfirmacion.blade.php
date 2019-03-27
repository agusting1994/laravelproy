@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>
@section('pageHeader')
    Usuarios no confirmados
@endsection('pageHeader')
@section('content')
<div class="float-left"><a href="/admin/usuarios/registrar"><span class="fa fa-user-plus"></span> Nuevo</a> | <a href="/admin/usuarios/eliminados"><span class="fa fa-trash"></span> Eliminados</a> | <a href=""><span class="fa fa-envelope-square"></span> Reenviar correo de confirmación</a> </div>
<div class="panel-body">
    <p><span id="users-total"></span></p>
</div>
<div id="alert" class="alert alert-danger alert-dismissible"> <a href="#">Restablecer</a> </div>
<div class="container-fluid">
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
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
                                            @case(2)
                                                 Profesor inhabilitado
                                                @break
                                            @case(2)
                                                 Alumno
                                                @break
                                        @endswitch
                                        
                                        </td>
                                        <td>
                                        <a href="/admin/usuarios/reenviarcorreo/{{$user->id}}" class="btn btn-primary">Reenviar correo de confirmación</a>
                                       
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
<script src="{{ asset('js/eliminar_usuario.js')}}"></script>
@endsection('script')