@extends('template.admin')

@section('title', 'Lista de insumos')

@section('contenido')

	<div class="col-md-12">
    	<ol class="breadcrumb">
    		<li><a href="{{ url('admin/home') }}">Administrador</a></li>
        	<li class="action">Lista de insumos</li>          
        </ol>
    </div>

    <div class="col-md-12">
    	<h3>Lista de insumos</h3>
    	<br>
    </div>


    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="productos">
                <thead>
                    <tr>
                        <!--<th width="5" class="text-center">Id</th>-->
                        <th width="15" class="text-center">Partida</th>
                        <th class="text-center">Descripción</th>
                        <th width="22" class="text-center">Unidad de medida</th>
                        <th width="25" class="text-center">Precio unitario ($)</th>
                        <th width="30" class="text-center">Devolver</th>
                        <th width="25" class="text-center">Existencia</th>
                    
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>


@endsection