<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>

	<title>Almacén General SCT | @yield('title') </title>

	
  {!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('plugins/bootstrap/css/pDelegHome.css') !!}
  {!! Html::style('plugins/bootstrap/css/custom.css') !!}
  
  {!! Html::style('plugins/bootstrap/font-awesome/css/font-awesome.min.css') !!}
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">

  <!--<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>-->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
  <!--<script src="{{ asset('plugins/bootstrap/js/jquery-3.2.1.min.js') }}"></script>-->
</head>

<body>

	<div class="jumbotron">
    <!--<div class="container">-->
      <div class="row">
        <div class="col-xs-12" >
          <!--<div class="myform-top-uno">-->
            <div class="myform-top-left-logo">
              <img src="{{ asset('plugins/bootstrap/img/sct-logo.jpg') }}" class="img-rounded" alt="sis logo" style="width:370px;height:135px;">    
            </div>
            <div class="myform-top-right-title">
              <h2>Secretaría de Comunicaciones y Transportes
              <h2>Residencia General de Conservación de Carreteras
              <h2>Centro S.C.T. Chiapas</h2>
            </div>  
        </div>
      </div>
  	</div>

      <!-- Page content -->
      <div id="page-content-wrapper">

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <br>
              @if(session()->has('flash'))
                <div class="alert alert-danger"> <strong> {{ session('flash') }}</strong></div>
              @endif

              @yield('contenido')

              <br>

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
 
  <!--<script src="{{ asset('plugins/bootstrap/js/active.js') }}"></script>-->


  {!! Html::script('plugins/bootstrap/js/jquery-3.2.1.min.js') !!}

  {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}

</body>
</html>