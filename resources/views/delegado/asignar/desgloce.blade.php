@extends('template.deleg')

@section('title', 'Desgloce de asignaciones')

@section('contenido')
	<div class="row">
		<div class="col-md-12">	
			<ol class="breadcrumb breadcrumb-arrow">
		  		<li><a href="{{ url('delegado/inicio') }}">Delegado administrativo</a></li>
		  		<li><a href="{{ url('delegado/asignar') }}">Asignar montos</a></li>
		  		<li class="active"><span>Desgloce de asignaciones</span></li>
			</ol>
		</div>
	</div>

	<div class="row">
        <div class="col-md-12">
        	<h3>Desgloce de asignaciones</h3>
        	<br>
        </div>
    </div>

     <div class="row">
    	<div class="col-md-4 col-md-offset-2">
            <div class="form-group">
                <label for="residencia">Residencia de obra:</label>
                <p>{{ $asignar->ubicacion }}</p>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
                <label for="mes">Mes:</label>
                <p>{{ $asignar->mes }}</p>
            </div>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
    		<div class="table-responsive">
    			 <table style="margin: auto;" class="table table-hover table-bordered table-striped table-condensed" id="asignar">
    			 	<thead>
                        <tr>
                            <th class="text-center">Partida</th>
                            <th style="width: 80%;" class="text-center">Descripción</th>
                            <th style="width: 20%;" class="text-center">Monto</th>
                        </tr>
                        {{ csrf_field() }}
                    </thead>
                    <tbody>
                        @foreach($desgloce as $d)
                            <tr>
                                <td>{{ $d->idpartida }}</td>
                                <td>{{ $d->nombre_partida }}</td>
                                <td style="text-align: right;">$ {{ $d->monto_partida }}</td>
                            </tr>
                        @endforeach
                    </tbody>
    			 </table>
    		</div>
    	</div>
        <div style="padding-top: 15px;" class="col-md-12">
            <a href="{{ url('delegado/asignar') }}" class="btn btn-success btn-sm" role="button"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</a>
        </div>
    </div>
@endsection