@extends('template.admin')

@section('title', 'Lista de insumos')

@section('contenido')
<div class="row">
	<div class="col-md-12">
    	<ol class="breadcrumb breadcrumb-arrow">
    		<li><a href="{{ url('admin/inicio') }}">Administrador</a></li>
        	<li class="action"><span>Lista de insumos</span></li>          
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    	<h3>Lista de insumos <a href="#" class="addp-modal btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span><strong> Agregar nuevo insumo</strong></a></h3>
    	<br>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="productosTabla">
                <thead>
                    <tr>
                        <!--<th>ID</th>-->
                        <th width="15" class="text-center">Partida</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Existencia</th>
                        <th width="22" class="text-center">Unidad de medida</th>
                        <th width="25" class="text-center">Precio unitario</th>
                        <th width="25" class="text-center">Devolver</th>
                        <th></th>
                    </tr>
                    {{ csrf_field() }} 
                </thead>
                <tbody>
                    @foreach($productos as $pro)
                        <tr class="item{{ $pro->idproducto }}">
                            <!--<td>{{ $pro->idproducto }}</td>-->
                            <td>{{ $pro->idpartida }}</td>
                            <td>{{ $pro->descripcion }}</td>
                            <td>{{ $pro->cantidad }}</td>
                            <td>{{ $pro->unidad_medida }}</td>
                            <td>$ {{ $pro->precio }}</td>
                            <td>{{ $pro->devolver }}</td>
                            <td>
                                <button class="editp-modal btn btn-info btn-sm" data-idpro="{{$pro->idproducto}}" data-partida="{{$pro->idpartida}}" data-desc="{{$pro->descripcion}}" data-cant="{{$pro->cantidad}}" data-medida="{{$pro->unidad_medida}}" data-precio="{{$pro->precio}}" data-devolver="{{$pro->devolver}}"><span class="glyphicon glyphicon-edit"></span></button>
                                <button class="deletep-modal btn btn-danger btn-sm" data-idpro="{{$pro->idproducto}}" data-partida="{{$pro->idpartida}}" data-desc="{{$pro->descripcion}}" data-cant="{{$pro->cantidad}}" data-medida="{{$pro->unidad_medida}}" data-precio="{{$pro->precio}}" data-devolver="{{$pro->devolver}}"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.producto.modal.agregarProducto')
@include('admin.producto.modal.editarProducto')
@include('admin.producto.modal.eliminarProducto')

@endsection

@section('scripts')
    {!! Html::script('plugins/bootstrap/js/productcrud.js') !!}
@endsection