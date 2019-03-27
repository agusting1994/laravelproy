@extends('layouts/admin')
@section('content')

<div class="col-lg-4 col-lg-offset-4">

@if(Session::has('message'))
<p class="alert alert-info alert-dismissible">{{ Session::get('message') }}</p>
@endif
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cambiar imagen de perfil</h3>
  </div>
  <div class="panel-body">
<form method="POST" action="{{url("usuario/actualizarperfil")}}" enctype="multipart/form-data">

	{{csrf_field()}}
		<div id="pf_foto" class="img-responsive center-block"></div>
	<div class="form-group" style="margin-top:10px">

		<input type='file' id='verborgen_file' name="image" />
		 <input type="button" value="Seleccionar imagen" id="uploadButton" class="btn btn-default center-block" />
		 <button type="submit" class="btn btn-primary center-block" style="margin-top:15px">Actualizar imagen de perfil</button>
		<div class="text-danger center-block">{{$errors->first('image')}}</div>
	</div>
	</div>
	
	
</form>
  </div>
</div>
@endsection('content')
<style type="text/css">
	#pf_foto {
        background-image: url({{url(Auth::user()->perfiles)}});
        background-size: cover;
        background-position: center;
        height: 300px;
        width: 300px;
        border: 1px solid #000;
    }
</style>

@section('script')
<script type="text/javascript">
	$('#verborgen_file').hide();
        $('#uploadButton').on('click', function () {
        	   $('#verborgen_file').click();
        });

        $('#verborgen_file').change(function () {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
               $('#pf_foto').css('background-image', 'url("' + reader.result + '")');
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
            }
        });
</script>
@endsection('scripts')