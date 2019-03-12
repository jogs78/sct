<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      <ul class="nav navbar-nav navbar-right">
        <!--<li class="active"><a href="#">Tiene un monto de: $ 5,000.00<span class="sr-only">(current)</span></a></li>-->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
            <strong> {{ auth()->user()->name }}</strong> ( {{auth()->user()->puesto}} ) 
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <!--<li><a>{{auth()->user()->puesto}}</a></li>
            <li><a>{{auth()->user()->ubicacion}}</a></li>
            <li role="separator" class="divider"></li>-->
            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>