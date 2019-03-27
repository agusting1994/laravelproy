<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.6.3, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.6.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="assets/images/ladorsoftlogo-180x180.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/web/assets/mobirise-icons/mobirise-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/tether/tether.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/bootstrap/css/bootstrap-grid.min.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/bootstrap/css/bootstrap-reboot.min.css') }}">
 
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/socicon/css/styles.css') }}">
 
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/animatecss/animate.min.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/dropdown/css/style.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/theme/css/style.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mobirise/mobirise/css/mbr-additional.css') }}">
 
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/mystyles/misestilos.css') }}">

  
  
  
</head>

<body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso a la plataforma</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {!! Form::open(['route'=>'log.store', 'method'=>'POST']) !!}
       <div class="alert alert-danger alert-dimissible" id="msgDanger" role="alert" style="display:none">
        <strong>Usuario o contraseña incorrecta.</strong>
         </div>
  <div class="form-group row">
    <label for="Usuario" class="col-sm-2 col-form-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usuario" id="inputUsuario" placeholder="Ingrese su usuario" required="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" required="" id="inputPassword" placeholder="Ingrese su contraseña">
    </div>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordar esta cuenta</label>
  </div>

      </div>
      <div class="modal-footer">
      <div class="modal-login-footer-links">
        <a href="/recuperar-password" class="bg-darken-4">Olvidaste tu contraseña?</a>
        <span class="">|</span>
        <a href="#">No tienes cuenta?</a>
      </div>
      {!! link_to('#', $title='Ingresar', $attributes=['id'=>'btnIngresar', 'class'=>'btn btn-sm btn-primary display-4'], $secure = null) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

  <section class="menu cid-qIJXGdxmib" once="menu" id="menu1-e">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" id="brand-logo" href="/">
                        Eureka</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-7" href="https://mobirise.com">
                        </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link link text-white display-7 active" href="/">Inicio</a>
                </li><li class="nav-item"><a class="nav-link link text-white display-7" href="index.html#video3-h" target="_blank">¿Cómo funciona?</a></li>
                <!--<li class="nav-item"><a class="nav-link link text-white display-7" href="index.html#features8-l" target="_blank">¿Por qué elegirnos?</a></li>
                -->
                <li class="nav-item"><a class="nav-link link text-white display-7" href="index.html#video3-h">Cursos</a></li></ul>

            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-white-outline display-4 btn-inscripcion"  href="/login">Login</a></div>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-white-outline display-4" data-toggle="modal" data-target="#myModal" href="#">Ingresar</a></div>
        </div>
    </nav>
</section>
<section>
@yield('contenido')
</section>

<section class="cid-qIJXGhM9WJ mbr-reveal" id="footer1-g">
    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href="#">
                        <img src="/assets/mobirise/images/ladorsoftlogo-180x180.png" alt="Mobirise" title="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Dirección</h5>
                <p class="mbr-text"></p><p>Av. Facundo Quiroga 543</p><p>Córdoba - Argentina</p><p></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacto</h5>
                <p class="mbr-text">
                    Email: guallanesdavid@gmai.com
                    <br>Teléfono : +543517368458<br></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3"></h5>
                <p class="mbr-text"></p>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2018 Ladorsoft Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/mobirise" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-whatsapp socicon"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.behance.net/Mobirise" target="_blank">
                                <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
#brand-logo{
    color: #1DC3E7 ;
}
    #form-inscripcion {
    transition: all .2s;
    border: 1px solid #ffffff;
    padding: 1rem;
}
.btn-inscripcion{
    background-color: #D55339 !important;
    border-color: #D55339 !important;
    color: #ffffff !important;
    border-radius: 5px;
}
.btn-inscripcion:hover{
    background-color: #D83413 !important;
    border-color: #fff !important;
    color: #ffffff !important;
    border-radius: 5px;
}
.form-lbl{
    color: #fff;
    font-size: 14px;
    align-items: left;
    margin-bottom: 0px; 
    margin-top: 10px;

}
.form-insc-alig-left{
    align-items: left;
}
.nav-link>.active{
  color: red;
}
</style>
  <script src="{{ asset('/assets/mobirise/web/assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/popper/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/tether/tether.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/smoothscroll/smooth-scroll.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/touchswipe/jquery.touch-swipe.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/viewportchecker/jquery.viewportchecker.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/parallax/jarallax.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/dropdown/js/script.min.js') }}"></script>
  <script src="{{ asset('/assets/mobirise/theme/js/script.js') }}"></script>
  <script src="{{ asset('/js/script.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function(){
      $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
      });
    });
  </script>
  <script>
    
  </script>
  <input name="animation" type="hidden">
  </body>
</html>