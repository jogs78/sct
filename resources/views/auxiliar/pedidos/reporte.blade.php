@extends('template.aux')

@section('title', 'Reporte de pedidos')

@section('contenido')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <ol class="breadcrumb breadcrumb-arrow">
                <li><a href="{{ url('auxiliar/inicio') }}">Auxiliar administrativo</a></li>
                <li class="action"><span>Reporte de pedidos</span></li>          
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3>Reporte de pedidos</h3>
        </div>
    </div>

    @include('auxiliar.pedidos.partials.search')
    
    <div class="row" id="pedidos">
        <div class="col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-condensed" id="consultar_pedidos">
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
                                <td>{{ $pe->descripcion }}</td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Ver desgloce" class="btn btn-primary btn-sm" href="{{ URL::action('AuxiliarController@Desgloce', $pe->idpedido) }}"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
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
    {!! Html::script('plugins/bootstrap/js/consultapedidos.js') !!}
@endsection
