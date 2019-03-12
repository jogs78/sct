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
    <div class="panel panel-info">
        <div class="panel-heading"><strong>Filtrar por</strong></div>
        <div class="panel-body">
            <div class="form-group">

                <div class="col-md-6">
                    <h5>Mes</h5>
                    <div class="input-group">
                        <input type="month" name="mes" id="mes" class="form-control">
                        <span class="input-group-btn">
                            <button id="filtrarmes" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive" id="tabla_consolidado">
           
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('plugins/bootstrap/js/consolidado.js') !!}
@endsection