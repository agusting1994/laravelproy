
@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>

@section('content')
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
{!!Form::open(['route' => ['modificarusuario', $user], 'method' => 'PUT'])!!}
{{Form::token()}}
  <div class="box body">
    <br>
    <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" name="email" class="form-control" id="txtEmail" placeholder="Ingrese el correo electrónico"  value="{{$user->email}}">
    </div>
    <div class="form-group">
                  <label>Email confirmado</label>
                  <input type="hidden" id="emailConfirmado" data-emailconfirmado="{{ $user->email_confirmado }}">
                  <div id="div_confirmado">
                  <select class="form-control" name="email_confirmado" id="cbEmailConfirmado">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  </div>
                  
    </div>
    <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" required name="nombre" class="form-control" id="txtNombre" placeholder="Ingrese el nombre"  value="{{$user->nombre}}">
    </div>
    <div class="form-group">
            <label for="exampleInputEmail1">Apellido</label>
            <input required type="text" name="apellido" class="form-control" id="txtApellido" placeholder="Ingrese el apellido"  value="{{$user->apellido}}">
    </div>
    <div class="form-group">
            <label for="exampleInputEmail1">Teléfono</label>
            <input required type="tel" name="telefono" class="form-control" id="txtTelefono" placeholder="Ingrese el teléfono"  value="{{$user->telefono}}">
    </div>
    <div class="form-group">
                  <label>Rol de Usuario</label>
                  <input type="hidden" id="userrol" data-userrol="{{ $user->id_rol }}">
                  <div id="div_rol">
                  <select required class="form-control" name="rol" id="cbUsuario">
                    <option value="1">Administrador</option>
                    <option value="2">Docente</option>
                    <option value="3">Docente Inactivo</option>
                    <option  value="4">Alumno</option>
                    <option  value="5">Alumno Inactivo</option>
                  </select>
                  </div>
    </div>

    <div  class="form-group">
        <label>Contraseña</label>
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="modificar_contrasena[]" id="myCheck" onclick="myFunction()"> <span> Modificar contraseña</span>
                        </span>
                    <input type="text" name="password" id="txtPassword" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>

  
  <div class="box-footer">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>
{!!Form::close()!!}
</div>
@endsection('content')

@section('script')

<script>
  $( document ).ready(function() {
    $("#txtPassword").val("");
    var rol = $('#userrol').data('userrol');
    var confirmado = $('#emailConfirmado').data('emailconfirmado');
    $("div#div_confirmado select").val(confirmado);
    $("div#div_rol select").val(rol);
    myFunction();
    $("#txtTelefono").keydown(function (e) {
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
    });
});
  function myFunction(){
    if( $('#myCheck').prop('checked') ) {
      
      $("#txtPassword").prop('disabled', false);
    }else{
      $("#txtPassword").prop('disabled', true);
    }
  }

 </script>
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/datatables_to_spanish.js"></script>
<script src="{{ asset('js/eliminar_usuario.js')}}"></script>
@endsection('script')
