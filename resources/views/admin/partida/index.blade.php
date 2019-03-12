@extends('template.admin')

@section('title', 'Partidas')

@section('contenido')
<div class="row">
	<div class="col-md-12">
    	<ol class="breadcrumb breadcrumb-arrow">
    		<li><a href="{{ url('admin/inicio') }}">Administrador</a></li>
        	<li class="action"><span>Partidas</span></li>          
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    	<h3>Partidas <a href="#" class="add-modal btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo</a></h3>
    	<br>
    </div>
</div>

<div class="row">
     <div class="col-md-12">
         <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="partidaTabla">
                 <thead>
                     <tr>
                         <!--<th>ID</th>-->
                         <th>Partida</th>
                         <th>Descripción</th>
                         <th>Opciones</th>
                     </tr>
                     {{ csrf_field() }}
                 </thead>
                 <tbody>
                    @foreach($partidas as $part)
                        <tr class="item{{ $part->idpartida }}">
                            <td>{{ $part->idpartida }}</td>
                            <!--<td>{{ $part->num_partida }}</td>-->
                            <td>{{ $part->nombre_partida }}</td>
                            <td>
                                <button class="edit-modal btn btn-info btn-sm" data-idpartida="{{$part->idpartida}}" data-nombre="{{$part->nombre_partida}}"><span class="glyphicon glyphicon-edit"></span> </button>
                                <button class="delete-modal btn btn-danger btn-sm" data-idpartida="{{$part->idpartida}}" data-nombre="{{$part->nombre_partida}}"><span class="glyphicon glyphicon-trash"></span> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
         </div>
     </div>
 </div>
    @include('admin.partida.modal.agregar')
    @include('admin.partida.modal.editar')
    @include('admin.partida.modal.eliminar')

@endsection

@section('scripts')
    {!! Html::script('plugins/bootstrap/js/partidacrud.js') !!}
@endsection
<!--@section('scripts')
    <script>
        var urlcontainTable = "{{ route('datatable.partida')}}";
    </script>

@endsection-->
