@extends('template.camp')


@section('title', 'Realizar pedido')


@section('contenido')

	<div class="col-md-12">
    	<ol class="breadcrumb">
    		<li><a href="{{ url('inicio') }}">Delegado de obra</a></li>
        	<li class="action">Realizar pedidos</li>          
        </ol>
    </div>

    <div class="col-md-12">
        <h3>Realizar pedido</h3>
        <br>

        <form class="form-horizontal">
            
            <div class="form-group">
                <label for="disabledInput" class="col-sm-2 control-label">Numero de pedido:</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" placeholder="000001" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="disabledInput" class="col-sm-2 control-label">Clave del campamento:</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" placeholder="C210004" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="disabledInput" class="col-sm-2 control-label">Fecha:</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" id="fechap" value="<?php echo date('Y-m-d'); ?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="disabledInput" class="col-sm-2 control-label">Seleccione una partida:</label>
                <div class="col-sm-6">
                
                    {!! Form::select('partida', $partidas, null,['class' => 'form-control' ,'placeholder'=>' Seleccione una opcion ', 'id'=>'partida']) !!}
                </div>   
            </div>

        </form>
        <br>
    </div>  
    
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="productosTabla">
                <thead>
                    <tr>
                        <!--<th width="5" class="text-center">Id</th>-->
                        <th width="15" class="text-center">Partida</th>
                        <th class="text-center">Descripción</th>
                        <th width="22" class="text-center">Unidad de medida</th>
                        <th width="25" class="text-center">Precio unitario ($)</th>
                        <th width="30" class="text-center">Devolver</th>
                    
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-10">
        <br>
        <h4>Lista de insumos agregados al pedido</h4>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="listaTabla">
                <thead>
                    <tr>
                        <th class="text-center">Partida</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Cantidad solicitada</th>
                        <th class="text-center">Unidad de medida</th>
                        <th class="text-center">Precio unitario ($)</th>
                        <th class="text-center">Importe ($)</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <br>
        <button type="button" class="btn btn-success"> Enviar pedido</button>
        <button type="button" class="btn btn-warning">Cancelar</button>
        <br>
        <br>
        <br>
    </div>
    
@endsection

@section('scripts')
    <script>
        var urlTableProductos = "{{ route('datatable.productos') }}";
    </script>

@endsection
