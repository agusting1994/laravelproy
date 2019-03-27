
@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>

@section('content')
<div class="panel-body">
    <p><span id="users-total"></span></p>
</div>
<div id="alert" class="alert alert-success"></div>
<div class="container-fluid">
 <table id="tablaGrupo" style="cursor:pointer" class="display">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Rol de usuario</th>

                                    <th>Rol de usuario</th>
                                </tr>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->nombre}}</td>
                                        <td>{{$user->apellido}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->telefono}}</td>
                                        <td>{{$user->id_rol}}</td>
                                        <td>
                                        <button class="restablecer-usuario" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}" >Restablecer</button>
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
@endsection('script')