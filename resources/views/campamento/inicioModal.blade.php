<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="inicio">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            	<div align="center">	
	            	<h2><strong>Sistema de Gestión del Almacén</strong></h2>
					<h3>Bienvenido {{ auth()->user()->name }}</h3>
					<div class="img-center">
						<img src="{{ asset('plugins/bootstrap/img/buen.png') }}" class="img-al" alt="almacen" style="width:450px;height:350px;">
					</div>
				</div>
            </div>
    	</div>
  	</div>
</div>
