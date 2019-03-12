@extends('template.deleg')

@section('title', 'Consolidado')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb breadcrumb-arrow">
            <li><a href="{{ url('delegado/inicio') }}">Delegado administrativo</a></li>
            <li class="action"><span>Consolidaddo</span></li>          
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Consolidado</h3>
    </div>
</div>

<div class="row">
    <div class="panel panel-success">
        <div class="panel-heading"><strong>Buscar por</strong></div>
        <div class="panel-body">

            <div class="form-group">

                <div class="col-md-6">
                    <h5>Mes</h5>
                     <input class="form-control" type="month" name="mes" id="mes">
                </div>

                <div class="col-md-6">
                    <h5>Año</h5>
                    
                </div>

            </div>

        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped table-condensed" id="consolidado">
			 	<thead>
                    <tr>
                        <!--th class="text-center">No.</th>-->
                        <th class="text-center">Mes</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                    {{ csrf_field() }}
                </thead>
                <tbody>
                    @foreach($consolidado as $c)
                        <tr>
                            <td>{{ $c->mes }}</td>
                            <td>$ {{ $c->total }}</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="Ver desgloce" class="btn btn-primary btn-sm" href="{{ url('delegado/desgloceconsolidado') }}"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection