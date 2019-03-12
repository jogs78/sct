@extends('template.deleg')

@section('title', 'Desgloce de pedido')

@section('contenido')
	<div class="row">
		<div class="col-md-12">	
			<ol class="breadcrumb breadcrumb-arrow">
		  		<li><a href="{{ url('delegado/inicio') }}">Delegado administrativo</a></li>
		  		<li><a href="{{ url('delegado/reporte') }}">Lista de pedidos</a></li>
		  		<li class="active"><span>Desgloce de pedido</span></li>
			</ol>
		</div>
	</div>

	<div class="row">
        <div class="col-md-12">
        	<h3>Desgloce de pedido</h3>
        	<br>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label for="numpedido">Número de pedido:</label>
    			<p id="pedidoid">{{ $pedidos->idpedido }}</p>
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="form-group">
    			<label for="fecha">Fecha de solicitud:</label>
    			<p>{{ $pedidos->fecha_pedido }}</p>
    		</div>
    	</div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fecha">Estado:</label>
                <p>{{ $pedidos->descripcion }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fecha">Residencia de obra:</label>
                <p>{{ $pedidos->ubicacion }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="table-responsive">
        		<table class="table table-hover table-bordered table-striped" id="desgloce">
        			<thead>
        				<tr>
        					<th class="text-center">Partida</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Unidad de medida</th>
                            <th class="text-center">Cantidad solicitada</th>
                            <!--<th class="text-center">Cantidad autorizada</th>-->
        				</tr>
                        {{ csrf_field() }}
        			</thead>
                    <!--<tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Subtotal: </th>
                            <th>$</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">I.V.A.: </th>
                            <th>$</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Total: </th>
                            <th>$</th>
                        </tr>
                    </tfoot>-->
                    <tbody>
                    @foreach($desgloce as $des)
                        <tr>
                            <td>{{ $des->partida }}</td>
                            <td>{{ $des->producto }}</td>
                            <td>{{ $des->medida}}</td>
                            <td>{{ $des->cantidad_pedida }}</td>
                            <!--<td>{{ $des->cantidad_autorizada }}</td>-->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ url('delegado/reporte') }}" class="btn btn-info" role="button" data-toggle="tooltip" data-placement="top" title="Regresar"><span class="glyphicon glyphicon-chevron-left"></span></a>

            <input type="submit" id="surtir" name="surtir" value="Surtir" class="btnsurtir btn btn-success">

            <a data-toggle="tooltip" data-placement="top" title="Descargar vale" class="btn btn-primary" href="{{ action('DelegadoController@pdf', $pedidos->idpedido) }}">Vale de material</a>

           <br>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('plugins/bootstrap/js/Estados.js') !!}
@endsection