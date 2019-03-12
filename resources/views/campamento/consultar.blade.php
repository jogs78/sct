@extends('template.camp')

@section('title', 'Lista de pedidos')

@section('contenido')

	<div class="row">
        <div class="col-md-12">
        	<ol class="breadcrumb breadcrumb-arrow">
                <li><a >Delegado de obra</a></li>
            	<li class="action"><span>Lista de pedidos</span></li>          
            </ol>
        </div>
    </div>

    <!--@include('campamento.inicioModal')-->
    
    <div class="row">
        <div class="col-md-12">
        	<h3>Lista de pedidos <a href="{{ url('campamento/solicitud') }}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> <strong> Realizar nuevo pedido</strong></a></h3>
        	<br>
        </div>
    </div>

    @include('campamento.Montos')

    <div class="row">
        <div class="col-md-12">
        	<div class="table-responsive">
        		<table class="table table-hover table-bordered table-striped table-condensed" id="consultar">
        			<thead>
        				<tr>
        					<th class="text-center">No. de pedido</th>
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
                                <td>$ {{ $pe->total }}</td>
                                <td>{{ $pe->fecha_pedido }}</td>
                                <td>{{ $pe->descripcion }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ URL::action('SolicitudController@desglocePedido', $pe->idpedido) }}"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
        		</table>
        	</div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#inicio').modal('show')
        });
    </script>
@endsection