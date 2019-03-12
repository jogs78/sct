@extends('template.deleg')

@section('title', 'Asignar montos')

@section('contenido')

	<div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb breadcrumb-arrow">
                <li><a href="{{ url('delegado/inicio') }}">Delegado administrativo</a></li>
                <li class="action"><span>Asignar montos</span></li>          
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Asignar montos <a href="#" class="add-modal btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Realizar nueva asignación</a></h3>
            <br>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-12 col-sm-12">
    		<div class="table-responsive">
    			 <table class="table table-hover table-bordered table-striped table-condensed" id="MostrarAsignar">
    			 	<thead>
                        <tr>
                            <th style="width: 30%;" class="text-center">Residencia de obra</th>
                            <th class="text-center">Mes</th>
                            <th class="text-center">Total</th>
                            <th style="width: 20%;">Opciones</th>
                        </tr>
                        {{ csrf_field() }}
                    </thead>
                    <tbody>
                        @foreach($asignaciones as $a)
                            <tr class="item{{ $a->idasignar }}">
                                <td>{{ $a->ubicacion }}</td>
                                <td>{{ $a->mes }}</td>
                                <td>$ {{ $a->total }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ URL::action('DelegadoController@DesgloceAsignar', $a->idasignar) }}"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                    <!--<button class="delete-modal btn btn-danger btn-sm" data-ubicacion="{{$a->ubicacion}}" data-mes="{{$a->mes}}" data-total="{{$a->total}}"><span class="glyphicon glyphicon-trash"></span> </button>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
    			 </table>
    		</div>
    	</div>
    </div>

    @include('delegado.asignar.modal.eliminar')
    @include('delegado.asignar.modal.nuevo')

@endsection

@section('scripts')
    {!! Html::script('plugins/bootstrap/js/asignar.js') !!}
@endsection