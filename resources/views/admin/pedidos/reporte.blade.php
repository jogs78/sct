@extends('template.admin')

@section('title', 'Reporte de pedidos')

@section('contenido')

	<div class="col-md-12">
    	<ol class="breadcrumb breadcrumb-arrow">
    		<li><a href="{{ url('admin/inicio') }}">Administrador</a></li>
        	<li class="action"><span>Reporte de pedidos</span></li>          
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
                <table class="table table-hover table-bordered table-striped table-condensed" id="consultar">
                    <thead>
                        <tr>
                            <th class="text-center">No. de pedido</th>
                            <th class="text-center">Residencia</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Estado</th>
                            <th></th>
                        </tr>
                        {{ csrf_field() }}
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pe)
                            <tr class="item{{ $pe->idpedido }}">
                                <td>{{ $pe->idpedido }}</td>
                                <td>{{ $pe->ubicacion }}</td>
                                <td>$ {{ $pe->total }}</td>
                                <td>{{ $pe->fecha_pedido }}</td>
                                <td>{{ $pe->estado }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ URL::action('AdminController@DesglocePedido', $pe->idpedido) }}"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection