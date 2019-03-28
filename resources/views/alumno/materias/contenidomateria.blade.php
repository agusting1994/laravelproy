@extends('layouts/materia')

@section('content')
<div class="row ">
    <!-- 
  <h3 class="text-center text-primary" id="pruebah1"><a href="/cursado" class="text-muted"><span class="fa fa-arrow-circle-o-left pull-left" style="padding-left:15px;"> Inicio</span> </a>Introducción a las matemáticas</h3>-->
    <br>
        <div class="col-sm-3 col-md-3 col-lg-3 col-lg-offset-0" id="contenedor-materia" style="position:fixed; z-index:1;">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default ph-nombre" style="border:none;">
                    <div class="panel-heading" id="titulo">
                        <h4 class="panel-title text-center text-primary">
                            Introducción a la matemática
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default ph-nombre" style="border:none;">
                    <div class="panel-heading" id="buscar">
                        <input class="panel-title text-center text-primary" id="search" placeholder=".." style="width: 100%" type="text">
                        </input>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <a href="#">
                        <div class="panel-heading ph">
                            <h4 class="panel-title text-center ">
                                ¿Cómo está organizado este material?
                                <span class="fa fa-info-circle pull-right">
                                </span>
                            </h4>
                        </div>
                    </a>
                </div>
                <div class="panel panel-default ">
                    <a href="#">
                        <div class="panel-heading ph">
                            <h4 class="panel-title text-center ">
                                Introducción
                                <span class="fa fa-youtube-play pull-right">
                                </span>
                            </h4>
                        </div>
                    </a>
                </div>
                @foreach ($modulos as $modulo)
                <div class="panel panel-default">
                    <a data-parent="#accordion" data-toggle="collapse" href="#{{ $modulo->modulo_id }}">
                        <div class="panel-heading ph">
                            <h4 class="panel-title text-center">
                                {{ $modulo->nombre }}
                                <span class=" pull-right test fa fa-angle-down">
                                </span>
                            </h4>
                        </div>
                    </a>
                    <div class="panel-collapse collapse" id="{{ $modulo->modulo_id }}">
                        @foreach ($modulo_tema as $tema)
                        <div class="list-group collapse" id="collapseContenido{{ $tema->tema_id }}">
                            <ul class="list-group temaul " id="collapseTwo" style="margin-bottom: 0px;">
                            </ul>
                        </div>
                        @if ($tema->modulo_id == $modulo->modulo_id)
                        <a class="list-group-item text-center text-primary accordion-toggle" data-toggle="collapse" href="#contenido{{ $tema->tema_id }}" style="background-color: #C5DFF9; color: #424c73">
                            <span class="fa fa-desktop">
                            </span>
                            {{ $tema->nombre }}
                        </a>
                        <div class="collapse" id="contenido{{ $tema->tema_id }}">
                            @foreach ($tema_contenido as $temac)
                            @if ($temac->tema_id == $tema->tema_id)
                            <a class="list-group-item video submenu" href="#">
                                <span class="fa fa-youtube-play ">
                                </span>
                                VIDEO: {{ $temac->nombre_video }}
                                <span class="pull-right fa fa-chevron-right">
                                </span>
                            </a>
                            <a class="list-group-item submenu lectura" href="#">
                                <span class="fa fa-sticky-note-o ">
                                </span>
                                LECTURA: {{ $temac->nombre_lectura }}
                                <span class="pull-right fa fa-chevron-right">
                                </span>
                            </a>
                            <a class="list-group-item autoevaluacion submenu" href="#" id="{{ $temac->autoevaluacion_id }}">
                                <span class="fa fa-check-square ">
                                </span>
                                Autoevaluación: {{ $temac->autoevaluacion_id }}
                                <span class="pull-right fa fa-chevron-right">
                                </span>
                            </a>
                            @endif
                            @endforeach
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
                <div class="panel panel-default ">
                    <a href="#">
                        <div class="panel-heading ph">
                            <h4 class="panel-title text-center ">
                                Cierre
                                <span class="fa fa-youtube-play pull-right">
                                </span>
                            </h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </br>
</div>
<div class="col-sm-3 col-md-9 holds-the-iframe col-lg-offset-3 col-md-offset-3 " id="tema-contenido">
    <span class="clearfix">
    </span>
    <div class="center-block">
        <div class="loader" id="loading-image">
        </div>
        <h2>
            ¿Cómo está organizado el material?
        </h2>
        <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <br>
            <p>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </br>
        <h5>Titulo 1</h5>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <h5>Titulo 2</h5>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <h5>Titulo 3</h5>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     <button class="btn btn-success btn-lg align-middle">Comencemos</button>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var varurl = '{{ url('buscarcontenido') }}';
</script>
<script src="/js/get_contenido.js" type="text/javascript">
</script>
<script src="/js/alumno/materias/verautoevaluacion.js" type="text/javascript">
</script>
@endsection('script')
<link href="/css/contenidomateria.css" rel="stylesheet" type="text/css"/>
<script crossorigin="anonymous" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" src="https://code.jquery.com/jquery-3.3.1.js">
</script>
<script type="text/javascript">
    $(function(){ // this will be called when the DOM is ready
  $('#search').keyup(function() {
    $('.panel-heading').not('#buscar').not('#titulo').parent().parent().hide();
    var txt = $('#search').val();
    $('.submenu').each(function(){
       if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
           $(this).parent().parent().parent().show();
       }
    });
  });
});
</script>