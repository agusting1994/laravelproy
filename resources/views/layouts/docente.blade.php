<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplicación | Inicio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="/assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  -->
  <link rel="stylesheet" type="text/css" href="/assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">


  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/assets/adminlte/dist/css/skins/skin-blue-light.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<link rel="stylesheet" type="text/css" href="/plugins/iCheck/flat/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="/select2-4.0.6-rc.1/dist/css/select2.css">
<!--Datetimepicker -->
<link rel="stylesheet" type="text/css" href="/datetimepicker/jquery.datetimepicker.min.css">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition fixed sidebar-collapse skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>Soft</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Lador</b>soft</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-play text-danger"></i> Ver transmisión
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{url(Auth::user()->perfiles)}}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{url(Auth::user()->perfiles)}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->nombre }} <span class="caret"></span> </span>
            </a>
            <ul class="dropdown-menu dropdown-adminlte" style="width: 50%; background-color: #605ca8; ">
              <!-- The user image in the menu -->
              
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li><a href="/usuario/perfil" style="color:#fff">Perfil</a></li>
              <li><a href="/usuario/cambiarpassword" style="color:#fff">Cambiar contraseña</a></li>
              <li><a href="{{ route('logout') }}" style="color:#fff" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span>Cerrar sesión</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url(Auth::user()->perfiles)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            
          </p>
          <!-- Status -->
          <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-certificate text-primary"></i>  <select id="sel1">
           @foreach (Auth::user()->materias as $mat)
             <option>{{ $mat->nombre }}</option>
           @endforeach
  </select> <i class="fa fa-exchange-alt text-info"></i> </a>
        </div>
      </div>

    



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-indent"></i> <span>Cursos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/cursos">Listado de cursos</a></li>
            <li><a href="/admin/cursos/nuevo">Nuevo curso</a></li>
            <li><a href="/admin/cursos/eliminados">Cursos eliminados</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-tasks"></i> <span>Materias</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/materias">Materias</a></li>
            <li><a href="/admin/materias/nueva">Nueva materia</a></li>
            <li><a href="/admin/materias/eliminadas">Materias eliminadas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-clipboard-list"></i> <span> Inscripciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           
            <li><a href="/admin/usuarios">Listado de usuarios</a></li>
            <li><a href="/admin/usuarios/registrar">Registrar usuario</a></li>
            <li><a href="/admin/usuarios/eliminados">Usuarios eliminados</a></li>
            <li><a href="/admin/usuarios/reenviar">Reenviar correo de confirmación</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-envelope"></i> <span> Mensajería</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           
            <li><a href="/usuario/correo">Bandeja de entrada</a></li>
            <li><a href="/admin/usuarios/registrar">Registrar usuario</a></li>
            <li><a href="/admin/usuarios/eliminados">Usuarios eliminados</a></li>
            <li><a href="/admin/usuarios/reenviar">Reenviar correo de confirmación</a></li>
          </ul>
        </li> 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('pageHeader')
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      ladorsoft.com
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Ladorsoft</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/adminlte/dist/js/adminlte.min.js"></script>
<script type="js/script.js"></script>
<script type="text/javascript" src="/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
<!--Datetimepicker-->
<script type="text/javascript" src="/datetimepicker/jquery.datetimepicker.full.min.js"></script>
@yield('script')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>

<style type="text/css">
body{
font-family: 'Helvetica Neue',sans-serif;
}.fa-play{
  color:#dd4b39 ;
  animation: animationFrames ease 1s;
  animation-iteration-count: infinite;
  transform-origin: 50% 50%;
  animation-fill-mode:forwards; /*when the spec is finished*/
  -webkit-animation: animationFrames ease 1s;
  -webkit-animation-iteration-count: infinite;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-fill-mode:forwards; /*Chrome 16+, Safari 4+*/ 
  -moz-animation: animationFrames ease 1s;
  -moz-animation-iteration-count: infinite;
  -moz-transform-origin: 50% 50%;
  -moz-animation-fill-mode:forwards; /*FF 5+*/
  -o-animation: animationFrames ease 1s;
  -o-animation-iteration-count: infinite;
  -o-transform-origin: 50% 50%;
  -o-animation-fill-mode:forwards; /*Not implemented yet*/
  -ms-animation: animationFrames ease 1s;
  -ms-animation-iteration-count: infinite;
  -ms-transform-origin: 50% 50%;
  -ms-animation-fill-mode:forwards; /*IE 10+*/
}

@keyframes animationFrames{
  0% {
    opacity:1;
    transform:  skewX(0deg) skewY(0deg) ;
  }
  100% {
    opacity:0;
    transform:  skewX(1deg) skewY(1deg) ;
  }
}

@-moz-keyframes animationFrames{
  0% {
    opacity:1;
    -moz-transform:  skewX(0deg) skewY(0deg) ;
  }
  100% {
    opacity:0;
    -moz-transform:  skewX(1deg) skewY(1deg) ;
  }
}

#sel1{
  background-color: #F9FAFC;
  border-color: #F9FAFC;
}
@-webkit-keyframes animationFrames {
  0% {
    opacity:1;
    -webkit-transform:  skewX(0deg) skewY(0deg) ;
  }
  100% {
    opacity:0;
    -webkit-transform:  skewX(1deg) skewY(1deg) ;
  }
}

@-o-keyframes animationFrames {
  0% {
    opacity:1;
    -o-transform:  skewX(0deg) skewY(0deg) ;
  }
  100% {
    opacity:0;
    -o-transform:  skewX(1deg) skewY(1deg) ;
  }
}

@-ms-keyframes animationFrames {
  0% {
    opacity:1;
    -ms-transform:  skewX(0deg) skewY(0deg) ;
  }
  100% {
    opacity:0;
    -ms-transform:  skewX(1deg) skewY(1deg) ;
  }
}
</style>