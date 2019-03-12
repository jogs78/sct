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
    	<div class="table-responsive">
    		<table class="table table-hover table-bordered table-striped" id="consultar">
    			<thead>
    				<tr>
    					<th class="text-center">Número de pedido</th>
    					<th class="text-center">Fecha</th>
    					<th class="text-center">Total</th>
    					<th class="text-center">Estado</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
                    @foreach($pedidos as $pe)
                        <tr>
                            <td>{{ $pe->idpedido }}</td>
                            <td>{{ $pe->fecha_pedido }}</td>
                            <td>{{ $pe->total }}</td>
                            <td>{{ $pe->estado }}</td>
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