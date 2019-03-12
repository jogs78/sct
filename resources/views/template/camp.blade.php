<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	
  <title>Almacén General SCT | @yield('title') </title>

  {!! Html::style('plugins/toastr/toastr.min.css') !!}
  {!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('plugins/bootstrap/css/pDelegHome.css') !!}
  {!! Html::style('plugins/bootstrap/css/input.css') !!}
  {!! Html::style('plugins/bootstrap/css/fondo.css') !!}
  {!! Html::style('plugins/bootstrap/css/goUp.css') !!}
  {!! Html::style('plugins/bootstrap/css/navbar.css') !!}
  {!! Html::style('plugins/bootstrap/css/breadcrumb.css') !!}
  {!! Html::style('plugins/bootstrap/css/table.css') !!}

  {!! Html::style('plugins/bootstrap/css/sidebar.css') !!}
  
  {!! Html::style('plugins/bootstrap/font-awesome/css/font-awesome.min.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">

  {!! Html::style('plugins/datatables/css/dataTables.bootstrap.min.css') !!}
  
</head>

<body>

  @include('parts.header')

  @include('parts.navbar.navCamp') 

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

  {!! Html::script('plugins/bootstrap/js/active.js') !!}
  {!! Html::script('plugins/bootstrap/js/pedido.js') !!}
  {!! Html::script('plugins/bootstrap/js/solicitud.js') !!}
  {!! Html::script('plugins/bootstrap/js/goUp.js') !!}
  
  @yield('scripts')

  <script type="text/javascript">

    var urlconfiglenguageDatatables = "{!! asset('plugins/datatables/latino.json') !!}";

    var urlsolicitar = "{{route('datatable.insumos')}}";

  </script>

</body>
</html>