@extends('template.deleg')

@section('title', 'Pedidos por autorizar')

@section('contenido')
	
	<div class="col-md-12">
    	<ol class="breadcrumb">
    		<li><a href="{{ url('delegado/home') }}">Delegado administrativo</a></li>
        	<li class="action">Pedidos por autorizar</li>          
        </ol>
    </div>

    <div class="col-md-12">
    	<h3>Desgloce de pedidos</h3>
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="desgloce">
                <thead>
                    <tr>
                        <th>Número de pedido</th>
                        <th>Clave del campamento</th>
                        <th>Fecha de pedido</th>
                        <th>Autorizar</th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                		<td>0002</td>
                		<td>C2401</td>
                		<td>13/09/2017</td>
                		<td>
                			<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
							<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                		</td>
                	</tr>
                	<tr>
                		<td>0003</td>
                		<td>C2402</td>
                		<td>03/05/2017</td>
                		<td>
                			<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
							<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                		</td>
                	</tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#desgloce').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
@stop