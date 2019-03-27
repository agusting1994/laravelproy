<div class="titulo"><h3 class="text-primary">Autoevaluacion---- <span class="right"><span class=""><a href="#" data-toggle="tooltip"  data-placement="top" title="Previo" id="previo" class="previous round prev">&#8249;</a></span><span>

  @if ($siguiente_tema_id <> null )
    <a href="#" id="siguienteautoevaluacion" data-toggle="tooltip" data-placement="top" title="Siguiente" class="next round prev" data-autoevaluacion="contenido{{ $siguiente_tema_id->tema_id }}">&#8250;</a>
  @endif
  @if (isset($siguiente_modulo) )
    <a href="#" id="siguientemodulo" data-toggle="tooltip" data-placement="top" title="Siguiente" class="next round prev" data-modulo="{{ $siguiente_modulo->modulo_id }}" data-modulo-tema = "{{ $siguiente_modulo_tema->tema_id }}">&#8250;</a>
  @endif
</span></span></h3></div>
<br>
<div id="resultado">

</div>
<div class="panel panel-default" id="autoevaluacionInfo">
    <div class="panel-body">
      <p class="text-info">La autoevaluación se aprueba respondiendo correctamente al menos un 60% de las preguntas</p>
      <p>Cuando termines de responder las preguntas, presiona el botón "Evaluar" para obtener tu resultado.</p>
  </div>
 
</div>
<form id="autoevaluacion">
@foreach ($autoevaluacion as $i => $pregunta)
<div id="{{ $i }}" class="panel panel-primary">
    <div class="panel-heading">
      <span>{{ $i+1 }})</span> <div id="titulo-pregunta" style="display: inline;"> {{ $pregunta->pregunta }} <span class="fa fa-times-circle pull-right"></span></div>
      </div>
      <div class="panel-body">
      @foreach ($autoevaluacion_preguntas as $respuesta)
        @if ($respuesta->pregunta_id==$pregunta->pregunta_id)
        <div class="form-group">
         <div class="radio">
            <label><input type="radio" class="radio-b" value="{{ $pregunta->pregunta_id . '-' . $respuesta->respuesta }}" required name="{{ $pregunta->pregunta_id }}">{{ $respuesta->respuesta }}</label>
        </div>
        </div>
        @endif
      @endforeach
      </div>
  </div>
@endforeach
</form>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
<button  class="btn btn-success btn-lg pull-right" id="btn-terminar">Terminar</button>
<script type="text/javascript">
  function recorrerRadioButtons(){
    var listaDias = '';
    $("input[class=radio-b]").each(function (index) { 
       if($(this).is(':checked')){
        listaDias += $(this).val() + ',';
       }
    });
    listaDias = listaDias.substr(0,listaDias.length-1);
    return listaDias;
  }


$('#btn-terminar').click(function(){




  bootbox.confirm({
        message: "¿Estás seguro que deseas evaluar?",
         buttons: {
        confirm: {
            label: 'Evaluar',
            className: 'btn btn-success'
        },
        cancel: {
            label: 'Cancelar',
            className: 'btn btn-default'
        }
    },
    callback: function (result) {
        if(result==true){
           $arrayPreguntasRespuestas = recorrerRadioButtons();
    $.ajax({
      type: 'GET',
      url: '{{ url('terminar_autoevaluacion') }}',
      data: {arrayprueba: $arrayPreguntasRespuestas},
      success:function(response){
        $('#1').removeClass('panel-primary');
        $('#1').addClass('panel-danger');
        if(response.porcentajeCorrectas>=60){
          console.log(response.arrayJustificacion);
          alert(response.arrayCorreccion[1]);
          var it = 0;
          $('.panel-body').each(function() {
            alert(response.arrayJustificacion[it]);
            it++;
          $( this ).append( "<div>hola</div>" );
          alert($(this).text());
            });
          $('#resultado').append( "<div class='panel panel-default'><div class='panel-body'><p='text-info'>Resultado</p><p>"+ response.porcentajeCorrectas +"</p></div></div>");
       }else{
        console.log(response.arrayJustificacion[1]);
          alert(response.arrayJustificacion[1]);
          alert(response.arrayCorreccion[1]);
          $('#autoevaluacion').remove();
          $('#autoevaluacionInfo').remove();
          $('#btn-terminar').remove();
              alert('Portanceje obtenido = ' + response.porcentajeCorrectas + '. Desaprobaste!!' );
        }
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
    });
     
        }
    }
});

  });
</script>
</script>


<link href="/css/contenidomateria.css" rel="stylesheet" type="text/css"/>
<script src="/js/get_contenido.js" type="text/javascript"></script>
<style type="text/css">
  
  
.box-header{
  font-size: 18px;
  margin-bottom: -25px;
  font-weight: 500;
}
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
.legend1
{
  margin-bottom:0px;
  margin-left:16px;
}

label {
  margin-right: 15px;
  line-height: 32px;
}

input {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;

  border-radius: 50%;
  width: 16px;
  height: 16px;

  border: 2px solid #999;
  transition: 0.2s all linear;
  outline: none;
  margin-right: 5px;

  position: relative;
  top: 4px;
}

input:checked {
  border: 6px solid #337ab7;
}



button:hover,
button:focus {
  color: #999;
}

button:active {
  background-color: white;
  color: black;
  outline: 1px solid black;
}

</style>