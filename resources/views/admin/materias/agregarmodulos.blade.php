@extends('layouts/admin')
<?php 
$message =Session::get('message')
?>
@section('pageHeader')
    Cursos
@endsection('pageHeader')
@section('content')

<div class="container">
    <div class="row">
        <h1>Agregar módulos</h1>
        <label>Cantidad de módulos</label>
        <input type="number" name="" id="cantidad-modulos">
        <input type="button" name="" class="btn btn-primary" id="agregar-modulos" value="Agregar Módulos">
        <input type="button" name="" class="btn btn-danger" id="cancelar-modulos" value="Cancelar">
    </div>

    <div class="row">
        <div class="contenedor">
            
        </div>
        <div class="form-group"><input type="button" name="" class="pull-right btn btn-success" id="agregar-modu" value="Agregar módulos"></div>
    </div>
  <input type="hidden" id="array-modulos" name="array-modulos">
</div>
    
@endsection('content')

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#agregar-modulos').click(function(event) {
            var i = 1;
            var contModulos = $('#cantidad-modulos').val();
            while (i<= contModulos ){
                var modulos = '<h3>Nombre para el módulo '+i+'</h3><div required class="form-group"><input type="text" required="" name="precio" placeholder="Ingrese el nombre del módulo" class="form-control" id="modu'+i+'"></div>';
                $(".contenedor").append(modulos);
                i++;
            }
            var bmodulos = '';
            $(".contenedor").append(bmodulos); 
            $("#agregar-modulos").prop('disabled', true);
        });
        $('#cancelar-modulos').click(function(event) {
            $(".contenedor").empty();
            $("#agregar-modulos").prop('disabled', false);
            $("#cantidad-modulos").prop('disabled', false);
         });
        $('#agregar-modu').click(function(event) {
                var i = 1;
                alert('asd');
                var str;
                while(i<= $('#cantidad-modulos').val()){
                    if(i==1){
                        str= $('#modu'+i).val();
                    }else{
                        str= str + '-' +$('#modu'+i).val();
                    }
                    
                    i++;
                }
                $('#array-modulos').val(str);
        });
});
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/datatables_to_spanish.js"></script>
<script src="{{ asset('js/eliminar_materia.js')}}"></script>
@endsection('script')