<!DOCTYPE html>
<html lang="es">
<head>
	<title>Acceso restringido</title>

	{!! Html::style('plugins/bootstrap/css/bootstrap.min.css')!!}

</head>
<body>
	<div class="box-res">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<div class="panel-title text-center"><h4>Acceso Restringido</h4></div>
				</div>
				<div class="panel-body">
					<img class="img-responsive center-block" src="{{ asset('plugins/bootstrap/img/canda.ico') }}"></img>
					<hr>
					<strong class="text-center">
						<h4 class="text-center">Usted no tiene acceso a esta zona</h4>
						<h4>
							<a href="#">Volver al inicio</a>
						</h4>
					</strong>
				</div>
			</div>
		</div>
	</div>

</body>
</html>