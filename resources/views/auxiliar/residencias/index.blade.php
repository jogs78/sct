@extends('template.aux')

@section('title', 'Residencias de obra')

@section('contenido')
	<div class="row">
		<div class="col-md-12">
	    	<ol class="breadcrumb breadcrumb-arrow">
	    		<li><a href="{{ url('auxiliar/inicio') }}">Auxiliar administrativo</a></li>
	        	<li class="action"><span>Residencias de obra</span></li>          
	        </ol>
	    </div>
    </div>

    <div class="row">
		<div class="col-md-12">
			<h3>Residencias de obra <a href="#" class="addr-modal btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span><strong> Registrar recidencia de obra</strong></a></h3>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md.12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="residenciaTabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre del encargado</th>
							<th>Puesto</th>
							<th>Ubicación</th>
							<!--<th>Fecha</th>-->
							<th></th>
						</tr>
						{{ csrf_field() }}
					</thead>
					<tbody>
						@foreach($residencias as $res)
							<tr class="item{{ $res->idresidencia }}">
		                        <td>{{ $res->idresidencia }}</td>
		                        <td>{{ $res->encargado }}</td>
		                        <td>{{ $res->puesto }}</td>
		                        <td>{{ $res->ubicacion }}</td>
		                        <!--<td>{{ $res->created_at }}</td>-->
		                        <td>
                        		<button data-toggle="tooltip" data-placement="bottom" title="Editar" data-toggle="tooltip" data-placement="top" title="Editar" class="editr-modal btn btn-info btn-sm" data-idresc="{{$res->idresidencia}}" data-encarg="{{$res->encargado}}" data-puesto="{{$res->puesto}}" data-ubicacion="{{$res->ubicacion}}" data-created="{{$res->created_at}}"><span class="glyphicon glyphicon-edit"></span></button>
                                
                                <button data-toggle="tooltip" data-placement="top" title="Eliminar" data-toggle="tooltip" data-placement="top" title="Eliminar" class="deleter-modal btn btn-danger btn-sm" data-idresc="{{$res->idresidencia}}" data-encarg="{{$res->encargado}}" data-puesto="{{$res->puesto}}" data-ubicacion="{{$res->ubicacion}}" data-created="{{$res->created_at}}"><span class="glyphicon glyphicon-trash"></span></button>
		                        </td>
	                        </tr>
                        @endforeach    
					</tbody>
				</table>
			</div>
		</div>
	</div>
@include('auxiliar.residencias.modal.agregar')
@include('auxiliar.residencias.modal.editar')
@include('auxiliar.residencias.modal.eliminar')

@endsection