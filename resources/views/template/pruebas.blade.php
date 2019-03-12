<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>
  
  <title>Almacen SCT | @yield('title') </title>

  {!! Html::style('plugins/toastr/toastr.min.css') !!}
  {!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('plugins/bootstrap/css/pDelegHome.css') !!}
  {!! Html::style('plugins/bootstrap/css/fondo.css') !!}
  {!! Html::style('plugins/bootstrap/css/goUp.css') !!}
  {!! Html::style('plugins/bootstrap/css/navbar.css') !!}
  {!! Html::style('plugins/bootstrap/css/breadcrumb.css') !!}
  {!! Html::style('plugins/bootstrap/css/table.css') !!}
  {!! Html::style('plugins/bootstrap/css/panel.css') !!}

  {!! Html::style('plugins/bootstrap/css/dos.css') !!}

  {!! Html::style('plugins/bootstrap/css/sidebar.css') !!}

  {!! Html::style('plugins/bootstrap/font-awesome/css/font-awesome.min.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
  <!--{!! Html::style('plugins/datatables/css/dataTables.bootstrap.css') !!}-->
  {!! Html::style('plugins/datatables/css/dataTables.bootstrap.min.css') !!}

  
</head>

<body>

  @include('parts.header')

  @include('parts.navbar.navName')

<!-- Include the above in your HEAD tag -->

<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Menú</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="{{ url('delegado/inicio') }}">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li ><a href="{{ url('delegado/producto') }}">Insumos<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-cubes"></span></a></li>
        <!--<li ><a href="#">Messages<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">Capítulos</a></li>
            <li><a href="#">Partidas</a></li>
          </ul>
        </li>
        <li><a href="#">Reporte de pedidos<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>
        <li ><a href="#">Residecias de obra<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-flag"></span></a></li>
        <li ><a href="#">Asignar montos<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></span></a></li>
        <li ><a href="#">Bitacora<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="main">
<!-- Content Here -->
      <!-- Page content -->
      <div id="page-content-wrapper" class="effect">

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              
              @yield('contenido')
              @include('parts.goUp')

            </div>
          </div>
        </div>
      </div>
</div>  

  <!--<footer>
        <div class="container">
          <h5>Carretera Tuxtla Gutierrez-Chiapa de Corzo, km 5+500.</h5>
        </div>
  </footer>-->
  <!--<div class="footer">
        <div class="container">
          <h5>Carretera Tuxtla Gutierrez-Chiapa de Corzo, km 5+500.</h5>
        </div>      
      </div>-->

  {!! Html::script('plugins/bootstrap/js/jquery-3.2.1.min.js') !!}
  {!! Html::script('plugins/datatables/js/jquery.dataTables.min.js') !!}
  {!! Html::script('plugins/datatables/js/dataTables.bootstrap.min.js') !!}

  {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}

  {!! Html::script('plugins/toastr/toastr.min.js') !!}

  {!! Html::script('plugins/bootstrap/js/goUp.js') !!}

  {!! Html::script('plugins/bootstrap/js/sidebar.js') !!}

  
  
@yield('scripts')

  <script type="text/javascript">
      var urlconfiglenguageDatatables = "{!! asset('plugins/datatables/latino.json') !!}";
  </script>

</body>
</html>