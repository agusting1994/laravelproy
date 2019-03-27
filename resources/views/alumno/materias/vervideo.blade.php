<div class="titulo"><h3 class="text-primary">{{ $video->nombre_video }} <span class="right"><span class="">
@if(isset($anterior_tema_id))
<a href="#" data-toggle="tooltip" data-placement="top" title="Previo" id="previovideo" class="previous round prev" data-tema-previo="contenido{{ $anterior_tema_id->tema_id }}">&#8249;</a>
@endif
@if(isset($anterior_modulo) && isset($anterior_modulo_tema))
<a href="#" data-toggle="tooltip" data-placement="top" title="Previo" id="moduloprevio" class="previous round prev" data-modulo-tema-previo="contenido{{ $anterior_modulo_tema->tema_id }}" data-modulo-previo="{{ $anterior_modulo->modulo_id }}">&#8249;</a>
@endif
	

</span><span>
<a href="#" id="siguiente" class="next round prev" data-toggle="tooltip" data-placement="top" title="Siguiente">&#8250;</a></span></span></h3>
</div>


<div class="embed-responsive embed-responsive-16by9">
		{!! $video->video !!}
</div>
<link href="/css/contenidomateria.css" rel="stylesheet" type="text/css"/>
<script src="/js/get_contenido.js" type="text/javascript">
</script>