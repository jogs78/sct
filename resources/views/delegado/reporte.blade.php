@extends('template.deleg')

@section('title', 'Reporte de pedidos')

@section('contenido')

	<div class="col-md-12">
    	<ol class="breadcrumb">
    		<li><a href="#">Delegado administrativo</a></li>
        	<li class="action">Reporte de pedidos</li>          
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<h3>Reporte de pedidos</h3>
        	<br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="table-responsive">
        		<table class="table table-hover table-bordered table-striped" id="consultar">
        			<thead>
        				<tr>
        					<th class="text-center">Número de pedido</th>
                            <th class="text-center">Residencia</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Realizado en</th>
                            <th class="text-center">Estado</th>
                            <th></th>
        				</tr>
                        {{ csrf_field() }}
        			</thead>
                    <tbody>
                        @foreach($pedidos as $pe)
                            <tr class="item{{ $pe->idpedido }}">
                                <td>{{ $pe->idpedido }}</td>
                                <td>{{ $pe->idresidencia }}</td>
                                <td>{{ $pe->total }}</td>
                                <td>{{ $pe->fecha_pedido }}</td>
                                <td>{{ $pe->estado }}</td>
                                <td>
                                    <button class="btn btn-primary">Detalle</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
        		</table>
        	</div>
        </div>
    </div>

@endsection