@foreach ($lectura as $elemento)
<div class="titulo"><h3 class="text-primary">{!! $elemento->nombre_lectura !!}<span class="right"><span class=""><a href="#" data-toggle="tooltip" data-placement="top" title="Previo" id="previo" class="previous round prev">&#8249;</a></span><span>
<a href="#" id="siguiente" data-toggle="tooltip" data-placement="top" title="Siguiente" class="next round prev">&#8250;</a></span></span></h3></div>
         	
         	{!! $elemento->anotaciones !!}
@endforeach


<link href="/css/contenidomateria.css" rel="stylesheet" type="text/css"/>
<script src="/js/get_contenido.js" type="text/javascript"></script>