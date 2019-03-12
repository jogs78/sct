@extends('template.camp')

@section('title', 'Consultar pedidos')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('inicio') }}">Delegado de obra</a></li>
			<li class="action">Consultar pedidos</li>          
		</ol>
	</div>
</div>

<div class="col-md-12">
	<h3>Listado de pedidos</h3>
	<br>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="cliente">Residencia</label>
        <p>{{$pedido->ubicacion}}</p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="estado">Estado</label>
        <p>{{$pedido->estado}}</p>
    </div>
</div>

    <div class="col-md-12">
    	<div class="table-responsive">
    		<table class="table table-hover table-bordered table-striped" id="detalle">
    			<thead>
    				<tr>
    					<th class="text-center">Descripción</th>
    					<th class="text-center">Cantidad solicitada</th>
    					<th class="text-center">Cantidad autorizada</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
                    @foreach($desgloces as $des)
                        <tr>
                            <td>{{ $des->idproducto }}</td>
                            <td>{{ $pe->cantida_pedida}}</td>
                            <td>{{ $pe->cantidad_autorizada }}</td>
                            <td>
                                <a href="{{ URL::action('PedidoController@show',$pe->idpedido) }}"><button class="edit-modal btn btn-info">Detalle</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
    		</table>
    	</div>
    </div>

@endsection