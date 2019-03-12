@extends('template.camp')


@section('title', 'Realizar pedido')


@section('contenido')
<div class="row">
    <div class="col-md-12">
    	<ol class="breadcrumb breadcrumb-arrow">
    		<!--<li class="action">Delegado de obra</li>-->
            <li><a href="{{ url('campamento/listaPedido') }}">Lista de pedidos</a></li>
    		<li class="action"><span>Realizar nuevo pedido</span></li>          
    	</ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <input type="hidden" id="idresidencia"  name="idresidencia" value="{{auth()->user()->residencia()->first()->idresidencia}}">
        <h3>Realizar nuevo pedido</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped table-condensed" id="MontosPartida">
                <caption class="text-center">Montos asignados</caption>
                <thead>
                    <tr>
                        <th class="text-center">Partida</th>
                        <th class="text-center">Monto</th>
                    </tr>
                    {{ csrf_field() }}
                </thead>
                <tbody>
                    @foreach($montos as $mo)
                    <tr>
                        <td>{{ $mo->idpartida }}</td>
                        <td class="text-right">$ {{ $mo->monto_partida }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="TablaInsumo">
                <thead>
                    <tr>
                        <!--<th class="text-center">Id</th>-->
                        <th class="text-center">Partida</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Unidad de medida</th>
                        <th class="text-center">Precio unitario ($)</th>
                        <th class="text-center">Devolver</th>
                    
                    </tr>
                    {{ csrf_field() }}
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- esta es la vista donde se meustra los productos, aqui decias?? o-->
<div class="row"> 
    <div class="col-md-12">
        <br>
        <h4>Lista de insumos agregados al pedido</h4>
        <br>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="Tablalista">
                <thead>
                    <tr>
                        <th class="text-center" width="8"></th>
                        <th class="text-center" width="20">Partida</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center" width="25">Cantidad solicitada</th>
                        <th class="text-center" width="20">Unidad de medida</th>
                        <th class="text-center" width="25">Precio unitario ($)</th>
                        <th class="text-center" width="25">Importe ($)</th>
                    </tr>
                    {{ csrf_field() }}
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-right">Subtotal: $ </td>
                        <td class="text-right"><input type="text" id="stotal" size="12" style="text-align:right" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-right">I.V.A.: $ </td>
                        <td class="text-right"><input type="text" id="iva" size="12" style="text-align:right" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-right">Total: $ </td>
                        <td class="text-right"><input type="text" id="totaltotal" size="12" style="text-align:right" readonly></td>
                    </tr>
                </tfoot>
                <tbody>
                    
                </tbody>
            </table>
            <p class="errorCantidad text-center alert alert-danger hidden"></p>
        </div>
    </div>
</div>
        
<div class="row">
    <div class="col-md-12">
     <form id="FormButtons">
        <input type="button" id="enviare" class="enviar btn btn-success btn-md" value="Enviar pedido">
        
        <a href="{{ url('campamento/listaPedido') }}" class="btn btn-danger" role="button"> Cancelar <span class="glyphicon glyphicon-remove"></span></a>
    </form>
    </div>
</div>

@endsection
