@extends('layouts/materia')
@section('content')
<div id="usuarios">
	
</div>
<div class="loader" id="loading-image"></div>

<div class="load" ></div>
<button onclick="myfunc()"></button>
@endsection('content')
<style type="text/css">
	.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script>
	function myfunc(){
		$('#loading-image').show();
		$.ajax({
			type: 'get',
			url: '{{ url('listar') }}',
			data: { nombre: 'Agustin', apellido: 'Guallanes'},
			success:function(response){
				$('#usuarios').empty().html(response);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			$('#loading-image').hide();
		});
	}
</script>